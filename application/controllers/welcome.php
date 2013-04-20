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
		$type = $_POST['type'];
		
		if( $type )
		$this->db->select("*");
		$ret = $this->db->get('content',2,0);
		$data = $ret->result_array();


		
		if( $data )
		{
			echo json_encode($data);
		}
		else
			echo 0;
	}
	
	
	//获取该景点所有图片	
	public function GetPhoto()
	{
		$oid = $_POST['cid'];
		if( $oid )
		{
			$this->db->select("*");
			$this->db->where("out_id",$oid);
			$ret = $this->db->get('photo');
			$data = $ret->result_array();
		}
		
		
		if( $data )
		{
			echo json_encode($data);
		}
		else
			echo 0;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */