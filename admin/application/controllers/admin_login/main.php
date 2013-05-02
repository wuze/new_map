<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('check');
	}
	function index()
	{
		
		$this->load->view('admin/index');
	}
	function password()
	{
		$temp['info']="";
		$this->load->view('admin/orther/pass',$temp);
	}
	
	function changpass()
	{
		$where['username']=$this->session->userdata('manager');
		$oldpass=$this->input->post('oldpass');
		$newpass=$this->input->post('newpass');
		$qrpass=$this->input->post('qrpass');
		if($qrpass != $newpass)
		{
			$temp['info']="新密码必须和确认密码一致";
			$this->load->view('admin/orther/pass',$temp);
		}
		else
		{
			$table="user";
			$where['password']=sha1($oldpass);
			$query=$this->db->get_where($table,$where);
			$count=$query->num_rows();
			if($count>0)
			{
				$where_name['username']=$this->session->userdata('manager');
				$arr['password']=sha1($newpass);
				$res=$this->db->update($table,$arr,$where_name);
				if($res)
				{
					$this->message->showmessage('修改成功','admin_login/main/password');exit();
				}
				else
				{
					$this->message->showmessage('系统繁忙，修改失败','admin_login/main/password');exit();
				}
			}
			else
			{
				$temp['info']="旧密码输入错误";
				$this->load->view('admin/orther/pass',$temp);
			}
		}
	}
	
	
	function aboutus()
	{
		$table="other";
		$where['oname']='about_us';
		$query=$this->db->get_where($table,$where);
		$content = $query->result_array();
		$content = current($content);
		if(!empty($content)){
			$about_us = $content['ocontent'];
		}else{
			$about_us = '';
		}
		$this->load->model('editor');
		$data['kind']=$this->editor->kind('content',$about_us);
		$data['content'] = $content;
		$this->load->view('admin/orther/about_us',$data);
	}
	
	
	function form_about_us(){
		$arr['ocontent']=$this->input->post('content');
		$arr['oname']='about_us';
		$table="other";
		$check=$this->input->post('check');
		if(!$check)
		{
			$res=$this->db->insert($table,$arr);
			$info="添加";
			$url="aboutus";
		}
		else
		{
			$where['id']=$check;
			$info="修改";
			$res=$this->db->update($table,$arr,$where);
			$url="aboutus";
		}
		if($res)
		{
			$this->message->showmessage($info.'成功','admin_login/main/'.$url);exit();
		}
		else
		{
			$this->message->showmessage($info.'失败','admin_login/main/'.$url);exit();
		}
	}
	function friends($start_row=0){
		$table = 'other';
		$where = "oname = 'friends'";
		$url=site_url('admin_login/main/friends/');
		
		$this->load->model('editor');
		$result=$this->editor->show_list($table,$url,4,$start_row,$where,'id');
		
		
		$temp['links']=$result['links'];
		$temp['res']=$result['res'];
		$temp['total_rows']=$result['total_rows'];
		$temp['per_page']=$result['per_page'];
		$this->load->view('admin/orther/friends',$temp);
		
	}
	function add_friends(){
		$temp = array();
		$this->load->view('admin/orther/add_friends',$temp);
	}
	function form_friends(){
		$arr['ocontent']=$this->input->post('ocontent');
		$arr['oname']='friends';
		$arr['svar']=$this->input->post('svar');
		$table="other";
		$res=$this->db->insert($table,$arr);
		$url="friends";
		if($res)
		{
			$this->message->showmessage('添加成功','admin_login/main/'.$url);exit();
		}
		else
		{
			$this->message->showmessage('添加失败','admin_login/main/'.$url);exit();
		}
	}
	function del_friends($id){
		$table="other";
		$where['id']=$id;
		$res=$this->db->delete($table,$where);
		if($res)
		{
			$this->message->showmessage('删除成功','admin_login/main/friends');exit();
		}
		else
		{
			$this->message->showmessage('删除失败，系统繁忙或着填写错误','admin_login/main/friends');exit();
		}
	}
	function area($start_row=0){
		$table = 'area';
		$this->load->model('editor');
		$url=site_url('admin_login/orther/area/');
		$where = "parentid = 0";
		//$where = array("parentid" => 0 );
		//$where = "";
		$result=$this->editor->show_list($table,$url,4,$start_row,$where,'id');
		$temp['links']=$result['links'];
		$temp['res']=$result['res'];
		$temp['total_rows']=$result['total_rows'];
		$temp['per_page']=$result['per_page'];
		$this->load->view('admin/orther/area',$temp);
	}
	function add_area(){
		$parentid = $this->uri->segment(4);
		$table = 'map_area';
		$where = "parentid = 0";
		$query= $this->db->get_where($table,$where);
		$first_cate = $query->result();
		$data['first_cate'] = $first_cate;
		$data['parentid'] = $parentid;
		$this->load->view('admin/orther/add_area',$data);
	}
	function form_area(){
		$arr['name']=$this->input->post('name');
		$arr['parentid']=$this->input->post('parentid');
		$table="map_area";
		$check=$this->input->post('id');
		$url = 'area';
		if(!$check)
		{	
			$info = '添加';
			$res=$this->db->insert($table,$arr);
		}
		else
		{	
			$info = '修改';
			$where['id']=$check;
			$res=$this->db->update($table,$arr,$where);
		}
		if($res)
		{
			$this->message->showmessage($info.'成功','admin_login/main/'.$url);exit();
		}
		else
		{
			$this->message->showmessage($info.'失败','admin_login/main/'.$url);exit();
		}
	}
	function del_area($id){
		$id = intval($id);
		$table="area";
		$where['id']=$id;
		$res=$this->db->delete($table,$where);
		if($res)
		{
			$this->message->showmessage('删除成功','admin_login/main/area');exit();
		}
		else
		{
			$this->message->showmessage('删除失败','admin_login/main/area');exit();
		}
	}
	//联系我们
	function contentus(){
		$table="other";
		$where['oname']='content_us';
		$query=$this->db->get_where($table,$where);
		$content = $query->result_array();
		$content = current($content);
		if(!empty($content)){
			$about_us = $content['ocontent'];
		}else{
			$about_us = '';
		}
		$this->load->model('editor');
		$data['kind']=$this->editor->kind('content',$about_us);
		$data['content'] = $content;
		$this->load->view('admin/orther/content_us',$data);
	}
	function form_content_us(){
		$arr['ocontent']=$this->input->post('content');
		$arr['oname']='content_us';
		$table="other";
		$check=$this->input->post('check');
		if(!$check)
		{
			$res=$this->db->insert($table,$arr);
			$info="添加";
		}
		else
		{
			$where['id']=$check;
			$info="修改";
			$res=$this->db->update($table,$arr,$where);
		}
		$url="contentus";
		if($res)
		{
			$this->message->showmessage($info.'成功','admin_login/main/'.$url);exit();
		}
		else
		{
			$this->message->showmessage($info.'失败','admin_login/main/'.$url);exit();
		}
	}
}