<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;
if($_POST){
	
	$select = "*";
	$and = "&& user_id = '".$_POST['id']."' && password = '".$_POST['password']."'"; 
	$table = "play_user";
	$res['list'] = $service->get_list($select, $and, $table);
	
	if(count($res['list']) == 0){
		echo "<script>alert('Fail!.')</script>";
		echo "<script>history.go(-1)</script>";
	}else{
		$_SESSION['id'] = $res['list'][0]['user_id'];
		$_SESSION['auth'] = $res['list'][0]['type'];
		$_SESSION['name'] = $res['list'][0]['first_name']."_".$res['list'][0]['last_name'];
		$_SESSION['idx'] = $res['list'][0]['idx'];
		
		$_SESSION [ 'start_time' ] = time ();
		
		echo "<script>alert('Login Success!')</script>";
		echo "<script>location.href='/'</script>";
	}
	
}
?>