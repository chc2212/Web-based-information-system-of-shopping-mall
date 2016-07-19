<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Add_cart extends CI_Controller 
{

	
public function index()
	{
session_start();
$this->load->model('Mysql');
$this->load->model('Mymodel');
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

	$query = "insert into play_cart (product_idx, user_id, product_price, product_cnt, reg_time) 
			  values ('{$_POST["product_idx"]}', '{$_SESSION['id']}', '{$_POST["product_price"]}', '{$_POST["product_cnt"]}', now() ) " ;
	
	$golink = "http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/cart_list";
	if ($this->Mysql->query($query)){
		if ($_POST["insert_cart_type"] == "direct"){
			$query = "insert into play_order ( user_id, total_price) values ('{$_SESSION['id']}', (select sum(product_price * product_cnt) from play_cart where user_id = '{$_SESSION['id']}' and ifnull(is_order, 'N') = 'N' and ifnull(is_delete, 'N') = 'N') )" ;
			$this->Mysql->query($query);
			
			$select = " max(idx) as idx";
			$and = " and user_id =  '{$_SESSION['id']}' ";
			$table = "play_order";

			$res = $this->Mymodel->get_list($select, $and, $table);
			
			$query = "update play_cart set order_idx = '{$res[0]["idx"]}' , is_order = 'Y' where user_id = '{$_SESSION['id']}' and ifnull(is_order, 'N') = 'N' and ifnull(is_delete, 'N') = 'N' ";
			$this->Mysql->query($query);
			
			$golink = "/user_product/order.php?order_idx=" . $res[0]["idx"];
		
		}
		echo "<script>alert('Success!')</script>";
		echo "<script>location.href='".$golink."'</script>";
	}else{
		echo "<script>alert('Fail!')</script>";
	}
	
	}
}




?>