<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

    protected $wx_param;           // 微信开发者 Appid，Secret

	function __construct()
	{
		parent::__construct();

        $this->wx_param = get_wxparam();    // 微信开发者 Appid，ecretS
        $this->load->model('banners_model','banners');
        $this->load->model('page_model','page');
        $this->load->model('weixin_param');
		$this->load->library('session');
		
		$this->load->helper('form');
        $this->load->library('sendsms');
	}
	
	// 活动主页
	public function index()
	{	
		$redirect_uri = site_url('welcome/get_code');
		get_access_token_code($this->wx_param['Appid'], $redirect_uri, 'snsapi_userinfo');
    	// seo
		$data['header']=header_seoinfo(0,0);

		$this->load->view('active/welcome',$data);
	}
	
	// 调用授权页面
	public function get_code()
	{
		$openid = $this->session->userdata('openid');
		$access_token = $this->session->userdata('access_token');
		
		// 获取openid
		if (empty($openid)) {
			if (!empty($_GET['code'])) {
				$code = $_GET['code'];
				// 获取access_token
				$get_access_token = get_access_token($this->wx_param['Appid'], $this->wx_param['Secret'], $code);
				// 获取后存入session
				$newdata = array(
					'access_token' => $get_access_token['access_token'],
					'refresh_token' => $get_access_token['refresh_token'],
					'openid' => $get_access_token['openid'],
					'get_time' => time()+7200
				);
				$this->session->set_userdata($newdata);
				$openid = $get_access_token['openid'];
				$access_token = $get_access_token['access_token'];
			}
		}
		
		// access_token 是否过期
		$get_time = $this->session->userdata('get_time');
		if (time() <= $get_time) {
			$refresh_token = $this->session->userdata('refresh_token');
			
			$reaccess_token = get_refresh_token($this->wx_param['Appid'], $refresh_token);
			// 获取后存入session
			$redata = array(
				'access_token' => $reaccess_token['access_token'],
				'refresh_token' => $reaccess_token['refresh_token'],
				'openid' => $reaccess_token['openid'],
				'get_time' => time()+7200
			);
			$this->session->set_userdata($redata);
			$access_token = $reaccess_token['access_token'];
			$openid = $reaccess_token['openid'];
		}
		
		// 用户信息是否存在数据表中
		$result = $this->weixin_param->find_one($openid, 'openid', 'wxuserinfo');
			
		// 获取用户信息
		if($access_token && $openid && empty($result)) {
			$userinfo =get_weixin_userinfo($access_token, $openid);
			
			$datas = array(
				'openid' => $userinfo['openid'],
				'nickname' => $userinfo['nickname'],
				'sex' => $userinfo['sex'],
				'city' => $userinfo['city'],
				'province' => $userinfo['province'],
				'country' => $userinfo['country'],
				'headimgurl' => $userinfo['headimgurl'],
				'timeline' => time(),
			);
			
			// 用户信息写入数据库
			$res = $this->weixin_param->create($datas, false, 'wxuserinfo');
		} else {
			$userinfo = $this->weixin_param->get_one(array('openid'=>$openid), '*', 'wxuserinfo');
		}
		
		// my_dump($userinfo);
		$data['nickname'] = $userinfo['nickname'];
		$data['openid'] = $userinfo['openid'];
		
		
		// seo
		$data['header']=header_seoinfo(0,0);
		
		$this->load->view('active/welcome',$data);
		
		// 清空session
		
		// $this->session->unset_userdata('access_token');
		// $this->session->unset_userdata('refresh_token');
		// $this->session->unset_userdata('get_time');
		// $this->session->unset_userdata('openid');
	}
	
	// 表单提交
	public function user_form()
    {
        if (is_ajax()){
            $openid = $_POST['openid'];
            $code = $_POST['code'];
            $phone = $_POST['phone'];
            $username = $_POST['username'];

            $result = $this->weixin_param->get_one(array('openid'=>$openid), 'send_code,validtime,status', 'phone_code');
            if($result['status'] == '0' && time() < $result['validtime']){
                if($code !== $result['send_code']){
                    $msg['status'] = '0';
                } else {
                    // 更新短信状态
                    $res = $this->weixin_param->update(array('status' => '1'), array('openid'=>$openid), false, 'phone_code');
                    $datas = array(
                        'username' => $username,
                        'phone' => $phone,
                    );
                    $result = $this->weixin_param->update($datas, array('openid'=>$openid), false, 'wxuserinfo');


                    $msg['status'] = !empty($res) ? '1' : '3';
                    $msg['status'] = !empty($result) ? '1' : '3';
                }
            }else{
                $msg['status'] = '2';
            }

            switch ($msg['status']) {
                case '0':
                    $msg['message'] = '验证码输入错误，请核对！';
                    break;
                case '1':
                    $msg['message'] = '提交成功！';
                    break;
                case '2':
                    $msg['message'] = '验证码过期或者已使用，请重新获取!';
                    break;
                case '3':
                    $msg['message'] = '数据错误，请联系管理员';
                    break;
            }

            echo json_encode_ex($msg);
        }
    }
	
	// 发送短信
	public function send_code()
    {
        if (is_ajax()){

            $openid = $_POST['openid'];
            $phone = $_POST['phone'];

            // 查询用户是否已报名
            $result = $this->weixin_param->get_one(array('openid'=>$openid), 'id,phone', 'wxuserinfo');
            if (empty($result['phone'])) {

                /*// 获取短信配置参数
                $config_data = array(
                    'AccessKeyId' => 'LTAItwFcHEvPylQV',
                    'AccessKeySecret' => '3ooXu4h3DV0GPXeoHCNBS44cJ4CSR8',
                    'SignName' => '舞美酷库',
                    'TemplateCode' => 'SMS_95845017',
                );*/
                // 获取短信配置参数
                $alysms_config =$this->page->get_one(array('id'=>6,'cid'=>12),'field1,field2,field3,field4');
				
                $config_data = array(
                    'AccessKeyId' => $alysms_config['field1'],
                    'AccessKeySecret' => $alysms_config['field2'],
                    'SignName' => $alysms_config['field3'],
                    'TemplateCode' => $alysms_config['field4'],
                );
                // 生成随机验证码
                $code = rand(000000,999999);
                // 发送验证码
                $res = $this->sendsms->send($config_data, $phone, $code);
				
                if ($res == '发送成功') {
                    $result = $this->create_code($openid, $phone, $code);
                    $msg['status'] = !empty($result) ? '1' : '3';
                } else {
                    $msg['status'] = '0';
                }
            }else{
                $msg['status'] = '2';
            }

            switch ($msg['status']) {
                case '0':
                    $msg['message'] = '发送失败，'.$res;
                    break;
                case '1':
                    $msg['message'] = $res.',短信十分钟内有效！';
                    break;
                case '2':
                    $msg['message'] = '您已参与活动！';
                    break;
                case '3':
                    $msg['message'] = '数据错误，请联系管理员';
                    break;
            }

            echo json_encode_ex($msg);
        }
    }
	
	// 写入验证码信息
    protected function create_code($openid, $phone, $code)
    {
        if (!empty($openid) && !empty($phone) && !empty($code)) {
            $datas = array(
                'openid' => $openid,
                'phone' => $phone,
                'send_code' => $code,
                'timeline' => time(),
                'validtime' => time()+600,
            );
            $res = $this->weixin_param->create($datas, false, 'phone_code');

            return $res;
        }
    }
	
	// 留言更新
    public function message_form()
    {
        if (is_ajax()){
            $openid = $_POST['openid'];
            $message = $_POST['message'];

            $message = htmlspecialchars(trim($message));

            if($openid && $message){
                $datas = array(
					'message' => $message,
					'message_time' => time(),
				);

                // 更新留言信息
                $res = $this->weixin_param->update($datas, array('openid'=>$openid), false, 'wxuserinfo');

                $msg['status'] = !empty($res) ? '1' : '0';
            }else{
                $msg['status'] = '2';
            }


            switch ($msg['status']) {
                case '0':
                    $msg['message'] = '留言失败，稍后重试！';
                    break;
                case '1':
                    $msg['message'] = '留言成功！';
                    break;
                case '2':
                    $msg['message'] = '数据错误，请联系管理员';
                    break;
            }

            echo json_encode_ex($msg);
        }
    }
	
	

}
