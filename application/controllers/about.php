<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class About extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper("div");
		$this->load->database();
	}
	
	
	public function index()
	{
		$data['page_title']="关于我们";
		$this->load->view('about');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */