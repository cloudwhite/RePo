<!DOCTYPE html>
<html>
	<head>
		<style>
			.container { width:750px; height:100%; margin-top:0; margin-left:20%;  background-color:#99CCFF; padding: 20px; border:3px solid #B8B8FF ; }
			h2 { width:180px; border:5px solid gray; padding:20px; float: left; }
			.log_in { margin-top:40px; float: right;  }
			.register { margin-top:100px; }
		</style>
	</head>
	<body>
        <div class="container">
		<h2>Message board</h2>
		<div class=\"log_in\">
		<form action='msg.php' method='post'>
		account: <input type='text' name='acc' /> 
		password: <input type='password' name='pwd' />
		<input type='submit' value='enter' />
		</form><br><br>
		</div>
		<div class=\"register\">
		<form action="register_finish.php" method="post">
		name:<input type="text" name="na" required/> <br>
	  	account:<input type="text" name="ac" required/> <br>
		password:<input type="text" name="pw" required/> <br>
		e-mail:<input type="text" name="em" required/> <br>
		mobile:<input type="text" name="mo"/> <br>
		birthday:<input type="text" name="bi"/> <br>
		<input type="submit" value="register" /></form>
		</div>
		</div>
	</body>
</html>