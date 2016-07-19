<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
function goDetail(elem){
	//	location.href = '/user_product/detail.php?idx='+elem.id; 
		location.href = 'http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/detail/index/'+elem.id;
}

</script>
<body>
	<div style="width:600px;">
		<form name="srarchform" action="http://cs-server.usc.edu:31239/codeigniter/index.php/user_product/lists" method="post">
		<span>Product Search : </span>
		<select name="gCategory">
						<option value="">All Product</option>
						<?php foreach ($category As $key => $val){?>
						<option value="<?php echo $val['idx'];?>" <?php if(isset($gCategory))if($val['idx'] == $gCategory) echo 'selected';?>><?php echo $val['name'];?></option>
						<?php }?>		
		</select>
		<input type="text" name="gProduct_name" value="<?if(isset($gProduct_name)) echo $gProduct_name;?>">
		<input type="submit" value="Search Product">
		</form>
	
	</div>

		<table width="600" border="1" cellpadding="0" cellspacing="0" align="center" >
		<caption>Special Sales</caption>
		<tr>
			<th>Index</th>
			<th>Name</th>
			<th>dicount(%)</th>
			<th>Price</th>
			<th>Detail</th>
		</tr>

	<tr>
				<!--Special sales-->
		<?php foreach ($sales As $key => $val){?>
	
			<td align="center"><?php echo $val['product_idx']?></td>
			<td align="center"><?php echo $val['product_name']?></td>
			<td align="center"><?php echo $val['product_rate']?></td>
			<td align="center"><?php echo $val['product_price']?></td>
			<td align="center">
				<input type="button" value="DetailView" onclick="goDetail(this);" id="<?php echo $val['product_idx'];?>"/>
			</td>
			</tr>
<?php }?>
	
	</table>


	</br>
	<table width="600" border="1" cellpadding="0" cellspacing="0" align="center" >
		<caption>Products Lists</caption>
		<tr>
			<th>Index</th>
			<th>Name</th>
			<th>Category</th>
			<th>Prices</th>
			<th>Detail</th>

		</tr>

	

		
		<tr>
		<?php foreach ($list As $key => $val){?>
		
			<td align="center"><?php echo $val['product_idx']?></td>
			<td align="center"><?php echo $val['product_name']?></td>
			<td align="center"><?php echo $val['category_name']?></td>
			<td align="center"><?php echo $val['price']?></td>
			<td align="center">
				<input type="button" value="DetailView" onclick="goDetail(this);" id="<?php echo $val['product_idx'];?>"/>
			</td>
		</tr>
		<?php }?>
	
	</table>

</body>
</html>