<?php
/**
 * 微信端相关页面
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wechat extends MY_Controller{
	protected $limit_ini=5;
	protected $more=2;

	public function __construct()
    {
        parent::__construct();
        $this->load->model('banners_model','banners');
        $this->load->model('product_model','product');
    }

    /**
     * 妈妈养护
     */
    public function mom_conservation(){
    	// banner
        $banner=$this->banners->get_one(array('id'=>10,'cid'=>64,'audit'=>1),'photo');
        $data['banner']=$banner;

        $where=array('cid'=>60,'audit'=>1);
        $count=$this->product->get_count_all($where);
        $limit_ini=$this->limit_ini;
        $more=$this->more;
        $page_nums=ceil(($count-$limit_ini)/$more);
        $data['page_nums']=$page_nums;

        $list=$this->product->get_list($limit_ini,0,false,$where,'id,title,content,photo');
        $data['list']=$list;

        // 所在城市
        $city=CUR_CITY;
        if(empty($city)){
            $city='首页';
        }
        $data['city']=$city;

        // seo
        $header=header_seoinfo(60,0);
        $data['header']=$header;

        $this->load->view('wechat/mom_conservation',$data);
    }

    /**
     * 宝宝护理
     */
    public function baby_care(){
    	// banner
        $banner=$this->banners->get_one(array('id'=>10,'cid'=>64,'audit'=>1),'photo');
        $data['banner']=$banner;

        $where=array('cid'=>61,'audit'=>1);
        $count=$this->product->get_count_all($where);
        $limit_ini=$this->limit_ini;
        $more=$this->more;
        $page_nums=ceil(($count-$limit_ini)/$more);
        $data['page_nums']=$page_nums;

        $list=$this->product->get_list($limit_ini,0,false,$where,'id,title,content,photo');
        $data['list']=$list;

        // 所在城市
        $city=CUR_CITY;
        if(empty($city)){
            $city='首页';
        }
        $data['city']=$city;

        // seo
        $header=header_seoinfo(61,0);
        $data['header']=$header;

        $this->load->view('wechat/baby_care',$data);
    }

    /**
     * 漫画专区
     */
    public function comics_area(){
    	// banner
        $banner=$this->banners->get_one(array('id'=>10,'cid'=>64,'audit'=>1),'photo');
        $data['banner']=$banner;

        $where=array('cid'=>62,'audit'=>1);
        $count=$this->product->get_count_all($where);
        $limit_ini=$this->limit_ini;
        $more=$this->more;
        $page_nums=ceil(($count-$limit_ini)/$more);
        $data['page_nums']=$page_nums;

        $list=$this->product->get_list($limit_ini,0,false,$where,'id,title,content,photo');
        $data['list']=$list;

        // 所在城市
        $city=CUR_CITY;
        if(empty($city)){
            $city='首页';
        }
        $data['city']=$city;

        // seo
        $header=header_seoinfo(62,0);
        $data['header']=$header;

        $this->load->view('wechat/comics_area',$data);
    }

    public function video_area(){
    	// banner
        $banner=$this->banners->get_one(array('id'=>10,'cid'=>64,'audit'=>1),'photo');
        $data['banner']=$banner;

        $where=array('cid'=>63,'audit'=>1);
        $count=$this->product->get_count_all($where);
        $limit_ini=$this->limit_ini;
        $more=$this->more;
        $page_nums=ceil(($count-$limit_ini)/$more);
        $data['page_nums']=$page_nums;

        $list=$this->product->get_list($limit_ini,0,false,$where,'id,title,content,photo');
        $data['list']=$list;

        // 所在城市
        $city=CUR_CITY;
        if(empty($city)){
            $city='首页';
        }
        $data['city']=$city;

        // seo
        $header=header_seoinfo(63,0);
        $data['header']=$header;

        $this->load->view('wechat/video_area',$data);
    }

    /**
     * 详情页
     */
    public function info(){
        $id=$this->uri->segment(3,0);
        $info=$this->product->get_one_pn(array('id'=>$id,'audit'=>1),'id,cid,sort_id,title,content');
        if(!empty($info)){
            $data['info']=$info;

            switch ($info['cid']) {
                case 60:
                    $func_name="mom_conservation";
                    $cur_pos=0;
                    break;
                case 61:
                    $func_name="baby_care";
                    $cur_pos=1;
                    break;
                case 62:
                    $func_name="comics_area";
                    $cur_pos=2;
                    break;
                case 63:
                    $func_name="video_area";
                    $cur_pos=3;
                    break;
                default:
                    $cur_pos=0;
                    $func_name="mom_conservation";
                    break;
            }
            $data['func_name']=$func_name;
            $data['cur_pos']=$cur_pos;

            // banner
            $banner=$this->banners->get_one(array('id'=>10,'cid'=>64,'audit'=>1),'photo');
            $data['banner']=$banner;

	        // 所在城市
            $city=CUR_CITY;
            if(empty($city)){
                $city='首页';
            }
            $data['city']=$city;

            // seo
            $header=header_seoinfo($info['cid'],0);
            $header['title']=$info['title'].'-'.$header['title'];
            $data['header']=$header;

            $this->load->view('wechat/info',$data);
        }else{
            redirect('404');
        }
    }

    /**
     * 列表点击加载
     */
    public function wechat_ajax(){
        if(is_ajax()){
            $page=$this->input->get('page');
            $cid=$this->input->get('cid');
            $limit_ini=$this->limit_ini;
            $more=$this->more;
            $start=($page-1)*$more+$limit_ini;

            $list=$this->product->get_list($more,$start,false,array('cid'=>$cid,'audit'=>1),'id,title,content,photo');
            $data['list']=$list;

            $this->load->view('wechat/wechat_ajax',$data);
        }
    }

}