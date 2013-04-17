<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('check');
	}
	function index()
	{
		$table="news_category";
		$this->db->order_by("weizhi","desc"); 
		$query=$this->db->get($table);
		$temp['res']=$query->result();
		$this->load->view('admin/news/category',$temp);
	}
	function add_category()
	{
		$table="news_category";
		$arr['name']=$this->input->post('name');
		$arr['biaoshi']=$this->input->post('biaoshi');
		$arr['weizhi']=$this->input->post('weizhi');
		$res=$this->db->insert($table,$arr);
		if($res)
		{
			$this->message->showmessage('��ӳɹ�','admin_login/news');exit();
		}
		else
		{
			$this->message->showmessage('���ʧ�ܣ�ϵͳ��æ������д����','admin_login/news');exit();
		}
	}
	function change_category()
	{
		$table="news_category";
		$where['id']=$this->input->post('id');
		$arr['name']=$this->input->post('name');
		$arr['biaoshi']=$this->input->post('biaoshi');
		$arr['weizhi']=$this->input->post('weizhi');
		$res=$this->db->update($table,$arr,$where);
		if($res)
		{
			$this->message->showmessage('�޸ĳɹ�','admin_login/news');exit();
		}
		else
		{
			$this->message->showmessage('�޸�ʧ�ܣ�ϵͳ��æ������д����','admin_login/news');exit();
		}
	}
	function del_category($id)
	{
		$table="news_category";
		$where['id']=$id;
		$res=$this->db->delete($table,$where);
		if($res)
		{
			$this->message->showmessage('ɾ���ɹ�','admin_login/news');exit();
		}
		else
		{
			$this->message->showmessage('ɾ��ʧ�ܣ�ϵͳ��æ������д����','admin_login/news');exit();
		}
	}
	function add_news()
	{
		$table="news_category";
		$this->db->order_by('weizhi','desc');
		$query=$this->db->get($table);
		$count=$query->num_rows();
		$check="wu";
		$temp['check']=$check;
		if($count<=0)
		{
			$this->message->showmessage('û����ӷ��࣬������ӷ���','admin_login/news');exit();
		}
		$temp['res']=$query->result();
		$this->load->model('editor');
		$temp['kind']=$this->editor->kind('content','');
		$temp['zz']=$this->session->userdata('manager');
		$temp['title']="";
		$temp['shijian']=$this->editor->shijian();
		$temp['ll']="��վ";
		$temp['fl']="";
		$this->load->view('admin/news/add_news',$temp);
	}
	function form_news()
	{
		$arr['title']=$this->input->post('title');
		$arr['zz']=$this->input->post('zz');
		$arr['ll']=$this->input->post('ll');
		$arr['shijian']=$this->input->post('shijian');
		$arr['content']=$this->input->post('content');
		$arr['fl']=$this->input->post('select');
		$table="news";
		$check=$this->input->post('check');
		if($check=="wu")
		{
			$res=$this->db->insert($table,$arr);
			$info="���";
			$url="add_news";
		}
		else
		{
			$where['id']=$check;
			$info="�޸�";
			$res=$this->db->update($table,$arr,$where);
			$url="edit_news/".$check;
		}
		if($res)
		{
			$this->message->showmessage($info.'�ɹ�','admin_login/news/'.$url);exit();
		}
		else
		{
			$this->message->showmessage($info.'ʧ��','admin_login/news/'.$url);exit();
		}
	}
	function news_list($start_row=0)
	{
		
		$table="news_category";
		$this->db->order_by('weizhi','desc');
		$query=$this->db->get($table);
		$count=$query->num_rows();
		if($count<=0)
		{
			$this->message->showmessage('û����ӷ��࣬������ӷ���','admin_login/news');exit();
		}
		else
		{
			$temp['res_f']=$query->result();
		  
		}
		
		$table='news';
		$this->load->model('editor');
		$url=site_url('admin_login/news/news_list/');
		$where="";
		$result=$this->editor->show_list($table,$url,4,$start_row,$where,'id');
		$temp['links']=$result['links'];
		$temp['res']=$result['res'];
		$temp['total_rows']=$result['total_rows'];
		$temp['per_page']=$result['per_page'];
		$this->load->view('admin/news/news_list',$temp);
	}
	function del_news($id)
	{
		$table="news";
		$where['id']=$id;
		$res=$this->db->delete($table,$where);
		if($res)
		{
			$this->message->showmessage('ɾ���ɹ�','admin_login/news/news_list');exit();
		}
		else
		{
			$this->message->showmessage('ɾ��ʧ�ܣ�ϵͳ��æ������д����','admin_login/news/news_list');exit();
		}
	}
	function edit_news($id)
	{
		$table="news_category";
		$this->db->order_by('weizhi','desc');
		$query=$this->db->get($table);
		$count=$query->num_rows();
		$check="wu";
		$temp['check']=$id;
		if($count<=0)
		{
			$this->message->showmessage('û����ӷ��࣬������ӷ���','admin_login/news');exit();
		}
		$temp['res']=$query->result();
		$where['id']=$id;
		$table_c="news";
		$query_c=$this->db->get_where($table_c,$where);
		$res_c=$query_c->result();
		foreach($res_c as $key){
			$this->load->model('editor');
			$temp['kind']=$this->editor->kind('content',$key->content);
			$temp['zz']=$key->zz;
			$temp['title']=$key->title;
			$temp['shijian']=$key->shijian;
			$temp['ll']=$key->ll;
			$temp['fl']=$key->fl;
		}
		$this->load->view('admin/news/add_news',$temp);
	}
	function del_all()
	{
		$id=$this->input->post('id');
		if($id=="")
		{
			$this->message->showmessage('��ѡ��Ҫɾ������','admin_login/news/news_list');exit();
		}
		
		$table="news";
		$this->db->where_in('id',$id);
		$res=$this->db->delete('news');
 		if($res)
		{
			$this->message->showmessage('ɾ���ɹ�','admin_login/news/news_list');exit();
		}
		else
		{
			$this->message->showmessage('ɾ��ʧ��','admin_login/news/news_list');exit();
		}
	
	}
}

