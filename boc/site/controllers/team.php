<?php
/**
 * 专业团队
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model','page');
        $this->load->model('banners_model','banners');
        $this->load->model('infos_model','infos');
        $this->load->model('product_model','product');
    }

    public function index(){
        // banner
        $banner=$this->banners->get_one(array('id'=>4,'cid'=>12,'audit'=>1),'photo');
        $data['banner']=$banner;

        // 专家医生
        $expert_info=$this->page->get_one(array('id'=>13,'cid'=>43),'content,photo,icon1');
        $data['expert_info']=$expert_info;
        $expert_list=$this->infos->get_all(array('cid'=>44,'audit'=>1),'id,title,outline,photo');
        $data['expert_list']=$expert_list;

        // 列表
        $list=$this->infos->get_all(array('cid'=>45,'audit'=>1),'id,title,field1,content,photo,icon');
        foreach ($list as $k=>$v){
            $list[$k]['load_list']=$this->product->get_all(array('cid'=>45,'ccid'=>$v['id'],'audit'=>1),'id,title');
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
        $header=header_seoinfo(43,0);
        $data['header']=$header;

        $this->load->view('team',$data);
    }


    /**
     * 专家医生详情加载【ajax】
     */
    public function team_ajax(){
        if (is_ajax()){
            $id=$this->uri->segment(3,0);
            if ($id){
                $info=$this->infos->get_one(array('id'=>$id,'cid'=>44,'audit'=>1),'title,outline,content');
                $data['info']=$info;

                $this->load->view('ajax/team',$data);
            }
        }
    }

    /**
     * 点击加载【ajax】
     */
    public function load_ajax(){
        if (is_ajax()){
            $id=$this->uri->segment(3,0);
            if ($id){
                $info=$this->product->get_one(array('id'=>$id,'audit'=>1),'title1,content');
                $data['info']=$info;

                $this->load->view('ajax/load_ajax',$data);
            }
        }
    }

}