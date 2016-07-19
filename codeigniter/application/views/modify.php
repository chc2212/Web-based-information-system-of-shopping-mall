

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/scripts/regex2.js"></script>
<script type="text/javascript">

function register_chk(){
	var register_form = document.vForm;
	var id = register_form.user_id.value;
	var password = register_form.password.value;
	var first_name = register_form.first_name.value;
	var last_name = register_form.last_name.value;
	var age = register_form.age.value;
	var salary = register_form.salary.value;
//	var type = register_form.type.value;	
	
	if( ! regex_check("id", id)){
		alert('Please check your ID');
		return false;
	}
	if( ! regex_check("id", password)){
		alert('Please check your password');
		return false;
	}

	if( ! regex_check("name", first_name)){
		alert('Please check your Firstname');
		return false;
	}
	if( ! regex_check("name", last_name)){
		alert('Please check your Lastname');
		return false;
	}
	if( ! regex_check("num", age)){
		alert('Please check your Age');
		return false;
	}
	if( ! regex_check("num", salary)){
		alert('Please check your Salary');
		return false;
	}
/*
	if( ! regex_check("num", type)){
		alert('Please check your Salary');
		return false;
	}
	*/
	
	register_form.submit();
}

</script>

<body>





		
	<form name="vForm" method="post" action="http://cs-server.usc.edu:31239/codeigniter/index.php/login/modify/index/-2" style="margin: 0; padding: 0" id = "target3">
		<input type="hidden" value="<?php echo $_SESSION['idx'];?>" name="idx">
		<table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td colspan="3" align="center"><h3>User Modify</h3></td>
			</tr>
			<tr style="background-color: #e4eefe">
				<td height="30" width="180">
					<font color="red">*</font> ID :
				</td>
				<td width="250" colspan="2">
					<input type="text" name="user_id" value="<?php echo $list[0]['user_id']?>" >
				</td>
			</tr>
			<tr>
				<td height="30">
					<font color="red">*</font> Password :
				</td>
				<td colspan="2">
					<input type="password" name="password" value="<?php echo $list[0]['password']?>">
				</td>
			</tr>
			<tr style="background-color: #e4eefe">
				<td height="30">
					<font color="red">*</font> firstName :
				</td>
				<td colspan="2">
					<input type="text" name="first_name" value="<?php echo $list[0]['first_name']?>" >
				</td>
			</tr>
			
			<tr>
				<td height="30">
					<font color="red">*</font> lastName :
				</td>
				<td colspan="2">
					<input type="text" name="last_name" value="<?php echo $list[0]['last_name']?>" >
				</td>
			</tr>
			<tr>
				<td height="30">
					<font color="red">*</font> Age :
				</td>
				<td colspan="2">
					<input type="number" name="age" value="<?php echo $list[0]['age']?>">
				</td>
			</tr>
			<tr>
				<td height="30">
					<font color="red">*</font> Salary :
				</td>
				<td colspan="2">
					<input type="text" name="salary" value="<?php echo $list[0]['salary']?>">
				</td>
			</tr>
			<tr align="center">
				<td colspan="3" height="60">
					<input type="button" value="modify"  onclick="register_chk();" id = "submit_button3" />
					<input type="reset" id = "button2" value="reset"/>
					<input type="button" id = "button3" value="go to first" />
				</td>
			</tr>
		</table>
		<hr>
	</form>

<script>

$( "#button2" ).click(function( event ) {
    $("#button2").css("background-color","yellow");
	
 return;
});

$( "#button3" ).click(function( event ) {
    $("#button3").css("background-color","yellow");	
	location.href = 'http://cs-server.usc.edu:31239/codeigniter/index.php/startt';
 return;
});

</script>

	


</body>
</html>