<?php
/**
 * 美妍中心
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dalshabet extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model','page');
        $this->load->model('banners_model','banners');
        $this->load->model('infos_model','infos');
    }

    public function index(){
        // banner
        $banner=$this->banners->get_one(array('id'=>6,'cid'=>13,'audit'=>1),'photo');
        $data['banner']=$banner;

        // 美妍中心简介
        $intro=$this->page->get_one(array('id'=>15,'cid'=>46),'content');
        $data['intro']=$intro;

        // 美妍中心列表
        $list=$this->infos->get_all(array('cid'=>47,'audit'=>1),'title,title1,field1,outline,content,photo');
        foreach ($list as $k=>$v){
            $list[$k]['outline_list']=handle_isolation_str_to_arr($v['outline'],'##');
        }

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
        $header=header_seoinfo(13,0);
        $data['header']=$header;

        $this->load->view('dalshabet',$data);

    }

}