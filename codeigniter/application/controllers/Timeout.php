<?php

class Timeout extends CI_Controller {

public function index()
	{	

$timeout = 4.0; 	// minutes
$logout_redirect_url = "http://cs-server.usc.edu:31239/codeigniter/index.php/start";
$timeout = $timeout * 60 ; // Converts minutes to seconds
if (isset( $_SESSION [ 'start_time' ])) {
	$elapsed_time = time () - $_SESSION [ 'start_time' ];
	if ( $elapsed_time >= $timeout ) {
		session_destroy ();
		header ( "Location: $logout_redirect_url" );
	}
}
	}
}
?>