<?php
session_start();
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;
	
	if ($_GET["idx"] == "all"){
		$query = "update play_cart set is_delete = 'Y' where user_id = '{$_SESSION['id']}' and ifnull(order_idx, 0) = 0 ";
	}else{
		$query = "update play_cart set is_delete = 'Y' where idx = '{$_GET["idx"]}' ";
	}
	
	$golink = "/user_product/cart_list.php";
	if ($service->db->query($query)){
		echo "<script>alert('Success!')</script>";
		echo "<script>location.href='".$golink."'</script>";
	}else{
		echo "<script>alert('Fail!')</script>";
	}
	




?>