<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_delete extends CI_Controller 
{
	
public function index($elem)
	{
session_start();

$this->load->model('Mysql');
$this->load->model('Mymodel');

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;
	
	$order_idx = $elem;
	
	$query = "update play_order set 
					is_delete =  'Y'
					, updated_time = now()
					where idx = '{$order_idx}'

	";
	$this->Mysql->query($query);

	$query = "delete from play_orderitems where order_idx = '{$order_idx}'

	";
	$this->Mysql->query($query);
	
	$golink = "http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/order_list";
	
	if ($this->Mysql->query($query)){
		echo "<script>alert('Success!')</script>";
		echo "<script>location.href='".$golink."'</script>";
	}else{
		echo "<script>alert('Fail!')</script>";
	}
	}
}
	




?>