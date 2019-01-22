<?php
/**
 * 活动咨讯
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Controller{
    protected $limit=10;
    protected $news_type_ids=array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('banners_model','banners');
        $this->load->model('news_model','news');
        $this->load->model('infos_model','infos');
        $news_types=list_coltypes_fid(48,0);
        foreach ($news_types as $v){
            $news_type_ids[]=$v['id'];
        }
        $this->news_type_ids=$news_type_ids;


    }


    public function index(){
        $news_type_ids=$this->news_type_ids;
        $type=$this->uri->segment(3,$news_type_ids[0]);
        if (in_array($type,$news_type_ids)){
            $page=$this->uri->segment(4,1);
            if ($page > 0){
                // banner
                $banner=$this->banners->get_one(array('id'=>7,'cid'=>14,'audit'=>1),'photo');
                $data['banner']=$banner;


                // 活动资讯列表
                $this->load->library('pagination');
                $where=array('cid'=>48,'ctype'=>$type,'audit'=>1);
                $count=$this->news->get_count_all($where);
                $limit=$this->limit;
                $start=($page-1)*$limit;
                $list=$this->news->get_list($limit,$start,false,$where,'id,title,timeline');
                $pages=_pages(site_url('news/index/'.$type),$limit,$count,4);
                $data['list']=$list;
                $data['pages']=$pages;

                // 定位
                $cur_pos=0;
                foreach ($news_type_ids as $k=>$v){
                    if ($type==$v) {
                        $cur_pos = $k;
                    }
                }
                $data['cur_pos']=$cur_pos;

                // 所在城市
                $city=CUR_CITY;
                if(empty($city)){
                    $city='首页';
                }
                $data['city']=$city;

                // 头部直营店菜单
                $data['city_menu']=$this->city_menu;

                // seo
                $type_name=colty_name($type);
                $header=header_seoinfo(48,0);
                $header['title']=$type_name.'-'.$header['title'];
                $data['header']=$header;
                $data['type_name']=$type_name;

                $this->load->view('news',$data);
            }else{
                redirect('404');
            }
        }else{
            redirect('404');
        }
    }

    /**
     * 新闻详情
     */
    public function info(){
        $id=$this->uri->segment(3,0);
        $info=$this->news->get_one_type_pn(array('id'=>$id,'audit'=>1,'cid'=>48),'id,ctype,cid,sort_id,title,content,timeline');
        if (!empty($info)){
            $data['info']=$info;
            $type=$info['ctype'];

            // banner
            $banner=$this->banners->get_one(array('id'=>7,'cid'=>14,'audit'=>1),'photo');
            $data['banner']=$banner;

            $type_name=colty_name($type);
            $data['type_name']=$type_name;

            // 所在城市
            $city=CUR_CITY;
            if(empty($city)){
                $city='首页';
            }
            $data['city']=$city;

            // 头部直营店菜单
            $data['city_menu']=$this->city_menu;

            // seo
            $header=header_seoinfo(48,0);
            $header['title']=$info['title'].'-'.$type_name.'-'.$header['title'];
            $data['header']=$header;

            $this->load->view('news/info',$data);

        }else{
            redirect('404');
        }
    }

    /**
     * 妈妈课堂
     */
    public function classroom(){
        // banner
        $banner=$this->banners->get_one(array('id'=>7,'cid'=>14,'audit'=>1),'photo');
        $data['banner']=$banner;

        // 暂无信息
        $no_info=$this->banners->get_one(array('id'=>12,'cid'=>66,'audit'=>1),'photo');
        $data['no_info']=$no_info;

        // 会员课程
        $vip_course=$this->infos->get_all(array('cid'=>49,'audit'=>1),'id,title,field1,field2,field3,field4,field5,field6,outline,timeline,expiretime');
        $data['vip_course']=$vip_course;

        // 常规课程
        $normal_course=$this->infos->get_all(array('cid'=>57,'audit'=>1),'id,title,field1,field2,field3,field4,field5,field6,outline,timeline,expiretime');
        $data['normal_course']=$normal_course;

        // 所在城市
        $city=CUR_CITY;
        if(empty($city)){
            $city='首页';
        }
        $data['city']=$city;

        // 头部直营店菜单
        $data['city_menu']=$this->city_menu;

        // seo
        $header=header_seoinfo(49,0);
        $data['header']=$header;

        $this->load->view('news/classroom',$data);

    }

    /**
     * 妈妈课堂详情加载【ajax】
     */
    public function classroom_ajax(){
        if (is_ajax()){
            $id=$this->uri->segment(3,0);
            if ($id){
                $info=$this->infos->get_one(array('id'=>$id,'audit'=>1),'title1,content');
                $data['info']=$info;

                $this->load->view('ajax/classroom',$data);
            }
        }
    }

    /**
     * 表单加载【ajax】
     */
    public function apply(){
        if (is_ajax()) {
            $id=$this->uri->segment(3,0);
            if ($id) {
                $info=$this->infos->get_one(array('id'=>$id,'audit'=>1),'id,cid,title');
                $data['info']=$info;

                $this->load->view('ajax/apply',$data);
            }
        }
    }


}