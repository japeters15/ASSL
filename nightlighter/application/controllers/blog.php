<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {

public function __construct() {
parent::__construct();
$this->load->library(array('session'));
$this->load->helper(array('url'));
$this->load->helper('cookie');
$this->load->model('blog_model');
}
public function index() {
$this->load->view('addCategory');
}
public function addCategory() {
if(isset($_POST['addCategory']))
{
$data = array('Type'=>$this->input->post('title'),
'Description'=>$this->input->post('desc'),
'CreatedDate'=>date('Y-m-d h:i:s')
);
$this->db->insert('Category',$data);
$data['msg'] = "Category inserted Successfully";
}
$data['error'] = '';
$this->load->view('addCategory',$data);
}
public function addArticle() {
if(isset($_POST['
addArticle']))
{
if (isset($_FILES['userfile']))
{
//echo "hello";die;
$this->load->library('upload');
$files = $_FILES;
$cpt = count($_FILES['userfile']['name']);
for($i=0; $i<$cpt; $i++)
{
$_FILES['userfile']['name']= str_replace(' ', '-',$files['userfile']['name'][$i]);
$_FILES['userfile']['type']= $files['userfile']['type'][$i];
$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
$_FILES['userfile']['error']= $files['userfile']['error'][$i];
$_FILES['userfile']['size']= $files['userfile']['size'][$i];
$this->upload->initialize($this->set_upload_options());
$this->upload->do_upload();
$fileName = str_replace(' ', '-',$_FILES['userfile']['name']);
$images[] = $fileName;
}
$fileName = implode(',',$images);
$task = $this->blog_model->addArticle($fileName);
}else{
$filename='';
$task = $this->blog_model->addArticle($filename);
}
}
$data['category'] = $this->blog_model->allCategory();
$this->load->view('addArticle',$data);
}
private function set_upload_options()
{
//  upload an image options
$config = array();
$config['upload_path'] = './upload/';
$config['allowed_types'] = 'gif|jpg|png';
$config['max_size']      = '0';
$config['overwrite']     = FALSE;
return $config;
}
public function allCategory()
{
$this->db->select('*');
$this->db->from('Category');
$data['Category'] = $this->db->get()->result();
$this->load->view('allCategory',$data);
}
public function allArticle()
{
$this->db->select('*');
$this->db->from('Article');
$data['Article'] = $this->db->get()->result();
$this->load->view('allArticle',$data);
}
public function editArticle($id)
{
$this->db->select('*');
$this->db->from('Article');
$data['Article'] = $this->db->get()->result();
$data['category'] = $this->blog_model->allCategory();
$data['getArticleById'] = $this->blog_model->getArticleById($id);
$data['main_content'] = 'editArticle';
$this->load->view('editArticle',$data);
}
public function deleteArticle($id)
{
$this->db->where('Id',$id);
$this->db->delete('Article');
$this->db->select('*');
$this->db->from('Article');
$data['Article'] = $this->db->get()->result();
$this->load->view('allArticle',$data);
}
public function editCategory($id)
{
$data['getCategoryById'] = $this->blog_model->getCategoryById($id);
$this->load->view('editCategory',$data);
}
public function deleteCategory($id)
{
$this->db->where('Id',$id);
$this->db->delete('Article');
$this->db->select('*');
$this->db->from('Category');
$data['Category'] = $this->db->get()->result();
$this->load->view('allCategory',$data);
}
}