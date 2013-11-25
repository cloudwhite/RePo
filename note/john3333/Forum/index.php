<?php
session_start();
echo "<html>";
echo "	<head>";
echo "		<meta charset='utf-8'>";
echo "		<title>歡迎</title>";
echo "		<link rel='stylesheet' type='css/text' href='./css/index.css' />";
echo "		<script src='./js/function.js'></script>";
echo "	</head>";	
echo "	<body>";
echo "		<div id='loginform'>";
echo "			<form action='./app/Login.php' method='post' name='loginform'>";
echo "				<center>帳號 : <input type='text' name='user' /> <input type='button' value='註冊' onclick='Register()';' /><br></center>";
echo "				<center>密碼 : <input type='password' name='password' /> <input type='submit' value='登入'></center>";
echo "			</form>";
echo "		</div>";
echo "		<div id='userform'>";				
				if($_SESSION['user']==null){
					echo '尚未登入';
				}
				else{
					echo $_SESSION['user'];
				}
				echo "<input type='button' value='登出' onclick='Logout()' />";
				echo "<input type='button' value='更改個人資料' onclick='Update_User()' />";
				echo "<input type='button' value='刪除使用者' onclick='Delete_User()' />";       
echo "		</div>";		
echo "		<div id='Code_form'>";
echo "			<a href='Board.php?Area=C_Cpp'> C , Cpp</a><br>";
echo "			<a href='Board.php?Area=Web'> Web</a><br>";
echo "		</div>";
echo "		<div id='Bt_form'>";
echo "			<a href='Board.php?Area=Bt_Movie'> BT電影</a><br>";
echo "			<a href='Board.php?Area=Bt_Music'> BT音樂</a><br>";
echo "			<a href='Board.php?Area=Bt_Picture'> BT圖片</a><br>";
echo "		</div>";
echo "	</body>";
echo "</html>";
?>