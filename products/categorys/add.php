<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

if( $_POST ){

	$table = "play_product_category";
	$perm=array("name");

	if ($service->userInsert($table, $perm, $_POST)){

		echo "<script>alert('Success!')</script>";
		echo "<script>location.href='/products/categorys/list.php'</script>";
	}else{
		echo "<script>alert('Fail!')</script>";
	}

}



if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
}
?>