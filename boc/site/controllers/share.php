<?php
/**
 * 活动详情
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Share extends MY_Controller{

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

    // 生成分享页
    public function index(){
        $openid = $this->session->userdata('openid');

        if ($openid) {

            // 获取用户头像，名称，用户留言，留言时间
            $userinfo = $this->weixin_param->get_one(array('openid' => $openid), 'username,headimgurl,message,message_time', 'wxuserinfo');
            $data['userinfo'] = $userinfo;
            $data['openid'] = $openid;


            // 获取信纸背景图
            $bg_photo=$this->page->get_one(array('id'=>3,'cid'=>7),'photo');
            $data['bg_photo'] = $bg_photo['photo'];

            // seo
            $data['header']=header_seoinfo(0,0);

            $this->load->view('active/share',$data);

        } else {
            redirect('welcome/index');
        }
    }




}