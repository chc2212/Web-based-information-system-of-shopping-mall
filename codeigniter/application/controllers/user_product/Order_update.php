<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_update extends CI_Controller 
{
	
public function index()
	{
session_start();
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

$this->load->model('Mysql');
$this->load->model('Mymodel');
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;


	
	$cart_idx = $_REQUEST["cart_idx"];	

	if ($cart_idx == ""){
		?>
			<script>
				//alert("cart is empty!");
				location.href="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/cart_list";
			</script>
		<?
		exit;
	}

	$product_cnt = $_REQUEST["product_cnt"];
	
	for ($i = 0; $i < sizeof($cart_idx); $i++){
		$query = "update play_cart set product_cnt = '{$product_cnt[$i]}' where idx = '{$cart_idx[$i]}' ";
		$this->Mysql->query($query);
	}



	

	$query = "insert into play_order ( user_id, total_price) values ('{$_SESSION['id']}', (select sum(product_price * product_cnt) from play_cart where user_id = '{$_SESSION['id']}' and ifnull(is_order, 'N') = 'N' and ifnull(is_delete, 'N') = 'N') )" ;
	$this->Mysql->query($query);
	
	$select = " max(idx) as idx";
	$and = " and user_id =  '{$_SESSION['id']}' ";
	$table = "play_order";

	$res = $this->Mymodel->get_list($select, $and, $table);	
	
	

	//1111

		$searchs = "";
		$searchs.= " and play_cart.user_id = '{$_SESSION['id']}'  and ifnull(play_cart.is_order, 'N') = 'N' and ifnull(play_cart.is_delete, 'N') = 'N'";
	

	$ress=Array();
	$selects = "play_cart.idx as cart_idx, play_cart.product_cnt as product_cnt, play_product.idx as product_idx, play_product.name as product_name, play_product.price as price, play_product_category.name as category_name, play_product.name as product_name";
	$tables = " play_cart ";
	$join_tables = "play_product, play_product_category ";
	$ons = "play_cart.product_idx = play_product.idx and play_product.category = play_product_category.idx";
	$ands = $searchs . " ORDER BY play_cart.reg_time";
	
	$querys = "select play_cart.idx as cart_idx, play_cart.product_cnt as product_cnt, play_product.idx as product_idx, play_product.name as product_name, play_product.price as price, play_product_category.name as category_name, play_product.name as product_name from play_cart, play_product, play_product_category where play_cart.product_idx = play_product.idx and play_product.category = play_product_category.idx and ifnull(is_order, 'N') = 'N' and ifnull(is_delete, 'N') = 'N' " . $searchs . "   ORDER BY play_cart.reg_time";
	
	
	$ress['list'] = $this->Mysql->query($querys);



foreach ($ress['list'] As $key => $val){
	
	$total_sales =    $val['product_cnt'] * $val['price'];


	$query = "insert into play_orderitems (user_id,product_idx,quantity,total_sales,date_time,order_idx) values ('{$_SESSION['id']}', '{$val['product_idx']}','{$val['product_cnt']}','{$total_sales}',now(),'{$res[0]["idx"]}') ";


$this->Mysql->query($query);
}


//111


	$query = "update play_cart set order_idx = '{$res[0]["idx"]}' , is_order = 'Y' where user_id = '{$_SESSION['id']}' and ifnull(is_order, 'N') = 'N' and ifnull(is_delete, 'N') = 'N' ";
$this->Mysql->query($query);

	


	
	$golink = "http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/order/index/" . $res[0]["idx"];
	
	if ($this->Mysql->query($query)){
		echo "<script>alert('Success!')</script>";
		echo "<script>location.href='".$golink."'</script>";
	}else{
		echo "<script>alert('Fail!')</script>";
	}
	
	}
}




?>