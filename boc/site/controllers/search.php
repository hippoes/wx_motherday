<?php
/**
 * 搜索
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('banners_model','banners');
        $this->load->model('news_model','news');
        $this->load->model('infos_model','infos');
        $this->load->library('pagination');
    }


    public function index(){
    	$keyword=$this->input->get('kw');
    	if($keyword!=''){
    		$page=$this->uri->segment(3,1);
    		if($page > 0){
	    		$in=array('cid',array(48,50,58));
	    		$like=array('title',$keyword);
	    		$where=array('in'=>$in,'audit'=>1,'like'=>$like);
                $count=$this->news->get_count_all($where);
                $limit=8;
                $start=($page-1)*$limit;
                $pages=_pages(site_url('search/index'),$limit,$count,3);
	    		$news_list=$this->news->get_list($limit,$start,false,$where,'id,cid,title,content,timeline');
	    		// var_dump($news_list);exit;
                $data['pages']=$pages;
	    		$data['news_list']=$news_list;

	    		$data['keyword']=$keyword;

	    		// banner
	    		$banner=$this->banners->get_one(array('id'=>11,'cid'=>65,'audit'=>1),'photo');
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
	    		$header=header_seoinfo(0,0);
	    		$header['title']="搜索“".$keyword."”-".$header['title'];
	    		$data['header']=$header;

	    		$this->load->view('search',$data);    			
    		}else{
    			redirect('404');
    		}
    	}else{
    		redirect('404');
    	}
    }

}