<?php
session_start();
include 'core.php';
include $_SERVER["DOCUMENT_ROOT"]."/timeout.php";
if( !defined("__RENDERED__") ){
	render($viewpath_default);
} 

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Assignment2</title>
</head>
<body>
	

</body>
</html>