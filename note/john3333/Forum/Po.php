<?php 
session_start();
	if($_SESSION['user']==null){
		header('location:register.php');
	}
	if($_SESSION['type']==null){
		header('location:register.php');
	}
	$type=$_SESSION['type'];
echo "<html>";
echo "	<head>";
echo "		<meta charset='utf-8'>";
echo "		<title>Po文</title>";
echo "		<link rel='stylesheet' type='css/text' href='./css/Po.css' />";
echo "		<script src='./js/function.js'></script>";
echo "	</head>";
	
echo "	<body>";
echo "	<div id='Po_form'>";
echo "		<form action='./app/Po.php' method='POST' name='Po_form' enctype='multipart/form-data'>";
echo "			Po種類 :".$type."<br>";
echo "			標題：<input type='text' name='title' /><br>";
echo "			圖片：<input type='file' name='image' /><br>";
echo "			文章內容：<input type='text' name='content' /><br>";
echo "			附件檔案：<input type='file' name='file' /><br>";
echo "			<input type='submit' value='PO'>";
echo "		</form>";
echo "	</div>";
echo "	<input type='button' value='返回首頁' onclick='index()' />";
echo "	</body>";
echo "</html>";
?>