<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
function orderlist(){

	location.href = 'http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/order_list';

}

function cancelorder(){
	location.href= 'http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/order_delete/index/<?=$idx?>'
}
</script>
<body>
	<div style="width:600px;">
	
	</div>
	<table width="600" border="1" cellpadding="0" cellspacing="0" align="center" >
		<caption>Order Detail</caption>

		<!--
		<tr>
			<th>Name</th>
			<th>Category</th>
			<th>Prices</th>
			<th>Count</th>
		</tr>
		-->

<form name="cartsubmit" action="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/order_result" method="post" id = "target">
	<input type="hidden" name="order_idx" value="<?=$idx?>">
		<?php foreach ($list As $key => $val){?>
		<tr>

			<td align="center"><?php echo $val['product_name']?></td>
			<td align="center"><?php echo $val['category_name']?></td>
			<td align="center"><?php echo $val['price']?></td>
			<td align="center">
				<?php echo $val['product_cnt']?>
			</td>
		</tr>
		<?php }?>
	<?php
		
		foreach ($order As $key => $val){
			$total_price = $val['total_price'];
			$address = $val['address'];
			$phone_num = $val['phone_num'];
			$receve_name = $val['receve_name'];
			$address_1 = $val['address_1'];
			$phone_number_1 = $val['phone_number_1'];		
			$pay_type = $val['pay_type'];				
			
			
		}
	?>
		
		<tr>
			<td colspan="6">
				<table style="width:100%;">
					<tr>
						<td>
							Total Price
						</td>
						<td>
							<?=$total_price?>
						</td>						
					</tr>
					
					
					<tr>
						<td>
							address
						</td>
						<td>
							<?=$address?>
						</td>						
					</tr>	
					<tr>
						<td>
							phone number
						</td>
						<td>
							<?=$phone_num?>
						</td>						
					</tr>						


					<tr>
						<td colspan="2">
							Shipping
						</td>					
					</tr>		
					<tr>
						<td>
							name
						</td>
						<td>
							<?=$receve_name?>
						</td>						
					</tr>
					<tr>
						<td>
							address
						</td>
						<td>
							<?=$address_1?>
						</td>						
					</tr>	
					<tr>
						<td>
							phone number
						</td>
						<td>
							<?=$phone_number_1?>
						</td>						
					</tr>		
					<tr>
						<td colspan="2">
							Payment
						</td>					
					</tr>		
					<tr>
						<td>
							payment type
						</td>
						<td>
						<?=$pay_type?>
						</td>						
					</tr>					
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="6" align="center">
					<input type="button" value="Cancel Order" class = "target"  onclick="cancelorder()">
					<input type="button" value="Order List"  class = "target2" onclick="orderlist()">
			</td>
		</tr>

</form>		
	</table>

	<script>

$( "#target" ).submit(function( event ) {
    $("#submit_button").css("background-color","yellow");
 return;
});

$( ".target" ).click(function( event ) {
    $(".target").css("background-color","yellow");
 return;
});

$( ".target2" ).click(function( event ) {
    $(".target2").css("background-color","yellow");
 return;
});

</script>

</body>
</html>