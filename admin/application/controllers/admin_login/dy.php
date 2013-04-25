<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dy extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('editor');
	}
	function index()
	{
		$path = dirname($_SERVER['SCRIPT_FILENAME']).'/../';
		$this->editor->erro($path);
	}
	function del_dy($id)
	{
		$table="dy";
		$where['id']=$id;
		$res=$this->db->delete($table,$where);
		if($res)
		{
			$this->message->showmessage('ɾ���ɹ�','admin_login/dy/');exit();
		}
		else
		{
			$this->message->showmessage('ɾ��ʧ�ܣ�ϵͳ��æ������д����','admin_login/dy/');exit();
		}
	}
	function change_dy()
	{
		$table="dy";
		$where['id']=$this->input->post('id');
		$query=$this->db->get_where($table,$where);
		foreach($query->result() as $key)
		{
			$temp['title']=$key->title;
			$temp['weizhi']=$key->weizhi;
			$temp['biaoshi']=$key->biaoshi;
			$this->load->model('editor');
		    $temp['kind']=$this->editor->kind('content',$key->content);
		}
		$temp['check']=$this->input->post('id');;
		
		$this->db->order_by("weizhi","desc"); 
		$query=$this->db->get($table);
		
		$temp['res']=$query->result();
		$this->load->view('admin/orther/add_dy',$temp);
	}
	function add_dy()
	{
		$table="dy";
		$arr['title']=$this->input->post('title');
		$arr['weizhi']=$this->input->post('weizhi');
		$arr['content']=$this->input->post('content');
		$arr['biaoshi']=$this->input->post('biaoshi');
		$check=$this->input->post('check');
		if($check=="")
		{
			$res=$this->db->insert($table,$arr);
			if($res)
			{
				$this->message->showmessage('��ӳɹ�','admin_login/dy/');exit();
			}
			else
			{
				$this->message->showmessage('���ʧ�ܣ�ϵͳ��æ������д����','admin_login/dy/');exit();
			}
		}
		else
		{
			$where['id']=$check;
			$res=$this->db->update($table,$arr,$where);
			if($res)
			{
				$this->message->showmessage('�޸ĳɹ�','admin_login/dy/');exit();
			}
			else
			{
				$this->message->showmessage('�޸�ʧ�ܣ�ϵͳ��æ������д����','admin_login/dy/');exit();
			}
		}
	}
}