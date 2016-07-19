<?
function render($filename,$layout="default.html"){
	define("__RENDERED__",true);
	global $res;
	$path=$_SERVER['DOCUMENT_ROOT']."$filename";
	$path_layout=$_SERVER['DOCUMENT_ROOT']."/".$layout;
	
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
?>
