<?php
/**
 * 活动详情
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prizes extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('banners_model','banners');
        $this->load->model('infos_model','infos');
        $this->load->model('page_model','page');
		$this->load->model('weixin_param');

//        $this->load->model('news_model','news');
//        $this->load->model('recruit_model','recruit');

    }

    // 活动规则页面
    public function index(){
        $openid = $this->session->userdata('openid');

        if ($openid) {
            // 获取用户头像，名称
            $userinfo = $this->weixin_param->get_one(array('openid' => $openid), 'username,headimgurl', 'wxuserinfo');
            $data['userinfo'] = $userinfo;
            $data['openid'] = $openid;

            // 获取优惠券列表
            $list = $this->infos->get_all(array('cid' => 9, 'audit' => 1), 'id,title,field1');
            $data['list'] = $list;

            // 获取优惠券文字
            $prizes_info = $this->page->get_one(array('id' => 4, 'cid' => 10), 'field1,field2,content');
            $data['prizes_info'] = $prizes_info;
            // seo
            $data['header'] = header_seoinfo(8, 0);

            $this->load->view('active/prizes', $data);
        } else {
            redirect('welcome/index');
        }
    }

}