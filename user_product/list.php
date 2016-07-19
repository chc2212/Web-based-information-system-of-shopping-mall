<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;


	$search = "";
	$gProduct_name = $_REQUEST["gProduct_name"];
	$gCategory = $_REQUEST["gCategory"];
	
	if ($gProduct_name != ""){
		$search .= " and play_product.name like '%" . $gProduct_name ."%' ";
	}
	if ($gCategory != ""){
		$search .= " and play_product.category = '" . $gCategory ."' ";
	}	

//1111

	$res=Array();


	
/*
	$table = "play_product";
	$join_table1 = "play_product_category";
	$on1 = "play_product.category = play_product_category.idx";
	$join_table2 = "play_orderitems";
	$on2 = "play_product.idx = play_orderitems.product_idx";
	$and = '';

$res['list'] = $service->get_list_by_join2($select, $table, $join_table1, $on1, $join_table2, $on2, $and);
*/




	$select = "play_product.idx as product_idx, price, play_product.name as product_name, play_product.price as product_price, play_product_sales.rate as product_rate, play_product_category.name as category_name";
	$table = "play_product";
	$join_table1 = "play_product_sales";
	$on1 = "play_product.idx = play_product_sales.gidx";
	$join_table2 = "play_product_category";
	$on2 = "play_product.category = play_product_category.idx";
	$and = $search . " ORDER BY play_product.reg_time";
	
	$res['sales'] = $service->get_list_by_join2($select, $table, $join_table1, $on1, $join_table2, $on2, $and);



	///1111

	

	//$res=Array();
	$select = "play_product.idx as product_idx, play_product.name as product_name, price, play_product_category.name as category_name, play_product.name as product_name";
	$table = "play_product";
	$join_table = "play_product_category";
	$on = "play_product.category = play_product_category.idx";
	$and = $search . " ORDER BY play_product.reg_time";
	
	$res['list'] = $service->get_list_by_join($select, $table, $join_table, $on, $and);

	
	$select = "*";
	$and = "";
	$table = "play_product_category";
	$res['category'] = $service->get_list($select, $and, $table);	
	
	$res['gCategory'] = $gCategory;
	
	$res['gProduct_name'] = $gProduct_name;
	
if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}

?>