<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

if( $_POST ){

	$table = "play_product";
	$perm=array("name","category","price");

	if ($service->userInsert($table, $perm, $_POST)){

		echo "<script>alert('Success!')</script>";
		echo "<script>location.href='/products/products/list.php'</script>";
	}else{
		echo "<script>alert('Fail!')</script>";
	}

}

$select = "*";
$and = "";
$table = "play_product_category";
$res['category'] = $service->get_list($select, $and, $table);


if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}
?>