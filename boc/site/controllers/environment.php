<?php
/**
 * 环境介绍
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Environment extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model','page');
        $this->load->model('banners_model','banners');
        $this->load->model('infos_model','infos');
        $this->load->model('gallery_model','gallery');
        $this->load->model('product_model','product');
    }

    public function index(){
        // banner
        $banner=$this->banners->get_one(array('id'=>5,'cid'=>12,'audit'=>1),'photo');
        $data['banner']=$banner;

        $list=$this->infos->get_all(array('cid'=>24,'audit'=>1),'id,title,field1,content,photo,pics');
        $data['list']=$list;

        // 所在城市
        $city=CUR_CITY;
        if(empty($city)){
            $city='首页';
        }
        $data['city']=$city;

        // 头部直营店菜单
        $data['city_menu']=$this->city_menu;

        // seo
        $header=header_seoinfo(24,0);
        $data['header']=$header;

        $this->load->view('environment',$data);

    }

}