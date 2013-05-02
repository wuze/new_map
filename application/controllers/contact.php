<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
	}

	public function index(){
		
		
		$this->db->select("*");
		$this->db->where('oname','content_us');
		$ret=$this->db->get('other');
		
		$result = $ret->result_array();
		if( $result )
			$data['contact'] = $result[0];
		else 
			$data['contact'] = '';
		
		$json=file_get_contents("http://www.weather.com.cn/data/cityinfo/101230101.html");//福州的天气
		$wether =  json_decode($json,true); 
		$data['wether'] = $wether['weatherinfo'];
		$data['page_title']="联系我们";
		$this->load->view('contact',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */