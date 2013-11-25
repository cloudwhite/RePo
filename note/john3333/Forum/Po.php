<?php 
session_start();
	if($_SESSION['user']==null){
		header('location:register.php');
	}

echo "<html>";
echo "	<head>";
echo "		<title>Po文</title>";
echo "	</head>";
	
echo "	<body>";
echo "	<div id='Po_form'>";
echo "		<form action='./app/Po.php' method='POST' name='writing'>";
echo "			Po種類 :".$_SESSION['type']."<br>";
echo "			標題：<input type='text' name='title' /><br>";
echo "			圖片：<br>";
echo "			文章內容：<input type='text' name='content' /><br>";
echo "			附件檔案：<br>";
echo "			<input type='submit' value='PO_ing'>";
echo "		</form>";
echo "	</div>";
echo "	</body>";
echo "</html>";
?>