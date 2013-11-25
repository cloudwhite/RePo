<?php
	session_start();
	$link = mysqli_connect("127.0.0.1" , "root" , "123456" , "board");
	//mysql_select_db("msg");
	mysql_query("set names utf8");
	if($_SESSION['account'] == null){
		header('location:login.html');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>modifyuser</title>
		
	</head>
	<body>
		<h2 style = "text-align:center;">please input what you want to modify</h2>
	</body>
</html>
<script >

	function mpas(){
		var x = prompt('your old password')
		var y = document.getElementById('upas');
		if(x == y){
			goTo ('location : passwmodify.php')
		}
		else{
			document.write('your password is wrong');
		}
	}

</script>
<?php
	$usersid = $_SESSION['sid'];
	$sql = "SELECT * FROM user WHERE sid = '$usersid'";
	$result = mysqli_query($link,$sql);
	if($row = mysqli_fetch_array($result)){
		echo "<form style = 'text-align:center;' action = 'modifyuseraction.php' method = 'post' name = 'formmu' >
		<table align='center' width='300px' height='100px' border='0' >
		<tr>
		<td>
		name:
		</td>
		<td>
		<input type='text' name = 'name' value = ".$row['name']." />
		</td>
		</tr>
		
		<tr>
		<td>
		phone:
		</td>
		<td>
		<input type='text' name = 'phone' value = ".$row['mobile']." />
		</td>
		</tr>
		
		<tr>
		<td>
		email:
		</td>
		<td>
		<input type='text' name = 'email' value = ".$row['email']." />
		</td>
		</tr>
		
		<tr>
		<td>
		birthday:
		</td>
		<td>
		<input type='text' name = 'birthday' value = ".$row['birthday']." />
		</td>
		</tr></table>
		
		<br>
		<br>
		<a href = 'lookmessage.php'>go back</a>
		<br>
		<br>
		<input type='submit' value='modify'  />
		<br>
		</form>
		<form style = 'text-align:center;' action = 'deleteuser.php' method = 'post' name = 'formdu' >
			<input type = 'submit' value = 'delete-user' />
		</form>
		<br>
		<br>
		<div style = 'text-align:center;'>
		<input type = 'button' onclick = 'mpas()' value = 'do you want to modify password???' />
		<input type = 'textarea' style = 'display : none;' value = ".$row['password']." id = 'upas' />
		</div>
		
		";
	}
	else {
		echo "error";
	}
		
?>