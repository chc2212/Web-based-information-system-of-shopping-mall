<?php

class Delete extends CI_Controller 
{
public function index()
	{
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

$res=Array();

if( $_GET ){
	
	$where = "idx = '".$_GET['idx']."'";
	$table = "play_user";

	$affectedrow = $service->userDelete($table, $where);
	
	if($affectedrow == 0){
		echo "<script>alert('fail!');</script>";
		echo "<script>history.go(-1);</script>";
	}else{
		echo "<script>alert('complete!');</script>";
		echo "<script>location.href='/'</script>";
	}
}
	}
}
?>