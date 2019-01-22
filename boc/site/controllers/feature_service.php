<?php
/**
 * 特色服务
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class feature_service extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model','page');
        $this->load->model('banners_model','banners');
        $this->load->model('infos_model','infos');
        $this->load->model('gallery_model','gallery');
    }

    public function index(){
        // banner
        $banner=$this->banners->get_one(array('id'=>3,'cid'=>12,'audit'=>1),'photo');
        $data['banner']=$banner;

        // 专业领航 中医调养
        $professional_intro=$this->page->get_one(array('id'=>9,'cid'=>36),'content');
        $data['professional_intro']=$professional_intro;
        $professional_list=$this->gallery->get_all(array('cid'=>37,'audit'=>1),'title,photo');
        $data['professional_list']=$professional_list;

        // 智能环保 舒适便捷
        $smart_intro=$this->page->get_one(array('id'=>10,'cid'=>38),'content');
        $data['smart_intro']=$smart_intro;
        $smart_list=$this->infos->get_all(array('cid'=>39,'audit'=>1),'title,outline,photo,icon');
        $data['smart_list']=$smart_list;

        // 引领潮流 时尚辣妈
        $trends_intro=$this->page->get_one(array('id'=>11,'cid'=>40),'content');
        $data['trends_intro']=$trends_intro;
        $trends_list=$this->gallery->get_all(array('cid'=>41,'audit'=>1),'title,photo');
        $data['trends_list']=$trends_list;

        // 接轨国际 品质保障
        $international=$this->page->get_one(array('id'=>12,'cid'=>42),'content,photo');
        $data['international']=$international;

        // 所在城市
        $city=CUR_CITY;
        if(empty($city)){
            $city='首页';
        }
        $data['city']=$city;

        // 头部直营店菜单
        $data['city_menu']=$this->city_menu;

        // seo
        $header=header_seoinfo(36,0);
        $data['header']=$header;

        $this->load->view('feature_service',$data);
    }

}