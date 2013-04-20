<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Culture extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('check');
	}
	/**************************************************************************/
	function traditional($start_row=0){
		
		$table = 'content';
		$this->load->model('editor');
		$url=site_url('admin_login/culture/traditional/');
		$where = "cid = 2";
		//$where = array("parentid" => 0 );
		//$where = "";
		$result=$this->editor->show_list($table,$url,4,$start_row,$where,'id');
		$temp['links']=$result['links'];
		$temp['res']=$result['res'];
		$temp['total_rows']=$result['total_rows'];
		$temp['per_page']=$result['per_page'];
		$this->load->view('admin/culture/traditional',$temp);
	}
    function add_traditional()
	{	
		$id = $this->uri->segment(4);
		$table = 'map_category';
		$where = "parentid = 0 and cat = 2";
		$query= $this->db->get_where($table,$where);
		$first_cate = $query->result();
		foreach ($first_cate as $key => $val){
			$where = "parentid = $val->id";
			$query= $this->db->get_where($table,$where);
			$val->sub_category = $query->result();
			$first_cate[$key] = $val;
		}
		
		
		$data['first_cate'] = $first_cate;
		$data['content'] = array();
		$data['id'] = $id;
		$this->load->view('admin/culture/add_traditional',$data);
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
		$where = "parentid = 0 and cat = 2";
		$query= $this->db->get_where($table,$where);
		$first_cate = $query->result();
		
		$table="content";
		$id = $this->uri->segment(4);
		$where = "id = $id";
		$query = $this->db->get_where($table,$where);
		$content = current($query->result_array());
		
		$table="category";
		foreach ($first_cate as $key => $val){
			$where = "parentid = $val->id";
			$query= $this->db->get_where($table,$where);
			$val->sub_category = $query->result();
			$first_cate[$key] = $val;
		}
		
		$where = "id = {$content['cat_id']}";
		$query= $this->db->get_where($table,$where);
		$first_cate_selected= current($query->result_array());
		$first_cate_selected_id = $first_cate_selected['parentid'];
		$data['content']=$content;
		$data['id'] = $id;
		$data['first_cate']=$first_cate;
		$data['first_cate_selected'] = $first_cate_selected_id;
		$this->load->view('admin/culture/edit_traditional',$data);
	}
	
	function form_culture()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = false;
		$config['encrypt_name'] = true;
		$config['max_size'] = '10000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);
		$field_name = "img_url";
		$upload_result = $this->upload->do_upload($field_name);
		$result = $this->upload->display_errors();
		$imgdata = $this->upload->data();
		if($upload_result){
			$arr['img_url']= 'upload/'.$imgdata['file_name'];
		}
		$arr['addr_name']=$this->input->post('addr_name');
		$arr['cid']=$this->input->post('cid');
		$arr['telephone']=$this->input->post('telephone');
		$arr['address']=$this->input->post('address');
		$arr['zipcode']=$this->input->post('zipcode');
		$arr['web_url']=$this->input->post('web_url');
		$arr['lng']=$this->input->post('lng');
		$arr['lat']=$this->input->post('lat');
		$cat_id = $this->input->post('cat_id');
		if($cat_id){
			$arr['cat_id'] = $this->input->post('cat_id');
		}
		else{
			$arr['cat_id'] = $this->input->post('first_cate');
		}
		$table="map_content";
		$check=$this->input->post('id');
		
		if($arr['cid']==1){
			$url = 'indexing';
		}else{
			$url = 'traditional';
		}
		if(!$check)
		{	
			$info = 'add culture infomation';
			$res=$this->db->insert($table,$arr);
		}
		else
		{	
			$info = 'modify culture infomation';
			$where['id']=$check;
			$res=$this->db->update($table,$arr,$where);
		}
		if($res)
		{
			$this->message->showmessage($info.'success','admin_login/culture/'.$url);exit();
		}
		else
		{
			$this->message->showmessage($info.'failed','admin_login/culture/'.$url);exit();
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
	function detail_traditional($id){
		$data = array();
		$this->load->view('admin/culture/detail_traditional',$data);
	}
	
	function upload(){
		/* Note: This thumbnail creation script requires the GD PHP Extension.
		 If GD is not installed correctly PHP does not render this page correctly
		and SWFUpload will get "stuck" never calling uploadSuccess or uploadError
		*/
		$target_width = 100;
		$target_height = 100;
		// Get the session Id passed from SWFUpload. We have to do this to work-around the Flash Player Cookie Bug
		if (isset($_POST["PHPSESSID"])) {
			session_id($_POST["PHPSESSID"]);
		}
		
		//session_start();
		ini_set("html_errors", "0");
		
		// Check the upload
		if (!isset($_FILES["Filedata"]) || !is_uploaded_file($_FILES["Filedata"]["tmp_name"]) || $_FILES["Filedata"]["error"] != 0) {
			echo "ERROR:invalid upload";
			exit(0);
		}
		
		// Get the image and create a thumbnail
		$img = imagecreatefromjpeg($_FILES["Filedata"]["tmp_name"]);
		if (!$img) {
			echo "ERROR:could not create image handle ". $_FILES["Filedata"]["tmp_name"];
			exit(0);
		}
		
		$width = imageSX($img);
		$height = imageSY($img);
		
		if (!$width || !$height) {
			echo "ERROR:Invalid width or height";
			exit(0);
		}
		
		// Build the thumbnail
		
		$target_ratio = $target_width / $target_height;
		
		$img_ratio = $width / $height;
		
		if ($target_ratio > $img_ratio) {
			$new_height = $target_height;
			$new_width = $img_ratio * $target_height;
		} else {
			$new_height = $target_width / $img_ratio;
			$new_width = $target_width;
		}
		
		if ($new_height > $target_height) {
			$new_height = $target_height;
		}
		if ($new_width > $target_width) {
			$new_height = $target_width;
		}
		
		$new_img = ImageCreateTrueColor($target_width, $target_height);
		if (!@imagefilledrectangle($new_img, 0, 0, $target_width-1, $target_height-1, 0)) {	// Fill the image black
			echo "ERROR:Could not fill new image";
			exit(0);
		}
		
		if (!@imagecopyresampled($new_img, $img, ($target_width-$new_width)/2, ($target_height-$new_height)/2, 0, 0, $new_width, $new_height, $width, $height)) {
			echo "ERROR:Could not resize image";
			exit(0);
		}
		
		if (!isset($_SESSION["file_info"])) {
			$_SESSION["file_info"] = array();
		}
		
		// Use a output buffering to load the image into a variable
		ob_start();
		imagejpeg($new_img);
		$imagevariable = ob_get_contents();
		ob_end_clean();
		
		$file_id = md5($_FILES["Filedata"]["tmp_name"] + rand()*100000);
		
		$_SESSION["file_info"][$file_id] = $imagevariable;
		
		echo "FILEID:" . $file_id;	// Return the file id to the script
	}
	function thumbnail(){
		
		// This script accepts an ID and looks in the user's session for stored thumbnail data.
		// It then streams the data to the browser as an image
		
		// Work around the Flash Player Cookie Bug
		if (isset($_POST["PHPSESSID"])) {
			session_id($_POST["PHPSESSID"]);
		}
		
		//session_start();
		
		//$image_id = isset($_GET["id"]) ? $_GET["id"] : false;
		$id = $this->uri->segment(4);
		
		$image_id = $id ? $id : false;
		if ($image_id === false) {
			header("HTTP/1.1 500 Internal Server Error");
			echo "No ID";
			exit(0);
		}
		
		if (!is_array($_SESSION["file_info"]) || !isset($_SESSION["file_info"][$image_id])) {
			header("HTTP/1.1 404 Not found");
			exit(0);
		}
		
		header("Content-type: image/jpeg") ;
		header("Content-Length: ".strlen($_SESSION["file_info"][$image_id]));
		echo $_SESSION["file_info"][$image_id];
		exit(0);
	}
	/*******************多附件上传*************************************************************/
		function detail(){
			$data = array();
			$this->load->view('admin/culture/detail',$data);
		}
		function blue_upload(){
			//require('upload.class.php');
			$this->load->library('UploadHandler');
			$upload_handler = new UploadHandler();
			header('Pragma: no-cache');
			header('Cache-Control: no-store, no-cache, must-revalidate');
			header('Content-Disposition: inline; filename="files.json"');
			header('X-Content-Type-Options: nosniff');
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
			header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');
			
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'OPTIONS':
					break;
				case 'HEAD':
				case 'GET':
					$upload_handler->get();
					break;
				case 'POST':
					if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
						$upload_handler->delete();
					} else {
						$upload_handler->post();
					}
					break;
				case 'DELETE':
					$upload_handler->delete();
					break;
				default:
					header('HTTP/1.1 405 Method Not Allowed');
			}
				
		}
	/********************************************************************************/
	
}

