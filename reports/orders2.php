<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;


//index, name, category, price, quantity, date
	$res=Array();
	$select = "play_product.idx as product_idx, play_product.name as product_name, price, total_sales,
			play_product_category.name as category_name, play_product.name as product_name, quantity, date_time";
	$table = "play_product";
	$join_table1 = "play_product_category";
	$on1 = "play_product.category = play_product_category.idx";
	$join_table2 = "play_orderitems";
	$on2 = "play_product.idx = play_orderitems.product_idx";
	$and = '';
	if( $_GET ){
		if( $_GET['name']){
			$and .= "&& play_product.name like '%".$_GET['name']."%'";
		}
		if( $_GET['category']){
			$and .= "&& play_product.category = ".$_GET['category'];
		}
		if( $_GET['price1']){
			$and .= "&& price >= ".$_GET['price1'];
		}
		if( $_GET['price2']){
			$and .= "&& price <= ".$_GET['price2'];
		} 
		if( $_GET['sale_start']){
			$and .= "&& sale_start >= '".$_GET['sale_start']."'";
		}
		if( $_GET['sale_end']){
			$and .= "&& sale_end <= '".$_GET['sale_end']."'";
		}
	}

	$and .= " ORDER BY play_orderitems.total_sales desc ";
	
	
	$res['list'] = $service->get_list_by_join2($select, $table, $join_table1, $on1, $join_table2, $on2, $and);
	
	$select = "*";
	$and = "";
	$table = "play_product_category";
	$res['category'] = $service->get_list($select, $and, $table);

if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}

?>