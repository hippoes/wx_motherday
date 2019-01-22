<?php
/**
 * hibaby服务——精致服务
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class delicate_service extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model','page');
        $this->load->model('banners_model','banners');
        $this->load->model('infos_model','infos');
    }

    public function index(){
        // banner
        $banner=$this->banners->get_one(array('id'=>3,'cid'=>12,'audit'=>1),'photo');
        $data['banner']=$banner;

        // 产前服务
        $prenatal_intro=$this->page->get_one(array('id'=>2,'cid'=>25),'content');
        $data['prenatal_intro']=$prenatal_intro;
        $prenatal_list=$this->infos->get_all(array('cid'=>26,'audit'=>1),'id,title,outline,photo,content');
        foreach ($prenatal_list as $k=>$v){
            $prenatal_list[$k]['list']=handle_isolation_str_to_arr($v['outline'],'##');
        }
        $data['prenatal_list']=$prenatal_list;

        // 妈妈服务
        $postpartum_intro=$this->page->get_one(array('id'=>3,'cid'=>27),'content');
        $data['postpartum_intro']=$postpartum_intro;
        $postpartum_list=$this->infos->get_all(array('cid'=>28,'audit'=>1),'title,content');
        $data['postpartum_list']=$postpartum_list;
        $postpartum_pt=$this->page->get_one(array('id'=>4,'cid'=>29),'title,outline,photo');
        $postpartum_pt['list']=handle_isolation_str_to_arr($postpartum_pt['outline'],'##');
        $data['postpartum_pt']=$postpartum_pt;

        // 宝宝服务
        $baby_intro=$this->page->get_one(array('id'=>5,'cid'=>30),'content');
        $data['baby_intro']=$baby_intro;
        $baby_list=$this->infos->get_all(array('cid'=>31,'audit'=>1),'id,title,outline,icon');
        foreach ($baby_list as $k=>$v){
            $baby_list[$k]['list']=handle_isolation_str_to_arr($v['outline'],'##');
        }
        $data['baby_list']=$baby_list;

        // 月子膳食
        $meal_intro=$this->page->get_one(array('id'=>6,'cid'=>32),'content');
        $data['meal_intro']=$meal_intro;
        $meal_pt=$this->page->get_one(array('id'=>7,'cid'=>33),'title,outline,photo');
        $outline_list=handle_isolation_str_to_arr($meal_pt['outline'],'##');
        $ol_list=array();
        foreach ($outline_list as $v){
            $ol_list[]=handle_isolation_str_to_arr($v,'$$');
        }
        $meal_pt['pt_list']=$ol_list;
        $data['meal_pt']=$meal_pt;


        $meal_list=$this->infos->get_all(array('cid'=>34,'audit'=>1),'title,content');
        $data['meal_list']=$meal_list;

        // 门诊服务
        $outpatient=$this->page->get_one(array('id'=>8,'cid'=>35),'title,content,photo');
        $data['outpatient']=$outpatient;

        // 所在城市
        $city=CUR_CITY;
        if(empty($city)){
            $city='首页';
        }
        $data['city']=$city;

        // 头部直营店菜单
        $data['city_menu']=$this->city_menu;

        // seo
        $header=header_seoinfo(25,0);
        $data['header']=$header;

        $this->load->view('delicate_service',$data);
    }
}