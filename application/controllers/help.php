<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Help extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper("div");
		$this->load->database();
	}
	
	
	public function index()
	{
		$data['page_title']="帮助";
		$this->load->view('help');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */