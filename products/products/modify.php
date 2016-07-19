<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

$res=Array();

if( $_POST ){

	$table = "play_product";
	$perm=array("name","category","price");
	$affectedrow = $service->userUpdate($table, $perm, $_POST);

	if($affectedrow == 0){
		echo "<script>alert('fail!');</script>";
		echo "<script>history.go(-1);</script>";
	}else{
		echo "<script>alert('complete!');</script>";
		echo "<script>location.href='/products/products/list.php'</script>";
	}
}

if( $_GET ){
	$select = "*";
	$and = "&& idx = '".$_GET['idx']."'";
	$table = "play_product";

	$res['list'] = $service->get_list($select, $and, $table);
	
	$select = "*";
	$and = "";
	$table = "play_product_category";
	$res['category'] = $service->get_list($select, $and, $table);
	
}


if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}
?>