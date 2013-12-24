<html>
	<head>
		<meta charset='utf-8'>
		<link rel='stylesheet' type='css/text' href='./css/Register.css'>
		<script src='./js/function.js'></script>
		<title>註冊</title>
	</head>	
	<body>
		<div id='Register_form'>
			<form action='./app/Register.php' method='post' name='Register_form' >
			<center>	
				性別 : 男 <input type='radio' name='gender' value='Boy'/>
					   女 <input type='radio' name='gender' value='Girl'/>
					   秘 密 <input type='radio' name='gender' value='Secret'/><br>
				生日 : <input type='text' name='birthday' maxlength='12' /><br>
				信箱 : <input type='text' name='email' maxlength='60' /><br>
				帳號 : <input type='text' name='user' maxlength='20' /><br>
				密碼 : <input type='password' name='password' maxlength='20' /><br>
			<input type='button' value='首頁' onclick='index()'>
			<input type='submit' value='註冊'>
			</center>	
			</form>
		</div>
		
	</body>
</html>