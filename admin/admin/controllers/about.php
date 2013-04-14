<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends MY_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{	
		$content=$this->input->post("about_us");
		//$str = $this->db->last_query();
		
		
		$this->db->select("*");
		$this->db->where('oname','关于我们');
		$this->db->order_by("create_time", "DESC");
		$result = $this->db->get("other");
		$result_arr = $result->result_array();

		$ret_content = $result_arr[0]['ocontent'];
		
		if( $content )
		{
			if( $ret_content  )
			{			
				$where = "oname='关于我们'";
				$condition = array('ocontent'=>$content);
				$str = $this->db->update_string('other',$condition,$where);
				$ret = $this->db->query( $str );
			}
			else
			{
				$data = array('oname'=>'关于我们',
						  'uid'=>1,//Session::Get("user_id"),
						  'ocontent'=>$content
						 );
				$ret = $this->db->insert('other',$data);
			}

			$result = $content;
			if( $ret )
			{
				Session::Set("Success","写入成功");
			}
			else
			{
				Session::Set("Error","写入失败");
			}
		}
		
		$data['html_title'] = "关于我们";
		$data['content']    = $content?$content:$ret_content;
		$this->load->view('about_index',$data);
	}
	
	

	
	


	

}
















/* End of file Show.php */
/* Location: ./admin/controllers/Show.php */