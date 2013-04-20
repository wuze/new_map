<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	function index()
	{
		//base_url();
		$temp['xinxi']="";
		$this->load->view('admin/login',$temp);
	}
	function yzm()
	{
		$conf['name']='yzm';
		$this->load->library('captcha_code',$conf);
		$this->captcha_code->show();
	}
	function check_login()
	{
		$yzm=$this->input->post('CheckCode');
		$username=$this->input->post('UserName');
		$userpass=$this->input->post('Password');
		$yzm_session=$this->session->userdata('yzm');
		
		if($yzm==$yzm_session)
		{
			$where['username']=$username;
			$where['password']=sha1($userpass);
			$table="user";
			$query=$this->db->get_where($table,$where);
			$num=$query->num_rows();
			if($num>0)
			{
				$this->session->set_userdata(array('manager'=>$username));
				$this->session->unset_userdata('yzm');
				redirect('admin_login/main');
			}
			else
			{
				$temp['xinxi']="�û����������";
				$this->load->view('admin/login',$temp);
			}
		}
		else
		{
			$temp['xinxi']="��֤���������";
			$this->load->view('admin/login',$temp);
		}
	}
	function login_out()
	{
		$this->session->unset_userdata('manager');
		redirect('admin_login/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */