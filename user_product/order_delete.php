<?php
session_start();
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;
	
	$order_idx = $_REQUEST["order_idx"];
	
	$query = "update play_order set 
					is_delete =  'Y'
					, updated_time = now()
					where idx = '{$order_idx}'

	";
	$service->db->query($query);

	$query = "delete from play_orderitems where order_idx = '{$order_idx}'

	";
	$service->db->query($query);

	
	


	$golink = "/user_product/order_list.php";
	
	if ($service->db->query($query)){
	//	echo "<script>alert('Success!')</script>";
		echo "<script>location.href='".$golink."'</script>";
	}else{
		echo "<script>alert('Fail!')</script>";
	}
	




?>