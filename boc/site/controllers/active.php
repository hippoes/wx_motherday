<?php
/**
 * 活动详情
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Active extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model','page');
		$this->load->model('weixin_param');

				
//        $this->load->model('banners_model','banners');
//        $this->load->model('news_model','news');
//        $this->load->model('infos_model','infos');
//        $this->load->model('recruit_model','recruit');

    }

    // 活动规则页面
    public function ruler()
	{
        // 获取活动规则
        $detail_ruler=$this->page->get_one(array('id'=>1,'cid'=>4),'content');
        $data['detail_ruler'] = $detail_ruler['content'];

        // seo
        $data['header']=header_seoinfo(5,0);

        $this->load->view('active/ruler',$data);
    }

    // 活动留言页面
    public function message(){
        $openid = $this->session->userdata('openid');
        if ($openid) {
            // 获取用户头像，名称
            $userinfo = $this->weixin_param->get_one(array('openid'=>$openid), 'username,headimgurl', 'wxuserinfo');
            $data['userinfo'] = $userinfo;

            // 获取页面引导语
            $guide=$this->page->get_one(array('id'=>2,'cid'=>6),'content');
            $data['guide'] = $guide['content'];

            $data['openid'] = $openid;
            // seo
            $data['header']=header_seoinfo(5,0);

            $this->load->view('active/message',$data);
        } else {
            redirect('welcome/index');
        }
    }

    // 留言信纸页面
    public function letter(){
        $openid = $this->session->userdata('openid');

        if ($openid) {
            // 获取用户头像，名称，用户留言，留言时间
            $userinfo = $this->weixin_param->get_one(array('openid' => $openid), 'username,headimgurl,message,message_time', 'wxuserinfo');
            $data['userinfo'] = $userinfo;


            // 获取信纸页面引导语
            $letter_set = $this->page->get_one(array('id' => 3, 'cid' => 7), 'field1,field2,photo');
            $data['guide'] = $letter_set['field1'];
            $data['btn'] = $letter_set['field2'];
            $data['bg_photo'] = $letter_set['photo'];

            // seo
            $data['header'] = header_seoinfo(7, 0);

            $this->load->view('active/letter', $data);
        } else {
            redirect('welcome/index');
        }
    }



}