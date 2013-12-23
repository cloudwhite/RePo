<?php
session_start();
	if($_SESSION['user']==null){
		header('location:register.php');
	}
//
	$con=mysqli_connect("127.0.0.1","root","root","Forum");
	$sid=$_SESSION['sid'];
	$image=$_FILES['image']['name'];
	$content=$_POST['content'];
	$file=$_FILES['file']['name'];
	$sql="SELECT * FROM board WHERE sid='$sid'";
	$result=mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	if ($image==null){
		echo "No Image<br>";
	}
	else{
		if ($_FILES["image"]["error"] > 0){
			echo "<h1>Error<h1>";
			$image="";
		}
		else{
			unlink("..\\file\\image\\".$row['image']);
			echo "<p>上傳檔案名稱 : " . $_FILES["image"]["name"] . "</p><br>";
			echo "<p>檔案種類 : " . $_FILES["image"]["type"] . "</p><br>";
			echo "<p>檔案大小 : " . ($_FILES["image"]["size"] / 1024) . " kB</p><br>";	
			if 	(file_exists("..\\file\\image\\" . $_FILES["image"]["name"])){	
					echo "<p>" . $_FILES["image"]["name"] . "檔案已存在 !</p>";
			}
			else{	
				move_uploaded_file($_FILES["image"]["tmp_name"],"..\\file\\image\\" . $_FILES["image"]["name"]);      						  		
				echo "<p>上傳成功 !</p><br>";
			}
		}
	}
	
	if($file==null){
		echo "No File<br>";
	}
	else{
		if ($_FILES["file"]["error"] > 0){
			echo "<h1>Error<h1>";
			$file="";
		}
		else{
			unlink("..\\file\\file\\".$row['file']);
			echo "<p>上傳檔案名稱 : " . $_FILES["file"]["name"] . "</p><br>";
			echo "<p>檔案種類 : " . $_FILES["file"]["type"] . "</p><br>";
			echo "<p>檔案大小 : " . ($_FILES["file"]["size"] / 1024) . " kB</p><br>";	
			if 	(file_exists("..\\file\\file\\" . $_FILES["file"]["name"])){	
				echo "<p>" . $_FILES["file"]["name"] . "檔案已存在 !</p>";
			}
			else{	
				move_uploaded_file($_FILES["file"]["tmp_name"],"..\\file\\file\\" . $_FILES["file"]["name"]);      						  		
				echo "<p>上傳成功 !</p><br>";
			}
		}
	}
	echo "更新內容為 :".$content."<br>";
	$sql="UPDATE board SET image='$image',content='$content',file='$file' WHERE sid='$sid'";
			
	if	(mysqli_query($con,$sql))
		{//Success Insert		
			echo "<html>";
			echo "	<head>";
			echo "		<title>Po Success !</title>";
			echo "	</head>";
				
			echo "	<body>";
			echo "		<script>";
			echo "			alert('Update Success !');";
			echo "			location.href='../index.php';";
			echo "		</script>";
			echo "	</body>";
			echo "</html>";
		}
	else{ die('Error: ' . mysqli_error($con));
		}
	mysqli_close($con);

?>