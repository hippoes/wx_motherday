<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Links extends Modules_Controller
 * @author era
 * 外链
 */
class Links extends Modules_Controller{

	protected $rules = array(
		"create" => array(
			array(
				'field'   => 'title',
				'label'   => '标题',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'link',
				'label'   => '链接',
				'rules'   => 'trim'
			)
		),
		"edit" => array(
			array(
				'field'   => 'title',
				'label'   => '标题',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'link',
				'label'   => '链接',
				'rules'   => 'trim'
			)
		),
		"show" => array(
			array(
				'field'   => 'id',
				'label'   => '标识',
				'rules'   => 'trim|numeric'
			),
			array(
				'field'   => 'show',
				'label'   => '状态',
				'rules'   => 'trim|numeric'
			)
		)
	);

	protected function _create_data(){
		$form=$this->input->post();
		$form['timeline'] = time();
		return $form;
	}

}
