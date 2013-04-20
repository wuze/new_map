<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('check');
	}
	function top()
	{
		$temp['username']=$this->session->userdata('manager');
		$this->load->view('admin/top',$temp);
	}
	function main()
	{
		$this->load->view('admin/main');
	}
	function left()
	{
		$this->load->view('admin/menu/menu');
	}
	function news()
	{
		$this->load->view('admin/menu/news');
	}
	function qita()
	{
		$this->load->view('admin/menu/qita');
	}
	/***************************************************************************/
	function category()
	{
		$this->load->view('admin/menu/category');
	}
	function culture(){
		$this->load->view('admin/menu/culture');
	}
	/***************************************************************************/
}