<html>
	<head>
		<meta charset='utf-8'>
		<link rel='stylesheet' type='css/text' href='./css/register.css'>
		<script src='./js/function.js'></script>
		<title>註冊</title>
	</head>	
	<body>
		<form action='./app/register.php' method='post' name='registerform' id='registerform'>
			<center>
			性別 : <input type='text' name='gender' /><br>
			生日 : <input type='text' name='birthday' /><br>
			信箱 : <input type='text' name='email' /><br>
			帳號 : <input type='text' name='user' /><br>
			密碼 : <input type='password' name='password' /><br>
			<input type='button' value='首頁' onclick='index()'>
		<input type='submit' value='註冊'></center>			
		</form>
	</body>
</html>