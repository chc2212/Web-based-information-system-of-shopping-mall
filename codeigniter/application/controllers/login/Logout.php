<?php
class Logout extends CI_Controller 
{
public function index()
	{
session_start();
unset( $_SESSION['id'] );
unset( $_SESSION['auth'] );
unset( $_SESSION['name'] );
unset( $_SESSION['start_time'] );

echo "<script>alert('logout Success!')</script>";
echo "<script>location.href='http://cs-server.usc.edu:31239/codeigniter/index.php/start';</script>";
	}
}
?>