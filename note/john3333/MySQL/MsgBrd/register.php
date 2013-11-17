<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="css/text" href="./css/register.css">
		<title>註冊</title>
	</head>
	
	<body>
		<p>請麻煩你/妳先註冊</p>
		<form action="./app/register.php" method="post" name="registerform" id="registerform">
			<center>帳號 : <input type="text" name="user" /><br>
			密碼 : <input type="password" name="password" /><br>
			暱稱 : <input type="text" name="id" /><br>
			信箱 : <input type="text" name="email" /><br>
			電話 : <input type="text" name="phone" /><br>
			生日 : <input type="text" name="birthday" /><br>
			<input type="submit" value="註冊"><a href="index.php" style="text-decoration:none">Home Page</a></center>
			
		</form>
	</body>
</html>