<?php
session_start();
echo "<html>";
echo "	<head>";
echo "		<meta charset='utf-8'>";
echo "		<title>歡迎</title>";
echo "		<link rel='stylesheet' type='css/text' href='./css/index.css' />";
echo "		<script src='./js/function.js'></script>";
echo "		<script src='./js/jQuery.js'></script>";
echo "	</head>";	
echo "	<body>";
echo " 	<script>
			$(document).ready(function(){
				$('button').click(function(){
					if(($('#user').val())=='' || ($('#password').val())==''){
						$('#alerts').show();
						$('#alerts').text('Something Empty !');
					}
					else{
						$.post('./app/Login.php',{
							user:$('#user').val(),
							password:$('#password').val()
						},function(data){
								$('#alerts').show();
								$('#alerts').text(data);
						})
					;}
				});
			});
		</script>";
echo "		<div id='login_form'>";
echo "				<center>帳號 : <input type='text' id='user' /> <input type='button' value='註冊' onclick='Register()';' /><br></center>";
echo "				<center>密碼 : <input type='password' id='password' /> <button>登入</button></center>";

echo "		</div>";
echo "		<div id='alerts' style='display:none'>
				<script>		
					$('#alerts').click(
						function(){
							$('#alerts').hide();
						}
					)
				</script>
			</div>";
echo "		<div id='user_form'>";				
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
echo "			<a href='Board.php?Area=Web'> 網頁</a><br>";
echo "			<a href='Board.php?Area=Phone_App'> Phone App</a><br>";
echo "			<a href='Board.php?Area=Java'> Java</a><br>";
echo "			<a href='Board.php?Area=Code_Other'> Other</a><br>";
echo "		</div>";
echo "		<div id='Media_form'>";
echo "			<a href='Board.php?Area=Movie'> 電影</a><br>";
echo "			<a href='Board.php?Area=Music'> 音樂</a><br>";
echo "			<a href='Board.php?Area=Picture'> 圖片</a><br>";
echo "			<a href='Board.php?Area=Game'> 遊戲</a><br>";
echo "			<a href='Board.php?Area=Comic'> 漫畫</a><br>";
echo "			<a href='Board.php?Area=Media_Other'> Other</a><br>";
echo "		</div>";
echo "		<div id='Document_form'>";
echo "			<a href='Board.php?Area=Document'> 文件</a><br>";
echo "			<a href='Board.php?Area=Software'> 軟件</a><br>";
echo "			<a href='Board.php?Area=Book'> 書籍</a><br>";
echo "			<a href='Board.php?Area=Document_Other'> Other</a><br>";
echo "		</div>";
echo "	</body>";
echo "</html>";
?>