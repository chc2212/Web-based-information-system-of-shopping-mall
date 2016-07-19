<?php
class Modify extends CI_Controller 
{
public function index($elem)
	{
session_start();

$this->load->model('Mysql');
$this->load->model('Mymodel');
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

$res=Array();


if( $_POST ){

	$table = "play_user";
	$perm=array("user_id","password","first_name","last_name","age","salary");
	$affectedrow = $this->Mymodel->userUpdate($table, $perm, $_POST);
	
	if($affectedrow == 0){
		echo "<script>alert('fail!');</script>";
		echo "<script>history.go(-1);</script>";
	}else{
		//echo "<script>alert('complete!');</script>";
		echo "<script>location.href='http://cs-server.usc.edu:31239/codeigniter/index.php/startt'</script>";
	}
}





if( $elem > -2 ){
	$select = "*";
	$and = "&& idx = '".$elem."'";
	$table = "play_user";
	
	$res['list'] = $this->Mymodel->get_list($select, $and, $table);
}

$res['elem']=$elem;
$this->load->view('top');
$this->load->view('modify',$res);

/*
$path_html = 
include $path_html;
*/


/*
if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}
*/
	}
	




}


?>