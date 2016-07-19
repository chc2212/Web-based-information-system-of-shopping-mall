<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller 
{
	

	public function __construct()
    {
        parent::__construct();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		
		session_cache_limiter("");		
	    session_start();
		
	
	$_SESSION['id'] = null;
	$_SESSION['auth'] = null;
	$_SESSION['name'] = null;
	$_SESSION['idx'] = null;
    }
	

public function index()
	{



//include 'Core.php';
//include $_SERVER["DOCUMENT_ROOT"]."/codeigniter/application/controllers"."/Timeout.php";
$this->timeout();
$this->check();
$this->load->view('top');

$viewpath_default = $_SERVER['DOCUMENT_ROOT']."/codeigniter/application/controllers";
//$this->load->view('top');





if( !defined("__RENDERED__") )
	{
	//$this->render();
	//$viewpath_default = $_SERVER['PHP_SELF'];
	//$this->render($_SERVER['DOCUMENT_ROOT']."/codeigniter/application/controllers/login/check.php");
	//$this->render("x");
	
	//render($viewpath_default);
	}
	}


public function render($filename,$layout="Default.html")
	{	
	define("__RENDERED__",true);
	global $res;
	$path=$_SERVER['DOCUMENT_ROOT']."/codeigniter/application/controllers"."$filename";
	$path_layout=$_SERVER['DOCUMENT_ROOT']."/codeigniter/application/controllers"."/".$layout;
	
	if( $layout != null )
	{	
		ob_start();
		if($filename){
			//echo $path;
			$path =  str_replace("php", "html", $path);
			include $path;
		}
		$contents=ob_get_contents();
		//echo $path_layout;
		ob_end_clean();
		//echo $contents;
		include $path_layout;
	}
	else{
		include $path;
	}
	}

	public function timeout()
	{	

$timeout = 4.0; 	// minutes
$logout_redirect_url = "/";
$timeout = $timeout * 60 ; // Converts minutes to seconds

if (isset( $_SESSION [ 'start_time' ])) {
	$elapsed_time = time () - $_SESSION [ 'start_time' ];
	if ( $elapsed_time >= $timeout ) {
		session_destroy ();
		header ( "Location: $logout_redirect_url" );
	}
}
	}


public function check()
	{
	
if($_POST){
	
	$select = "*";
	$and = "&& user_id = '".$_POST['id']."' && password = '".$_POST['password']."'"; 
	$table = "play_user";
	$res['list'] = $this->get_list($select, $and, $table);
	
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
	}


	public	function get_list( $select, $and, $table ){
		$query = "select $select from $table where 1=1 $and";
		$this->db->query($query);
		$result = $this->db->fetch_all_arrays();
		return $result;
	}
}
?>











