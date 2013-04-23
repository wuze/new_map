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
		
		$this->db->select("*");
		$this->db->where('oname','about_us');
		$ret=$this->db->get('other');
		
		$result = $ret->result_array();
		
	
		$json=file_get_contents("http://www.weather.com.cn/data/cityinfo/101230101.html");//福州的天气
		$wether =  json_decode($json,true); 
		$data['wether'] = $wether['weatherinfo'];
		$data['about'] = $result[0];
		
		$this->load->view('about',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */