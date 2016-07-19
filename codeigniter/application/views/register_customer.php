<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<script type="text/javascript" src="/scripts/regex2.js"></script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
var xmlhttp;
var dup_chk = false;

function duplication_chk(){

	var user_id = document.getElementById('user_id').value;
	if(! user_id ){
		alert('Please wirte-down userID!');
		return false;
	}
	var url = '/login/duplication_chk.php?user_id='+user_id;
	callAjax(url, function(){
		
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var chk = xmlhttp.responseText;
			if(chk){
				if( chk == 0 ){
					alert('It is being used ID !');
					return false;
				}else if( chk == 1 ){
					alert('Available ID!');
					dup_chk = true;
				}
			}
	    }
	    
	});
}
function callAjax(url, cfunc){

    if (window.XMLHttpRequest)
    	xmlhttp=new XMLHttpRequest();
    else
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    
    xmlhttp.onreadystatechange = cfunc;
    
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function register_chk(){

	var register_form = document.vForm;
	var id = register_form.user_id.value;
	var password = register_form.password.value;
	var first_name = register_form.first_name.value;
	var last_name = register_form.last_name.value;
	var age = register_form.age.value;
	var salary = register_form.salary.value;
	var type = register_form.type.value;
	
	
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

	if( ! regex_check("num", type)){
		alert('Please check your Salary');
		return false;
	}

	if( !dup_chk ){
		alert('Please check your ID duplication');
		return false;
	}
	
	register_form.submit();
}
</script>
<body>
	<form name="vForm" method="post" action="http://cs-server.usc.edu:31239/codeigniter/index.php/login/register_customer"
		style="margin: 0; padding: 0" id = "form1">
		<table width="600" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td colspan="3" align="center"><h3>Register</h3></td>
			</tr>
			<tr style="background-color: #e4eefe">
				<td height="30" width="180">
					<font color="red">*</font> ID :
				</td>
				<td width="250" colspan="">
					<input type="text" name="user_id" id="user_id" placeholder="4 ~ 10">
				</td>
				<td>
					<input type="button" value="Check-Duplication" id = "button3" onclick="duplication_chk();"/>
				</td>
			</tr>
			<tr>
				<td height="30">
					<font color="red">*</font> Password :
				</td>
				<td colspan="2">
					<input type="password" name="password" placeholder="4 ~ 10">
				</td>
			</tr>
			<tr style="background-color: #e4eefe">
				<td height="30">
					<font color="red">*</font> firstName :
				</td>
				<td colspan="2">
					<input type="text" name="first_name" placeholder="2 ~ 20">
				</td>
			</tr>
			
			<tr>
				<td height="30">
					<font color="red">*</font> lastName :
				</td>
				<td colspan="2">
					<input type="text" name="last_name" placeholder="2 ~ 20">
				</td>
			</tr>
			<tr>
				<td height="30">
					<font color="red">*</font> Age :
				</td>
				<td colspan="2">
					<input type="number" name="age">
				</td>
			</tr>
			<tr>
				<td height="30">
					<font color="red">*</font> Salary :
				</td>
				<td colspan="2">
					<input type="text" name="salary">
				</td>
			</tr>

			<tr>
				<td height="30">
					<font color="red">*</font> user type (If you are customer, please input 2) :
				</td>
				<td colspan="0">
					<input type="text" name="type">
				</td>
			</tr>

			<tr align="center">
				<td colspan="3" height="60">
				<input type="button" value="Join" id = 'button0' onclick="register_chk();"/>
					<input type="reset" id = "button1" value="reset"/>
					<input type="button" id = "button2" value="Go Home"/>
				</td>
			</tr>
		</table>
		<hr>
	</form>

	
<script>

$( "#button0" ).click(function( event ) {
    $("#button0").css("background-color","yellow");	
 return;
});


$( "#button1" ).click(function( event ) {
    $("#button1").css("background-color","yellow");
 return;
});

$( "#button2" ).click(function( event ) {
    $("#button2").css("background-color","yellow");
	location.href = 'http://cs-server.usc.edu:31239/codeigniter/index.php/start';
 return;
});

$( "#button3" ).click(function( event ) {
    $("#button3").css("background-color","yellow");
	
 return;
});


</script>

	

</body>
</html>