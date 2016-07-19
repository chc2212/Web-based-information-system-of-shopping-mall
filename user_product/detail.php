<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

$res=Array();


	$select = "a.*, b.name as category_name ";
	$and = " and a.idx = '".$_GET['idx']."' and a.category = b.idx ";
	$table = "play_product a, play_product_category b";

	$res['list'] = $service->get_list($select, $and, $table);



if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}
?>