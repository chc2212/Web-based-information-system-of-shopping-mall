<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
function goOrder(elem){
		
}

function deleteCart(cartIdx){

	location.href = 'http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/delete_cart/'+cartIdx.id;
	
}



function goList(){
	location.href="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/lists";
}

</script>
<body>
	<div style="width:600px;">
	
	</div>
	<table width="600" border="1" cellpadding="0" cellspacing="0" align="center" >
		<caption>Order Lists</caption>
		<tr>
			<th>idx</th>
			<th>price</th>
			<th>order_date</th>
			<th>status</th>
		</tr>
		<?php foreach ($list As $key => $val){?>
		<tr>

			<td align="center"><?php echo $val['idx']?></td>
			<td align="center"><?php echo $val['total_price']?></td>
			<td align="center"><a href="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/order_detail/index/<?php echo $val['idx']?>">
			<?php echo($val['reg_time'])?></a></td>			
			<td align="center"><?php echo $val['order_status']?></td>
		</tr>
		<?php }?>
	</table>

</body>
</html>