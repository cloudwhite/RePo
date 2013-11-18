<?php session_start(); ?>
<?php
//	Create connection
	$con=mysqli_connect("127.0.0.1","root","root","MessageBoard");
//
	$user=$_POST['user'];
	$password=$_POST['password'];		
	$sql="SELECT * FROM user WHERE user='$user'";
	$result=mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	//echo $row['pass'];
	if	(mysqli_query($con,$sql))
		{
			if	($password==$row['pass'])
				{	
					$_SESSION['user']=$row['user'];
					$_SESSION['id']=$row['id'];
					echo "<html>";
					echo "	<head>";
					echo "		<meta charset='utf-8'>";
					echo "		<link rel='stylesheet' type='css/text' href='../css/login.css' />";
					echo "		<title>Login Success !</title>";
					echo "	</head>";
					echo "	<body>";
					echo "		<div id='loginform'>";
					echo "			<h3>Welcome , ".$row['id']." !"."</h3>";
					echo "			<a href='../msg.php' style='text-decoration:none' >Go to Msg ?</a>";
					echo "			<a href='../update.php'>Update Your DATA ?</a><br>";
					echo "		</div>";
					echo "	</body>";
					echo "</html>";
				}
			else{
					echo "Fail Login"."<br>";
					echo "<a href='../index.php' style='text-decoration:none'>Back to HomePage ?</a><br>";
				}
		}
	else{
			"Error Connection !";
		}
		
	mysqli_close($con);
?>