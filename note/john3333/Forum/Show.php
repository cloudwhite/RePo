<?php
session_start();
if($_SESSION['user']==null){
	echo "<script>";
	echo "	alert('請先註冊再觀看內容!');";
	echo " 	location.href='./Register.php'";
	echo "</script>";
}
//
	$con=mysqli_connect("127.0.0.1","root","root","Forum");
	$sid=$_GET['sid'];
	$_SESSION['sid']=$sid;
	$sql="SELECT * FROM board where sid='$sid'";	
	if	(mysqli_query($con,$sql))
		{//Success Insert		
			$result=mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			echo "<html>";
			echo "	<head>";
			echo "		<title></title>";
			echo "		<meta charset='utf-8'>";
			echo "		<link rel='stylesheet' type='css/text' href='./css/Show.css'>";
			echo "		<script src='./js/function.js'></script>";
			echo "	</head>";			
			echo "	<body>";
			echo "	<div id='function'>";
			echo " 		<input type='button' value='編輯文件' onclick='Update_Essay()' />";
			echo " 		<input type='button' value='刪除文件' onclick='Delete_Essay()' />";
			echo " 		<input type='button' value='返回首頁' onclick='index()' />";
			echo "	</div><br>";
			echo "	<div id='image_form'>";
						if($row['image']!=null){
							echo "		<img src='./file/image/".$row['image']."' />";
						}
						else{
							echo "No Image";
						}			
			echo "	</div><br>";
			echo "	<div id='file_form'>";
						if($row['file']!=null){
							echo "		<a href='./file/file/".$row['file']."' target='_blank' >".$row['file']."</a>";
						}
						else{
							echo "No File";
						}			
			echo "	</div><br>";
			echo "	<div id='content_form'>";
						echo $row['content']."<br>";
			echo "	</div><br>";			
			echo "	</body>";
			echo "</html>";
		}
	else{ 
			die('Error: ' . mysqli_error($con));
		}
	mysqli_close($con);
?>