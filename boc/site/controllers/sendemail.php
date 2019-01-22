<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sendemail extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{

		$html="详细内容！";
		$mail = array(
			'subject' => '主题'
			,'message' => $html  
			,'to' => '1642653153@qq.com'
			);
		$res=smtp_sendmail($mail);
		
	}



}
