<?php

class Duplication_chk extends CI_Controller 
{
public function index()
	{


session_start();
include $_SERVER["DOCUMENT_ROOT"]."/class_loader.php";
$service = new \db\Dao;

if( $_GET ){
	
	$and = "&& user_id = '".$_GET['user_id']."'";
	$table = "play_user";
	$result = $service->get_count($and, $table);
	
	if( $result->count == 0 )
		echo 1;
	else
		echo 0;
	
}
	}
}
?>