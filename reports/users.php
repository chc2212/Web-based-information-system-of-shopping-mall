<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

	$res=Array();
	$select = "*";
	$and = "";
	if( $_GET ){
		if( $_GET['type'] ){
			$and .= "&& type = '".$_GET['type']."'";
		}
		if( $_GET['salary1'] ){
			$and .= "&& salary >= ".$_GET['salary1'];
		}
		if( $_GET['salary2'] ){
			$and .= "&& salary <= ".$_GET['salary2'];
		}
	}
	$and .= " ORDER BY reg_time DESC";
	$table = "play_user";
	
	$res['list'] = $service->get_list($select, $and, $table);

if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}
?>