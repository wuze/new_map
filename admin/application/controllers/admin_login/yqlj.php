<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yqlj extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('check');
	}
	function index()
	{
		$table="yqlj";
		$this->db->order_by("weizhi","desc"); 
		$query=$this->db->get($table);
		
		$temp['res']=$query->result();
		$this->load->view('admin/orther/add_yqlj',$temp);
	}
	function del_yqlj($id)
	{
		$table="yqlj";
		$where['id']=$id;
		$res=$this->db->delete($table,$where);
		if($res)
		{
			$this->message->showmessage('ɾ���ɹ�','admin_login/yqlj/');exit();
		}
		else
		{
			$this->message->showmessage('ɾ��ʧ�ܣ�ϵͳ��æ������д����','admin_login/yqlj/');exit();
		}
	}
	function change_yqlj()
	{
		$table="yqlj";
		$where['id']=$this->input->post('id');
		$arr['name']=$this->input->post('name');
		$arr['url']=$this->input->post('url');
		$arr['weizhi']=$this->input->post('weizhi');
		$arr['logo']=$this->input->post('logo');
		$res=$this->db->update($table,$arr,$where);
		if($res)
		{
			$this->message->showmessage('�޸ĳɹ�','admin_login/yqlj/');exit();
		}
		else
		{
			$this->message->showmessage('�޸�ʧ�ܣ�ϵͳ��æ������д����','admin_login/yqlj/');exit();
		}
	}
	function add_yqlj()
	{
		$table="yqlj";
		$arr['name']=$this->input->post('name');
		$arr['url']=$this->input->post('url');
		$arr['weizhi']=$this->input->post('weizhi');
		$arr['logo']=$this->input->post('logo');
		$res=$this->db->insert($table,$arr);
		if($res)
		{
			$this->message->showmessage('��ӳɹ�','admin_login/yqlj/');exit();
		}
		else
		{
			$this->message->showmessage('���ʧ�ܣ�ϵͳ��æ������д����','admin_login/yqlj/');exit();
		}
	}
}