<?php
session_start();
	if($_SESSION['user']==null){
		header('location:register.php');
	}
//
	$con=mysqli_connect("127.0.0.1","root","root","Forum");
	$sid=$_GET['sid'];
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
			echo "	<div id='image_form'>";
						if($row['image']!=null){
							echo "		<img src='./file/image/".$row['image']."' />";
						}
						else{
							echo "<p>No AnyImage in this Essay ...</p>";
						}			
			echo "	</div>";
			echo "	<div id='file_form'>";
						if($row['file']!=null){
							echo "		<a href='./file/file/".$row['file']."' target='_blank' >".$row['file']."</a>";
						}
						else{
							echo "<p>No AnyFile in this Essay ...</p>";
						}			
			echo "	</div>";
			echo "	<div id='content_form'>";
						echo $row['content']."<br>";
			echo "	</div><br>";			
			echo " 		<input type='button' value='編輯文件' onclick='Update_Essay(".$sid.")' />";
			echo " 		<input type='button' value='刪除文件' onclick='Delete_Essay(".$sid.")' />";
			echo " 		<input type='button' value='返回首頁' onclick='index()' />";
			echo "	</body>";
			echo "</html>";
		}
	else{ 
			die('Error: ' . mysqli_error($con));
		}
	mysqli_close($con);
?>