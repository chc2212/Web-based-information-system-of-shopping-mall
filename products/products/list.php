<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

	$res=Array();
	$select = "play_product.idx as product_idx, play_product.name as product_name, price, play_product_category.name as category_name, play_product.name as product_name";
	$table = "play_product";
	$join_table = "play_product_category";
	$on = "play_product.category = play_product_category.idx";
	$and = "ORDER BY play_product.reg_time";
	
	$res['list'] = $service->get_list_by_join($select, $table, $join_table, $on, $and);

if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}

?>