<?php
session_start();
	if($_SESSION['user']==null){
		header('location:register.php');
	}
//
	$con=mysqli_connect("127.0.0.1","root","root","Forum");
	$type=$_SESSION['type'];
	$author=$_SESSION['user'];
	$title=$_POST['title'];
	$image=$_POST['image'];
	$content=$_POST['content'];
	$file=$_POST['file'];
	$sql="INSERT INTO board (type,author,title,image,content,file)
					 VALUES ('$type','$author','$title','$image','$content','$file')";
			
	if	(mysqli_query($con,$sql))
		{//Success Insert		
			echo "<html>";
			echo "	<head>";
			echo "		<title>Po Success !</title>";
			echo "	</head>";
				
			echo "	<body>";
			echo "		<script>";
			echo "			alert('Po Success !');";
			echo "			location.href='../index.php';";
			echo "		</script>";
			echo "	</body>";
			echo "</html>";
		}
	else{ die('Error: ' . mysqli_error($con));
		}
	mysqli_close($con);
	

?>