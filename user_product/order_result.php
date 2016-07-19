<?php
session_start();
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;
	
	$order_idx = $_POST["order_idx"];
	$address = $_POST["address"];
	$phone_num = $_POST["phone_num"];
	$order_name = $_POST["order_name"];
	$address_1 = $_POST["address_1"];
	$phone_number_1 = $_POST["phone_number_1"];
	$receve_name = $_POST["receve_name"];
	$pay_type = $_POST["pay_type"];
	$card_num = $_POST["card_num"];
	$card_pass = $_POST["card_pass"];
	$card_desYear = $_POST["card_desYear"];
	$card_desMonth = $_POST["card_desMonth"];	
	$Depositor = $_POST["Depositor"];
	
	$query = "update play_order set 
					address =  '{$address}'
					, phone_num = '{$phone_num}'
					, order_name = '{$order_name}'
					, address_1 = '{$address_1}'
					, phone_number_1 = '{$phone_number_1}'
					, receve_name = '{$receve_name}'
					, reg_time = now()
					, pay_type = '{$pay_type}'
					, order_status = 'ordered'
					, updated_time = now()
					,card_num = '{$card_num}'
					,card_pass = '{$card_pass}'
					,card_desYear = '{$card_desYear}'
					,card_desMonth = '{$card_desMonth}'
					,Depositor = '{$Depositor}'
					where idx = '{$order_idx}'

	";
	
	//echo $query;
	$service->db->query($query);
	
	$golink = "/user_product/order_list.php";
	
	if ($service->db->query($query)){
		echo "<script>alert('Success!')</script>";
		echo "<script>location.href='".$golink."'</script>";
	}else{
		echo "<script>alert('Fail!')</script>";
	}
	




?>