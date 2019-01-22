<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends Modules_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->rules = array(
			"rule" => array(
				array(
					"field" => "title",
					"label" => lang('title'),
					"rules" => "trim|required|min_length[1]"
					)
				,array(
					"field" => "timeline",
					"label" => lang('time'),
					"rules" => "trim|strtotime"
					)
				,array(
					"field" => "content",
					"label" => '内容',
					"rules" => "trim"
					// link_create tag 生成
					)
				,array(
					"field" => "photo",
					"label" => lang('photo'),
					"rules" => "trim"
					)
				)
			);

	}
	public function copypro()
	{
		$ids = $this->input->post('ids');

		$rs=$this->model->get_one($ids);

		unset($rs['id']);
		unset($rs['sort_id']);
		unset($rs['timeline']);

		$id = $this->model->create($rs);
		if ($id) {
			$vdata['msg'] = '复制成功，请刷新查看';
			$vdata['status'] = 1;
		}else{
			$vdata['msg'] = '复制失败，请刷新后重试';
			$vdata['status'] = 0;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

    // 推荐 flag1
    public function flag1($key = FALSE){
        if (!$key AND $this->input->post('ids') ) {
            $key = explode(',',$this->input->post('ids'));
        }else{
            $vdata = array('status'=>0,'msg'=>lang('modules_no_id'));
        }

        $where = FALSE;

        if ($this->input->get('c')) {
            $where = array('cid' => $this->input->get('c'));
        }else{
            $vdata = array('status'=>0,'msg'=>lang('modules_no_col_id'));
        }

        $flag = $this->input->post('flag');

        if ($flag) {
            $flag=1;
        }else{
            $flag=0;
        }

        $msg = array(lang('modules_flag_false'),lang('modules_flag_true'));

        if (!isset($vdata['status'])) {
            if ($where) {
                $res = $this->model->flag1($flag,$key,$where);
            }else{
                $res = $this->model->flag1($flag,$key);
            }

            if ($res) {
                $vdata = array('status'=>1,'msg'=>$msg[$flag]);
                if (is_array($key)) {
                    $this->mlogs->add('flag',lang('modules_flag_id').$this->input->post('ids').lang('modules_flag_for').$flag);
                }else{
                    $this->mlogs->add('flag',lang('modules_flag_id').$key.lang('modules_flag_for').$flag);
                }
            }else{
                $vdata = array('status'=>0,'msg'=>lang('modules_flag_err_select'));
            }
        }

        if($this->input->is_ajax_request()){
            $this->output->set_content_type('application/json')->set_output(json_encode($vdata));
        }else{
            $this->load->view('msg',$vdata);
        }
    }





    // 删除条目时删除文件
	protected function _rm_file($ids)
	{
		$fids = array() ;
		if (is_numeric($ids)) {
			$tmp = $this->model->get_one($ids,'photo');
			$fids = explode(',',$tmp['photo']);
		}else if(is_array($ids)){
            // 使用 字符串where时
			$tmp = $this->model->get_all("`id` in (".implode(',', $ids).")",'photo');
			foreach ($tmp as $key => $v) {
				$fids = array_merge($fids, explode(',',$v['photo']));
			}
		}
        // adminer funs helpers
		unlink_upload($fids);
	}


}
