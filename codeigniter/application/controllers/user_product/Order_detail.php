<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_detail extends CI_Controller 
{
	
public function index($elem)
	{
session_start();
$this->load->model('Mysql');
$this->load->model('Mymodel');

include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;
	
	$order_idx = $elem;
	
	
	$search = "";
		$search .= " and play_cart.user_id = '{$_SESSION['id']}'  and ifnull(play_cart.is_order, 'Y') = 'N' and ifnull(play_cart.is_delete, 'N') = 'N' and play_cart.order_idx = '{$order_idx}' ";
	

	$res=Array();
	$select = "play_cart.idx as cart_idx, play_cart.product_cnt, play_product.idx as product_idx, play_product.name as product_name, price, play_product_category.name as category_name, play_product.name as product_name";
	$table = " play_cart ";
	$join_table = "play_product, play_product_category ";
	$on = "play_cart.product_idx = play_product.idx and play_product.category = play_product_category.idx";
	$and = $search . " ORDER BY play_cart.reg_time";
	
	$query = "select play_cart.idx as cart_idx, play_cart.product_cnt, play_product.idx as product_idx, play_product.name as product_name, price, play_product_category.name as category_name, play_product.name as product_name from play_cart, play_product, play_product_category where play_cart.product_idx = play_product.idx and play_product.category = play_product_category.idx " . $search . "   ORDER BY play_cart.reg_time";
	//echo $query ;
	
	$res['list'] = $this->Mysql->query($query);

	$query = "select total_price, address, phone_num, order_name, address_1, phone_number_1, receve_name, reg_time, pay_type, order_status, updated_time from play_order where idx = '{$order_idx}' " ;
	
	$res['order'] = $this->Mysql->query($query);
	
	$res['idx'] = $order_idx;

	$this->load->view('top',$res);
	$this->load->view('order_detail',$res);

	/*
if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}
*/
	}
}

?>