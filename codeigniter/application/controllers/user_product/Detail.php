<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller 
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

$res=Array();


	$select = "a.*, b.name as category_name ";
	$and = " and a.idx = '".$elem."' and a.category = b.idx ";
	$table = "play_product a, play_product_category b";

	//$res['list'] = $service->get_list($select, $and, $table);
	$res['list'] = $this->Mymodel->get_list($select, $and, $table);
	$res['elem'] = $elem;


	$this->load->view('top',$res);
	$this->load->view('detail',$res);
/*
if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}
*/
	}
}
?>