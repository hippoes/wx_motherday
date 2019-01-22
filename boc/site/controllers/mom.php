<?php
/**
 * 新妈圈
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mom extends MY_Controller{
    protected $limit=8;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('banners_model','banners');
        $this->load->model('news_model','news');
    }

    public function index(){
        $page=$this->uri->segment(3,1);
        if($page > 0){
            // banner
            $banner=$this->banners->get_one(array('id'=>8,'cid'=>15,'audit'=>1),'photo');
            $data['banner']=$banner;

            // 新妈圈列表
            $this->load->library('pagination');
            $where=array('cid'=>50,'audit'=>1);
            $count=$this->news->get_count_all($where);
            $limit=$this->limit;
            $start=($page-1)*$limit;
            $list=$this->news->get_list($limit,$start,false,$where,'id,title,content,photo');
            $pages=_pages(site_url('mom/index'),$limit,$count,3);
            $data['list']=$list;
            $data['pages']=$pages;

            // 所在城市
            $city=CUR_CITY;
            if(empty($city)){
                $city='首页';
            }
            $data['city']=$city;

            // 头部直营店菜单
            $data['city_menu']=$this->city_menu;

            // seo
            $header=header_seoinfo(50,0);
            $data['header']=$header;

            $this->load->view('mom',$data);
        }else{
            redirect('404');
        }
    }

    public function info(){
        $id=$this->uri->segment(3,0);
        $info=$this->news->get_one_pn(array('id'=>$id,'audit'=>1,'cid'=>50),'id,cid,sort_id,title,content');
        if (!empty($info)){
            $data['info']=$info;

            // banner
            $banner=$this->banners->get_one(array('id'=>8,'cid'=>15,'audit'=>1),'photo');
            $data['banner']=$banner;

            // 所在城市
            $city=CUR_CITY;
            if(empty($city)){
                $city='首页';
            }
            $data['city']=$city;

            // 头部直营店菜单
            $data['city_menu']=$this->city_menu;

            // seo
            $header=header_seoinfo(50,0);
            $header['title']=$info['title'].'-'.$header['title'];
            $data['header']=$header;

            $this->load->view('mom/info',$data);

        }else{
            redirect('404');
        }
    }


}