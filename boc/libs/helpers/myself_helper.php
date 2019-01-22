<?php
if(!function_exists('colty_name')){
	/**
	 * 根据类型id获取对应分类名称
	 * @param int $id ,分类id
	 * @return string 分类名称
	 */
    function colty_name($id)
    {
        $id=intval($id);
        $CI=&get_instance();
        $CI->load->database();
        $query =$CI->db->get_where('coltypes',array('id'=>$id));

        $res = $query->result_array();
//        var_dump($res);exit;
        if (!empty($res)){
            return $res[0]['title'];
        }else{
            return '';
        }
    }
}

if (!function_exists('get_pic_alt')) {
    /**
     * 获取提图片的seo——alt
     * @param  int $id 图片id
     * @return string
     */
    function get_pic_alt($id)
    {
        $CI =& get_instance();
        if (!isset($CI->mupload)) {
            $CI->load->model('Upload_model','mupload');
        }
        $res = $CI->mupload->get_one(array('id' => $id),'alt');
        if (!empty($res)) {
            return $res['alt'];
        } else {
            return '';
        }
    }
}

if (!function_exists('curl_post')){
    /**
     * curl接口调用【post】
     * @param $api , 接口地址
     * @param $data , 要传输提交的数据
     * @return 成功返回数据，失败返回false
     */
    function curl_post($api,$data){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);        #设置头文件的信息作为数据流输出
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);        #设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($ch, CURLOPT_POST, TRUE);      #设置post方式提交
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);       #提交数据

        $res=curl_exec($ch);

        curl_close($ch);

        return $res;
    }
}

if (!function_exists('curl_get')){
    /**
     * curl接口调用【get】
     * @param $api , 接口地址
     * @return 成功返回数据，失败返回false
     */
    function curl_get($api){
        $ch=curl_init();

        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch,CURLOPT_HEADER,FALSE);       #设置头文件的信息作为数据流输出
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);   #设置获取的信息以文件流的形式返回，而不是直接输出。

        $res=curl_exec($ch);

        curl_close($ch);

        return $res;
    }
}

if (!function_exists('get_filecontents')){
    /**
     * file_get_contents获取网页内容
     * @param $url , 接口地址
     * @return 成功返回数据，失败返回false
     */
    function get_filecontents($url){
        $res=file_get_contents($url);

        return $res;
    }
}

if (!function_exists('handle_isolation_str_to_arr')){
    /**
     * 将一个字符串通过一个特定的分割符拆分成多个字符串
     * @param str $str , 要处理的字符串
     * @param str $delimiter, 分隔符
     * @return arr
     */
    function handle_isolation_str_to_arr($str,$delimiter){
        if ($str){
            $res=explode($delimiter,$str);
            $i=0;
            foreach ($res as $k=>$v){
                if (empty($v)){
                    array_splice($res,($k-$i),1);
                    ++$i;
                }
            }

            return $res;
        }else{
            return false;
        }
    }
}

if (!function_exists('get_contact_us')) {
    /**
     * 获取底部联系我们信息
     * @return array
     */
    function get_contact_us()
    {
        $CI =& get_instance();
        if (!isset($CI->page)) {
            $CI->load->model('page_model','page');
        }
        $res = $CI->page->get_one(array('id' => 18),'field1,field2,field3');
        return $res;
    }
}

if (!function_exists('get_qr_list')) {
    /**
     * 获取底部二维码信息
     * @return array
     */
    function get_qr_list()
    {
        $CI =& get_instance();
        if (!isset($CI->gallery)) {
            $CI->load->model('gallery_model','gallery');
        }
        $res = $CI->gallery->get_all(array('cid' => 8,'audit'=>1),'title,photo');
        return $res;
    }
}

if (!function_exists('get_sidebar_info')) {
    /**
     * 获取侧边栏信息
     * @return array
     */
    function get_sidebar_info()
    {
        $CI =& get_instance();
        if (!isset($CI->page)) {
            $CI->load->model('page_model','page');
        }
        $res = $CI->page->get_one(array('id' => 19),'field1,field2,photo');
        return $res;
    }
}

if (!function_exists('get_sidebar_qr')) {
    /**
     * 获取底部二维码信息
     * @return array
     */
    function get_sidebar_qr()
    {
        $CI =& get_instance();
        if (!isset($CI->gallery)) {
            $CI->load->model('gallery_model','gallery');
        }
        $res = $CI->gallery->get_all(array('cid' => 68,'audit'=>1),'title,photo');
        return $res;
    }
}

if (!function_exists('get_cities')) {
    /**
     * 获取城市列表
     * @return array
     */
    function get_cities()
    {
        $CI =& get_instance();
        if (!isset($CI->lists)) {
            $CI->load->model('lists_model','lists');
        }
        $res = $CI->lists->get_all(array('cid' => 10,'audit'=>1),'id,title');
        return $res;
    }
}

if (!function_exists('get_city_name_by_id')) {
    /**
     * 通过城市id获取对应城市名称
     * @param $id
     * @return array
     */
    function get_city_name_by_id($id)
    {
        $CI =& get_instance();
        if (!isset($CI->lists)) {
            $CI->load->model('lists_model','lists');
        }
        $res = $CI->lists->get_one(array('id'=>$id,'cid' => 10,'audit'=>1),'title');
        return $res['title'];
    }
}

if (!function_exists('get_dalshabet')) {
    /**
     * 获取美妍中心列表信息
     * @return array
     */
    function get_dalshabet()
    {
        $CI =& get_instance();
        if (!isset($CI->infos)) {
            $CI->load->model('infos_model','infos');
        }
        $res = $CI->infos->get_all(array('cid' => 47, 'audit'=>1),'title');
        return $res;
    }
}


/**
 * *********** 2019新增函数 ***********
 */
 
 if (!function_exists('json_encode_ex')) {
 /**
* 对变量进行 JSON 编码
* @param mixed value 待编码的 value ，除了resource 类型之外，可以为任何数据类型，该函数只能接受 UTF-8 编码的数据
* @return string 返回 value 值的 JSON 形式
*/
function json_encode_ex($value)
{
	if (version_compare(PHP_VERSION,'5.4.0','<'))
	{
		$str = json_encode($value);
		$str = preg_replace_callback( "#\\\u([0-9a-f]{4})#i", function($matchs)
				{
					return iconv('UCS-2BE', 'UTF-8', pack('H4', $matchs[1]));
				}, $str);
		return $str;
	} else {
		return json_encode($value, JSON_UNESCAPED_UNICODE);
	}
}
}

if (!function_exists('my_dump')) {
    /**
     * 获取美妍中心列表信息
     * @return array
     */
    function my_dump($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
}

if (!function_exists('get_banner')) {
    /**
     * 获取banner信息
     * @return array
     */
    function get_banner()
    {
        $CI =& get_instance();
        if (!isset($CI->infos)) {
            $CI->load->model('banners_model','banners');
        }
        $res = $CI->banners->get_one(array('id'=>1,'cid'=>2,'audit'=>1),'photo');
        return $res;
    }
}

if (!function_exists('get_footer')) {
    /**
     * 获取页脚信息
     * @return array
     */
    function get_footer()
    {
        $CI =& get_instance();
        if (!isset($CI->infos)) {
            $CI->load->model('infos_model','infos');
        }
        $res = $CI->infos->get_all(array('cid' => 3, 'audit'=>1),'title,field1');

        return $res;
    }
}

if (!function_exists('get_wxparam')) {
    /**
     * 获取微信参数-- Appid -- Secre
     * @return array
     */
    function get_wxparam()
    {
        $CI =& get_instance();
        if (!isset($CI->page)) {
            $CI->load->model('page_model','page');
        }
        $res = $CI->page->get_one(array('id'=>5,'cid'=>11),'field1,field2');
        $res['Appid'] = $res['field1'];
        $res['Secret'] = $res['field2'];
        unset($res['field1']);
        unset($res['field2']);
        return $res;
    }
}

if (!function_exists('https_request')) {
    /**
     * GET,POST传参 curl调用接口链接返回状态
     * @param  [type] $url  [访问的接口链接]
     * @param  [type] $data [传参数据]
     * @return [type]       [返回url处理后的json数据]
     *
     * demo
     * echo https_request('http://localhost/other/my_php/data.php?id=1&name=zhangsan');
     * echo https_request('http://localhost/other/my_php/data.php',array('id'=>'1','name'=>'zhangsan'));
     *
     */
    function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
        if(!empty($data)){
            curl_setopt($curl,CURLOPT_POST,1);
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        }
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}

if(!function_exists('get_last_access_token')) {
    /**
     * 获取数据表中最后一个 access_token 详细信息
     * @return mixed
     */
    function get_last_access_token()
    {
        $CI =& get_instance();
        if (!isset($CI->page)) {
            $CI->load->model('weixin_param');
        }
        $res = $CI->weixin_param->get_list('1','0',array('id'=>'desc'),'','id,access_token,validtime','wxaccess_token');

        return $res['0'];
    }
}


if(!function_exists('get_access_token_code')) {
	/**
     * 拉取授权页面
     * @return mixed
     */
    function get_access_token_code($Appid, $redirect_uri, $scope)
    {
		$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$Appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=".$scope."&state=123456#wechat_redirect";
		
		redirect($url);
        
    }
}

if(!function_exists('get_access_token')) {
	/**
     * 授权成功后获取access_token,openid
     * @return mixed
     */
    function get_access_token($Appid, $Secret, $Code)
    {
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$Appid."&secret=".$Secret."&code=".$Code."&grant_type=authorization_code";
		$res = https_request($url);
		$res = json_decode($res, true);
        
		return $res;
    }
}

if(!function_exists('get_refresh_token')) {
	/**
     * 刷新access_token
     * @return mixed
     */
    function get_refresh_token($Appid, $Refresh_token)
    {
		$url = "https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=".$Appid."&grant_type=refresh_token&refresh_token=".$Refresh_token;
		$res = https_request($url);
		$res = json_decode($res, true);
        
		return $res;
    }
}

if(!function_exists('get_weixin_userinfo')) {
	/**
     * 授权成功后获取access_token,openid
     * @return mixed
     */
    function get_weixin_userinfo($Access_token, $Openid)
    {
		$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$Access_token."&openid=".$Openid."&lang=zh_CN";
		$res = https_request($url);
		$res = json_decode($res, true);
        
		return $res;
    }
}