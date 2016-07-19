<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_cart extends CI_Controller 
{	
public function index($elem)
	{
session_start();
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
$this->load->model('Mysql');
$this->load->model('Mymodel');

include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;
	
	if ($elem == "all"){
		$query = "update play_cart set is_delete = 'Y' where user_id = '{$_SESSION['id']}' and ifnull(order_idx, 0) = 0 ";
	}else{
		$query = "update play_cart set is_delete = 'Y' where idx = '{$elem}' ";
	}
	
	$golink = "http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/cart_list";
	if ($this->Mysql->query($query)){
		echo "<script>alert('Success!')</script>";
		echo "<script>location.href='".$golink."'</script>";
	}else{
		echo "<script>alert('Fail!')</script>";
	}
	
	}
}




?>