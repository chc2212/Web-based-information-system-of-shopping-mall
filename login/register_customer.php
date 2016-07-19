<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
include $_SERVER["DOCUMENT_ROOT"]."/core.php";
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

if( $_POST ){
	
	$table = "play_user";
	$perm=array("user_id","password","first_name","last_name","age","salary","type");
	
	if ($service->userInsert($table, $perm, $_POST)){
		
		echo "<script>alert('registration is successful!')</script>";
		echo "<script>location.href='/'</script>";
	}else{
		echo "<script>alert('you fail to registration')</script>";
	}

}


if( !defined("__RENDERED__") ){
	$viewpath_default = $_SERVER['PHP_SELF'];
	render($viewpath_default);
} 
?>