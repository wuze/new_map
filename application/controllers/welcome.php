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
		$data = array();
		
		$tratidion_sql = " SELECT * FROM map_category WHERE parentid=0 AND cat=2";
	    $tr_c = $this->db->query( $tratidion_sql );
	    
	    $ret  = $tr_c->result_array();

	    if( $ret ){
	    	foreach ($ret as $row)
	    	{
	    			$sql = "select * from map_category where parentid='".$row['id']."'";
	    			$sub_ret=$this->db->query($sql);
	    			$list[$row['catname']] = $sub_ret->result_array();
	    	}
	    }
	    $data['tradition'] = $list;

	    
	    $list2 = array();
	    $index_sql = "select * from map_category WHERE parentid=0 AND cat=1 ";  // 索引类
	    $tr_c=$this->db->query( $index_sql );
	    $ret = $tr_c->result_array();
	    if( $ret )
	    {
	    	foreach ( $ret as $row)
	    	{
	    			$sql = "select * from map_category where parentid='".$row['id']."'";
	    			$sub_ret=$this->db->query($sql);
	    			$list2[$row['catname']] = $sub_ret->result_array();
	    	}
	    }
	    
	    
	    $data['index'] = $list2;
	    
	    
	    $list3 =array();
	    $link_sql = "select * from map_other WHERE oname='about_us' order by create_time desc ";
	    $tr_c=$this->db->query( $link_sql );
	    $list3 = $tr_c->result_array();
	
	    $data['link'] =  $list3;
		$this->load->view('home',$data);
	}
	
	
	
	public function GetInitPoint()
	{
		
		if( $_POST['type'] )
		{
			$this->db->select("*");		
			$this->db->where('cat_id',intval($_POST['type']));
			$ret = $this->db->get('content');
			
			$data = $ret->result_array();
		}
		else{
			$this->db->select("*");		
			$ret = $this->db->get('content',20,0);
			$data = $ret->result_array();
		}
		

		
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