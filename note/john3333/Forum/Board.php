<?php
session_start();
if($_SESSION['user']==null){
	echo "<script>";
	echo "	alert('請先註冊再觀看內容!');";
	echo " 	location.href='./Register.php'";
	echo "</script>";
}
echo "<html>";
echo "	<head>";
echo "		<meta charset='utf-8'>";
	$type=$_GET['Area'];
	$_SESSION['type']=$type;
	echo '	<title>'.$type.'</title>';
echo "		<link rel='stylesheet' type='text/css' href='./css/Board.css'>"; 
echo "		<script src='./js/function.js'></script>";			
echo "	</head>";	
echo "	<body>";				
echo "		<div id='action_form'>";
echo "			現在位置 ->".$type;
echo "          <input type='button' value='Po文' onclick='Po()' />"; 
echo "          <input type='button' value='返回首頁' onclick='index()' />"; 
echo "		</div><br>";
echo "		<div id='title_form'>";
echo "			<table border='1'>";
echo "				<tr><td>標題</td><td>作者</td></tr>";	
						$con=mysqli_connect("127.0.0.1","root","root","Forum");
						$sql="SELECT * FROM board where type='$type'";
						$result=mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result)){
							echo "<tr><td><a href='./Show.php?sid=".$row['sid']."' target='_blank'>".$row['title']."</a></td><td>".$row['author']."</td></tr><br>";
						}
echo "			</table>";
echo "		</div>";
echo "	</body>";
echo "</html>";
?>