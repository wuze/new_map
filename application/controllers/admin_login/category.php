<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('check');
	}
	/**************************************************************************/
	function traditional($start_row=0){
		
		$table = 'category';
		$this->load->model('editor');
		$url=site_url('admin_login/category/traditional/');
		$where = "parentid = 0 and cat = 2";
		//$where = array("parentid" => 0 );
		//$where = "";
		$result=$this->editor->show_list($table,$url,4,$start_row,$where,'id');
		$temp['links']=$result['links'];
		$temp['res']=$result['res'];
		$temp['total_rows']=$result['total_rows'];
		$temp['per_page']=$result['per_page'];
		$this->load->view('admin/category/traditional',$temp);
	}
    function add_traditional()
	{	
		$parentid = $this->uri->segment(4);
		$table = 'map_category';
		$where = "parentid = 0 and cat = 2";
		$query= $this->db->get_where($table,$where);
		$first_cate = $query->result();
		$data['first_cate'] = $first_cate;
		$data['parentid'] = $parentid;
		$this->load->view('admin/category/add_traditional',$data);
	}
	function del_traditional($id){
		//$id = $this->uri->segment(4);
		$id = intval($id);
		$table="category";
		$where['id']=$id;
		$res=$this->db->delete($table,$where);
		if($res)
		{
			$this->message->showmessage('delete success','admin_login/category/traditional');exit();
		}
		else
		{
			$this->message->showmessage('delete failed','admin_login/category/traditional');exit();
		}
	}
	function edit_traditional()
	{
		$table="category";
		anchor();
		$where = "parentid = 0 and cat = 2";
		$query= $this->db->get_where($table,$where);
		$first_cate = $query->result();
		
		$id = $this->uri->segment(4);
		$where = "id = $id";
		$query = $this->db->get_where($table,$where);
		$content =$query->row();
		$data['content']=$content;
		
		$data['first_cate']=$first_cate;
		$this->load->view('admin/category/edit_traditional',$data);
	}
	
	function form_category()
	{
		$arr['catname']=$this->input->post('catname');
		$arr['parentid']=$this->input->post('parentid');
		$arr['cat']=$this->input->post('cat');
		$table="map_category";
		$check=$this->input->post('id');
		if($arr['cat']==1){
			$url = 'indexing';
		}else{
			$url = 'traditional';
		}
		if(!$check)
		{	
			$info = 'add category';
			$res=$this->db->insert($table,$arr);
		}
		else
		{	
			$info = 'modify';
			$where['id']=$check;
			$res=$this->db->update($table,$arr,$where);
		}
		if($res)
		{
			$this->message->showmessage($info.'success','admin_login/category/'.$url);exit();
		}
		else
		{
			$this->message->showmessage($info.'failed','admin_login/category/'.$url);exit();
		}
	}
	/**************************************************************************/
	function indexing($start_row=0){
		
		$table = 'category';
		$this->load->model('editor');
		$url=site_url('admin_login/category/indexing/');
		$where = "parentid = 0 and cat = 1";
		//$where = array("parentid" => 0 );
		//$where = "";
		$result=$this->editor->show_list($table,$url,4,$start_row,$where,'id');
		$temp['links']=$result['links'];
		$temp['res']=$result['res'];
		$temp['total_rows']=$result['total_rows'];
		$temp['per_page']=$result['per_page'];
		$this->load->view('admin/category/indexing',$temp);
	}
    function add_indexing()
	{	
		$parentid = $this->uri->segment(4);
		$table = 'map_category';
		$where = "parentid = 0 and cat = 1";
		$query= $this->db->get_where($table,$where);
		$first_cate = $query->result();
		$data['first_cate'] = $first_cate;
		$data['parentid'] = $parentid;
		$this->load->view('admin/category/add_indexing',$data);
	}
	function del_indexing($id){
		//$id = $this->uri->segment(4);
		$id = intval($id);
		$table="category";
		$where['id']=$id;
		$res=$this->db->delete($table,$where);
		if($res)
		{
			$this->message->showmessage('delete success','admin_login/category/indexing');exit();
		}
		else
		{
			$this->message->showmessage('delete failed','admin_login/category/indexing');exit();
		}
	}
	function edit_indexing()
	{
		$table="category";
		anchor();
		$where = "parentid = 0 and cat = 1";
		$query= $this->db->get_where($table,$where);
		$first_cate = $query->result();
		
		$id = $this->uri->segment(4);
		$where = "id = $id";
		$query = $this->db->get_where($table,$where);
		$content =$query->row();
		$data['content']=$content;
		
		$data['first_cate']=$first_cate;
		$this->load->view('admin/category/edit_indexing',$data);
	}
	
	function form_indexing()
	{
		$arr['catname']=$this->input->post('catname');
		$arr['parentid']=$this->input->post('parentid');
		$arr['cat']=$this->input->post('cat');
		$table="map_category";
		$check=$this->input->post('id');
		if($arr['cat']==1){
			$url = 'indexing';
		}else{
			$url = 'traditioanl';
		}
		if(!$check)
		{	
			$info = 'add category';
			$res=$this->db->insert($table,$arr);
		}
		else
		{	
			$info = 'modify';
			$where['id']=$check;
			$res=$this->db->update($table,$arr,$where);
		}
		if($res)
		{
			$this->message->showmessage($info.'success','admin_login/category/'.$url);exit();
		}
		else
		{
			$this->message->showmessage($info.'failed','admin_login/category/'.$url);exit();
		}
	}
}

