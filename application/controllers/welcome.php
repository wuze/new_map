<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Welcome extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper("div");
		$this->load->database();
	}
	
	
	public function index()
	{
		$data['page_title']="首页";
		$this->load->view('home');
	}
	
	public function GetInitPoint()
	{
		
		$this->db->select("*");
		$ret = $this->db->get('content',0,10);
		$data['data'] = $ret->result_array();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */