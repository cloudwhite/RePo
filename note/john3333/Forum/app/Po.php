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
	$image=$_FILES['image']['name'];
	$content=$_POST['content'];
	$file=$_FILES['file']['name'];
	if ($_FILES["file"]["error"] > 0){
		echo "<h1>Error<h1>";
	}
  	else{
		echo "<p>�W���ɮצW�� : " . $_FILES["image"]["name"] . "</p><br>";
    	echo "<p>�ɮ׺��� : " . $_FILES["image"]["type"] . "</p><br>";
    	echo "<p>�ɮפj�p : " . ($_FILES["image"]["size"] / 1024) . " kB</p><br>";	
    	if 	(file_exists("../file/image/" . $_FILES["image"]["name"])){	
				echo "<p>" . $_FILES["image"]["name"] . "�ɮפw�s�b !</p>";
		}
		else{	
				move_uploaded_file($_FILES["image"]["tmp_name"],"../file/image/" . $_FILES["image"]["name"]);      						  		
				echo "<p>�W�Ǧ��\ !</p><br>";
     	}
 	}
	if ($_FILES["file"]["error"] > 0){
		echo "<h1>Error<h1>";
	}
  	else{
		echo "<p>�W���ɮצW�� : " . $_FILES["file"]["name"] . "</p><br>";
    	echo "<p>�ɮ׺��� : " . $_FILES["file"]["type"] . "</p><br>";
    	echo "<p>�ɮפj�p : " . ($_FILES["file"]["size"] / 1024) . " kB</p><br>";	
    	if 	(file_exists("../file/file/" . $_FILES["file"]["name"])){	
				echo "<p>" . $_FILES["file"]["name"] . "�ɮפw�s�b !</p>";
		}
		else{	
				move_uploaded_file($_FILES["file"]["tmp_name"],"../file/file/" . $_FILES["file"]["name"]);      						  		
				echo "<p>�W�Ǧ��\ !</p><br>";
     	}
 	}
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