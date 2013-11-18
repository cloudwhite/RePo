<html>
	<head>
		<meta charset="utf-8">
		<title>歡迎</title>
		<link rel="stylesheet" type="css/text" href="./css/index.css" />
	</head>
	
	<body>
		<div id="indexform">
		<form action="./app/login.php" method="post" name="loginform">
			<center>帳號 : <input type="text" name="user" /> <input type="button" value="註冊" onclick="javascript:location.href='./register.php';" /><br></center>
			<center>密碼 : <input type="password" name="password" /> <input type="submit" value="登入"></center>
		</form>
		</div>
	</body>
</html>