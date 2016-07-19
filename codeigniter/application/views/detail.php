<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Assignment2</title>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/scripts/regex.js"></script>
<script type="text/javascript">
	function add_cart(){
		document.vForm.submit();
	}
	
	function direct_order(){
		document.vForm.insert_cart_type.value = "direct";
		document.vForm.submit();
	}
	
	function go_list(){
		location.href="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/lists";
	}



</script>
</head>
<body>
	<form name="vForm" method="post" action="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/add_cart"
		style="margin: 0; padding: 0">
		<input type="hidden" value="<?=$elem?>" name="product_idx">
		<input type="hidden" value="cart" name="insert_cart_type">
		<input type="hidden" value="<?=$list[0]['price']?>" name="product_price">
		<table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td colspan="3" align="center"><h3>Product Detail</h3></td>
			</tr>
			<tr style="background-color: #e4eefe">
				<td height="30" width="180">
					<font color="red">*</font> Name :
				</td>
				<td width="250" colspan="2">
					<?php echo $list[0]['name']?>
				</td>
			</tr>
			<tr>
				<td height="30">
					 Category :
				</td>
				<td colspan="2">
					<?php echo $list[0]['category_name']?>
				</td>
			</tr>
			<tr style="background-color: #e4eefe">
				<td height="30">
					 Price :
				</td>
				<td colspan="2">
					<?php echo number_format($list[0]['price'], 0)?>
				</td>
			</tr>
			<tr style="background-color: #e4eefe">
				<td height="30">
					 Order Count :
				</td>
				<td colspan="2">
					<input type="text" name="product_cnt" value="1">
				</td>
			</tr>			
			
			
			<tr align="center">
				<td colspan="3" height="60">
					<input type="button" id="button1" value="Add Cart"/>
					<input type="button" id = "button2" value="Go List" onclick="go_list();"/>
					<!--<input type="button" value="Direct Order" onclick="direct_order();"/>-->
				</td>
			</tr>
		</table>
		<hr>
	</form>

<script>
$( "#button1" ).click(function( event ) {
    $("button1").css("background-color","yellow");
	var register_form = document.vForm;
	var product_cnt = register_form.product_cnt.value;	
	
	if( !(regex_check("num", product_cnt)) || product_cnt<=0 || product_cnt>126 ){
		alert('Please check product count');
		return false;
	}
	else
	{
		register_form.submit();
		return;
	}
});

$( "#target" ).click(function( event ) {
    $("#target").css("background-color","yellow");
 return;
});


</script>

</body>
</html>