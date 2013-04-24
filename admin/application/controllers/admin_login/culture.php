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
		$id = intval($id);
		$table = 'photo';
		$where = "out_id = $id";
		$photos = $this->db->get_where($table,$where);
		//echo $this->db->last_query();
		
		$photos_arr = $photos->result_array();
		//var_dump($photos_arr);exit;
		if(!empty($photos_arr)){
			foreach($photos_arr as $key=>$photo){
				$path = dirname($_SERVER['SCRIPT_FILENAME']). '/../upload/'.$photo['img_name'];
				$thumbnails_path = dirname($_SERVER['SCRIPT_FILENAME']). '/../thumbnails/'.$photo['img_name'];
				try{
					unlink($path);
					unlink($thumbnails_path);
				}catch(Exception $e){
					
				}
			}
		}
		$this->db->delete($table,$where);
		$table="content";
		$where = "id = $id";
		$res=$this->db->delete($table,$where);
		if($res)
		{
			$this->message->showmessage('delete success','admin_login/culture/traditional');exit();
		}
		else
		{
			$this->message->showmessage('delete failed','admin_login/culture/traditional');exit();
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
		$config['upload_path'] = '../upload/';
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
		
		$table = 'content';
		$this->load->model('editor');
		$url=site_url('admin_login/culture/traditional/');
		$where = "cid = 1";
		//$where = array("parentid" => 0 );
		//$where = "";
		$result=$this->editor->show_list($table,$url,4,$start_row,$where,'id');
		$temp['links']=$result['links'];
		$temp['res']=$result['res'];
		$temp['total_rows']=$result['total_rows'];
		$temp['per_page']=$result['per_page'];
		$this->load->view('admin/culture/indexing',$temp);
	}
    function add_indexing()
	{	
		$id = $this->uri->segment(4);
		$table = 'map_category';
		$where = "parentid = 0 and cat = 1";
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
		$this->load->view('admin/culture/add_indexing',$data);
	}
	function del_indexing($id){
	$id = intval($id);
		$table = 'photo';
		$where = "out_id = $id";
		$photos = $this->db->get_where($table,$where);
		//echo $this->db->last_query();
		
		$photos_arr = $photos->result_array();
		//var_dump($photos_arr);exit;
		if(!empty($photos_arr)){
			foreach($photos_arr as $key=>$photo){
				$path = dirname($_SERVER['SCRIPT_FILENAME']). '/../upload/'.$photo['img_name'];
				$thumbnails_path = dirname($_SERVER['SCRIPT_FILENAME']). '/../thumbnails/'.$photo['img_name'];
				try{
					unlink($path);
					unlink($thumbnails_path);
				}catch(Exception $e){
					
				}
			}
		}
		$this->db->delete($table,$where);
		$table="content";
		$where = "id = $id";
		$res=$this->db->delete($table,$where);
		if($res)
		{
			$this->message->showmessage('delete success','admin_login/culture/indexing');exit();
		}
		else
		{
			$this->message->showmessage('delete failed','admin_login/culture/indexing');exit();
		}
	}
	function edit_indexing()
	{
		$table="category";
		$where = "parentid = 0 and cat = 1";
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
		$this->load->view('admin/culture/edit_indexing',$data);
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
	
	
	
	/********************************************************************************/
		function detail($id){
			header("Content-type:text/html;charset=gb2312");
			$table="content";
			$where = "id = $id";
			$query= $this->db->get_where($table,$where);
			$content = $query->result_array();
			$content = current($content);
			$data = array();
			$data['content'] = $content;
			$data['id'] = $id;
			$this->load->view('admin/culture/detail',$data);
		}
		function delete_photo(){
			$file_name = $_REQUEST['file_name'];

			$this->load->library('UploadHandler');
			$upload_handler = new UploadHandler();
			$success = $upload_handler->delete($file_name);
			if($success){
					$table = "photo";
					$where['img_name']=$file_name;
					$res=$this->db->delete($table,$where);
			}
			 header('Content-type: application/json');
       		 echo json_encode($success);
		}
		function blue_upload($content_id){
			$table="photo";
			$where = "out_id  =  $content_id";
			$query= $this->db->get_where($table,$where);
			$photo_array = $query->result_array();
			
			$files_name = array();
			$files_title = array();
			if($photo_array){
				foreach($photo_array as $key=>$photo){
					$files_name[] = $photo['img_name'];
					$files_title[] =  urlencode(iconv("gb2312", "UTF-8", $photo['describe']));
				}
			}
			
			
			
			
			$this->load->library('UploadHandler');
			$upload_handler = new UploadHandler();
			header('Pragma: no-cache');
			header('Cache-Control: no-store, no-cache, must-revalidate');
			header('Content-Disposition: inline; filename="files.json"');
			header('X-Content-Type-Options: nosniff');
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
			header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');
			header("Content-type:text/html;charset=gb2312");
			switch ($_SERVER['REQUEST_METHOD']) {
				case 'OPTIONS':
					break;
				case 'HEAD':
				case 'GET':
					$upload_handler->get($files_name,$files_title);
					break;
				case 'POST':
					if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
						$success = $upload_handler->delete();
					} else {
						$table = 'photo';
						$info = $upload_handler->post();
						if(!empty($info)){
								foreach($info as $key=>$val){
									if($val->size){
										$arr = array();
										$describe = iconv('UTF-8','GB2312',urldecode($_POST['title']));
										$arr['describe'] = $describe;
										$arr['img_name'] = $val->name;
										$arr['out_id'] = $content_id;
										$arr['img_url'] = 'upoad/'.$val->name;
									    $res=$this->db->insert($table,$arr);
									    $info[$key]->title = urldecode($_POST['title']);
									}
								}
						}
						header('Vary: Accept');
				        $json = json_encode($info);
				        $redirect = isset($_REQUEST['redirect']) ?
				            stripslashes($_REQUEST['redirect']) : null;
				        if ($redirect) {
				            header('Location: '.sprintf($redirect, rawurlencode($json)));
				            return;
				        }
				        if (isset($_SERVER['HTTP_ACCEPT']) &&
				            (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
				            header('Content-type: application/json');
				        } else {
				            header('Content-type: text/plain');
				        }
				        echo $json;
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

