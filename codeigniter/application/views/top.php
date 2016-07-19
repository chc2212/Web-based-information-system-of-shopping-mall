<!DOCTYPE html>
<html>



<head>
<meta charset="UTF-8">
<title>Assignment2</title>
<style type="text/css">
	ul{
		
	}
	.nav-menu li{
		display:inline-block;
		padding:15px;
	}
	
	body{
	background-color: #E0E0E0 ;
	}

	@media only screen and (min-width:800px) {
	body{
				background-color: #FFFFFF;
	}
}


</style>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
function goModify(elem){
	
	//location.href = '/login/modify.php?idx='+elem;

	location.href = 'http://cs-server.usc.edu:31239/codeigniter/index.php/login/modify/index/'+elem;
}

function logout(){
	location.href="http://cs-server.usc.edu:31239/codeigniter/index.php/login/logout";
}



</script>
</head>
<body>

	<div>
	<form action="http://cs-server.usc.edu:31239/codeigniter/index.php/login/check" method="POST" id = "target">
		<div style="text-align:right;">
			<?php if($_SESSION['auth']){?>
			<div style="display:inline-block;">
				<p><?php echo $_SESSION['name']?></p>
			</div>
			<?php }else{?>
			<div style="display:inline-block;">
				<label for="id">ID</label>
				<input type="text" id="id" name="id"/>
			</div>
			<div style="display:inline-block;">
				<label for="pass">Password</label>
				<input type="password" id="pass" name="password"/>
			</div>
			<?php }?>
			<div style="display:inline-block;">
				<?php if(! $_SESSION['auth']){?>
				<input type="submit" id = "submit_button" value="Login"/>
				<input type="button" value="Registration(Customer)"  class = "target" onclick="location.href='http://cs-server.usc.edu:31239/codeigniter/index.php/login/register_customer';"/>
				<?php } else{?>
				<input type="button" class = "target2" id = "Logout" value="Logout" onclick="logout();"/>
				<?php }?>
				<?php if($_SESSION['auth'] == 9){?>
				<input type="button" value="Register-User" onclick="location.href='http://cs-server.usc.edu:31239/codeigniter/index.php/login/register';"/>
				<input type="button" value="Information-User" onclick="location.href='http://cs-server.usc.edu:31239/codeigniter/index.php/login/lists';"/>
				<?php }?>
				<?php if($_SESSION['auth'] == 2){?>
				<input type="button" value="Profile Modification" class = "target3" onclick="goModify('<?php echo $_SESSION['idx'];?>')" id="<?php echo $_SESSION['id'];?>"/>			
				<?php }?>

			</div>
		</div>
	</form>
	
	
	 	<h3 style="text-align:center;">Sports ShoppingMall</h3>
	 	<div class="nav-menu">
	 		<ul style="list-style:none; ">
	 			<?php if($_SESSION['auth'] == 1){?>
	 			<li><a href="/products/products/list.php">Products</a></li>
	 			<li><a href="/products/categorys/list.php">Products-Categorys</a></li>
	 			<?php }?>
	 			<?php if($_SESSION['auth'] == 5){?>
	 			<li><a href="/reports/products.php">Reports-Products</a></li>
	 			<li><a href="/reports/users.php">Reports-Users</a></li>
	 			<li><a href="/reports/sales.php">Reports-SpecialSales</a></li>
				<li><a href="/reports/orders.php">Reports-Orders</a></li>
	 			<?php }?>
				<?php if($_SESSION['auth'] == 2){?>
	 			<li><a href="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/lists">Products</a></li>
				<li><a href="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/cart_list">Cart</a></li>
				<li><a href="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/order_list">Order List</a></li>
	 			<?php }?>
			</ul>
	 	</div>
	</div>

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

$( ".target3" ).click(function( event ) {
    $(".target3").css("background-color","yellow");
 return;
});

</script>

</body>
</html>