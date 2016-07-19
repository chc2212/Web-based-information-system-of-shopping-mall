<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<script type="text/javascript" src="/scripts/regex2.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
function cancelOrder(){
	location.href = 'http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/order_delete/index/<?php echo($order_idx);?>'

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
		<!--
		<tr>
			<th>Name</th>
			<th>Category</th>
			<th>Prices</th>
			<th>Count</th>
		</tr>
		-->
<form name="cartsubmit" action="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/order_result" method="post" id = "target" >
	<input type="hidden" name="order_idx" value="<?php echo($order_idx);?>">
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
		<tr>
			<td colspan="6">
				<table style="width:100%;">
					<tr>
						<td>
							Total Price
						</td>
						<td>
		<?php foreach ($order As $key => $val){?>						
							<?=$val['total_price']?>
		<?php }?>							
						</td>						
					</tr>
					<tr>
						<td colspan="2">
							<strong>order</strong>
						</td>					
					</tr>		
					<tr>
						<td>
							name
						</td>
						<td>
							<input type="text" name="order_name" >
						</td>						
					</tr>
					<tr>
						<td>
							address
						</td>
						<td>
							<input type="text" name="address" >
						</td>						
					</tr>	
					<tr>
						<td>
							phone number
						</td>
						<td>
							<input type="text" name="phone_num" >
						</td>						
					</tr>						


					<tr>
						<td colspan="2">
							<strong>Shipping</strong>
						</td>					
					</tr>		
					<tr>
						<td>
							name
						</td>
						<td>
							<input type="text" name="receve_name" >
						</td>						
					</tr>
					<tr>
						<td>
							address
						</td>
						<td>
							<input type="text" name="address_1" >
						</td>						
					</tr>	
					<tr>
						<td>
							phone number
						</td>
						<td>
							<input type="text" name="phone_number_1" >
						</td>						
					</tr>		
					<tr>
						<td colspan="2">
							<strong>Payment</strong>
						</td>					
					</tr>		
					<tr>
						<td>
							paytype
						</td>
						<td>
							<select name="pay_type" onchange="changepaytype(this.value)">
								<option value="Bank Transfer">Bank Transfer</option>
								<option value="Credit card">Credit card</option>
							</select>
						</td>						
					</tr>
					<tr class="bt">
						<td>
							Depositor
						</td>
						<td>
							<input type="text" name="Depositor" >
						</td>						
					</tr>	
					<tr class="bt">
						<td>
							Account
						</td>
						<td>
							AAA Bank  122-122-122-122-122 Account Name
						</td>						
					</tr>						
					<tr class="cd" style="display:none;">
						<td>
							Card Number
						</td>
						<td>
							<input type="text" name="card_num" >
						</td>						
					</tr>	
					<tr class="cd" style="display:none;">
						<td>
							3-digit security code
						</td>
						<td>
							<input type="text" name="card_pass" >
						</td>						
					</tr>			
					<tr class="cd" style="display:none;">
						<td>
							Valid Thru
						</td>
						<td>
							<input type="text" name="card_desMonth" >/<input type="text" name="card_desYear" > (Month / Year)
						</td>						
					</tr>						
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="6" align="center">
					<input type="button" value="order" id = "submit_button">  <input type="button" class = "target" value="Cancel Order"  onclick="cancelOrder()">
			</td>
		</tr>

</form>		
	</table>
<script>
var selection_payment_bank_transfer;
selection_payment_bank_transfer= true;
function changepaytype(val)
{
	if (val == "Bank Transfer")
	{
		selection_payment_bank_transfer = true;
		$(".bt").show();
		$(".cd").hide();
	}
	else
	{
		selection_payment_bank_transfer = false;
		$(".bt").hide();
		$(".cd").show();	
	}
}


$( "#submit_button" ).click(function( event ) {
    $("#submit_button").css("background-color","yellow");	
	register_chk();
 return;
});



function register_chk(){

	var register_form = document.cartsubmit;
	var order_name = register_form.order_name.value;
	var address = register_form.address.value;
	var phone_num = register_form.phone_num.value;
	var receve_name = register_form.receve_name.value;
	var address_1 = register_form.address_1.value;
	var phone_number_1 = register_form.phone_number_1.value;
	var Depositor = register_form.Depositor.value;
	var card_num = register_form.card_num.value;
	var card_pass = register_form.card_pass.value;
	var card_desMonth = register_form.card_desMonth.value;
	var card_desYear = register_form.card_desYear.value;



	if(address_1.length==0 || address.length==0){
		alert('Please check address');
		return false;
	}

	
	if( ! regex_check("name", order_name)){
		alert('Please check your Name');
		return false;
	}
	if( ! regex_check("num", phone_num)){
		alert('Please check your Phone Number');
		return false;
	}

	if( ! regex_check("name", receve_name)){
		alert('Please check your Name');
		return false;
	}
	if( ! regex_check("num", phone_number_1)){
		alert('Please check your Phone Number');
		return false;
	}

	if( selection_payment_bank_transfer == true)
	{
	if( ! regex_check("name", Depositor)){
		alert('Please check Depositor');
		return false;
	}
	}

	if(selection_payment_bank_transfer == false)
	{

	if( ! regex_check("num", card_num)){
		alert('Please check your Card Number');
		return false;
	}

	if( ! regex_check("num", card_pass)){
		alert('Please check your Card Security Code');
		return false;
	}	

	if( ! regex_check("num", card_desMonth)){
		alert('Please check your Card Valid Month');
		return false;
	}	

	if( ! regex_check("num", card_desYear)){
		alert('Please check your Card Valid Year');
		return false;
	}	

	}
	
	register_form.submit();
}


	

</script>
</body>
</html>