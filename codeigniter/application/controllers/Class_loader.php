<?


class Class_loader extends CI_Controller {

public function index()
	{	


spl_autoload_register(function($class){
	
	$class=str_replace("\\","/",$class);
	$file = $_SERVER['DOCUMENT_ROOT']."/$class.php";
	if( !file_exists($file) ){
		echo $file;
		echo "there's no class : $class , ".$_SERVER['PHP_SELF'];
		return 0;
	}
	require_once($file);
});
	}
}
?>
