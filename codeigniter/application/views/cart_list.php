<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<script type="text/javascript" src="/scripts/regex2.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
function goOrder(elem){
		
}

function deleteCart(cartIdx){
	location.href = 'http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/delete_cart/index/'+cartIdx.id;
}

function goDeleteAll(){
	location.href = 'http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/delete_cart/index/all';
}

function goList(){
	location.href="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/lists";
}

</script>
<body>
	<div style="width:600px;">
	
	</div>
	<table width="600" border="1" cellpadding="0" cellspacing="0" align="center" >
		<caption>Cart Lists</caption>
		<tr>
			<th>Name</th>
			<th>Category</th>
			<th>Prices</th>
			<th>Count</th>
			<th>Delete</th>

		</tr>
<form name="cartsubmit" action="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/order_update" method="post" id = "target9">
		<?php foreach ($list As $key => $val){?>
		<tr>

			<td align="center"><?php echo $val['product_name']?></td>
			<td align="center"><?php echo $val['category_name']?></td>
			<td align="center"><?php echo $val['price']?></td>
			<td align="center">
				<input type="hidden" size="4" name="cart_idx[]" value="<?php echo $val['cart_idx']?>">
				<input type="number" min = "1" max = "999" size="4" name="product_cnt[]" value="<?php echo $val['product_cnt']?>">
			</td>
			<td align="center">
				<input type="button" value="Delete" onclick="deleteCart(this);" id="<?php echo $val['cart_idx'];?>"/>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="6" align="center">
				<input type="submit" value="Order" id = "button1">
				<input type="button" value="GoList" id = "target10" onclick="goList()">
				<input type="button" value="DeleteAll" id = "target11" onclick="goDeleteAll()">
			</td>
		</tr>
</form>		
	</table>


<script>
//	<input type="submit" value="Order" id = "submit_button9">
/*
$( "#button1" ).click(function( event ) {
    $("button1").css("background-color","yellow");
	var register_form = document.cartsubmit;
	var product_cnt = register_form.product_cnt(1).value;	
	
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
*/


$( "#target10" ).click(function( event ) {
    $("#target10").css("background-color","yellow");
 return;
});
$( "#target11" ).click(function( event ) {
    $("#target11").css("background-color","yellow");
 return;
});
</script>
</body>
</html>