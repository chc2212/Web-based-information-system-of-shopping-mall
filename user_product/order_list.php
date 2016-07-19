<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;
	

	$res=Array();
	
	$query = "select idx, total_price, address, phone_num, order_name, address_1, phone_number_1, receve_name, reg_time, pay_type, order_status, updated_time from play_order where user_id = '{$_SESSION['id']}' and ifnull(is_delete, 'N') = 'N' and ifnull(reg_time, '') != '' order by idx desc	" ;
	
	$res['list'] = $service->db->query($query);

	
if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}

?>