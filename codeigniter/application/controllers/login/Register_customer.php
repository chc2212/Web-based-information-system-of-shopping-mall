<?php
class Register_customer extends CI_Controller 
{
public function index()
	{
session_start();

$this->load->model('Mysql');
$this->load->model('Mymodel');
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

if( $_POST ){
	
	$table = "play_user";
	$perm=array("user_id","password","first_name","last_name","age","salary","type");
	
	if ($this->Mymodel->userInsert($table, $perm, $_POST)){
		
		echo "<script>alert('registration is successful!')</script>";
		echo "<script>location.href='http://cs-server.usc.edu:31239/codeigniter/index.php/start'</script>";
	}else{
		echo "<script>alert('you fail to registration')</script>";
	}

}

	$this->load->view('top');
	$this->load->view('register_customer');
/*
if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
} 
*/
	}
}
?>