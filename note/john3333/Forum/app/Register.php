<?php	
// Create connection
	$con=mysqli_connect("127.0.0.1","root","root","Forum");
//
	$gender=$_POST['gender'];
	$birthday=$_POST['birthday'];
	$email=$_POST['email'];
	$user=$_POST['user'];
	$pass=$_POST['password'];	
	$sql="INSERT INTO user (gender,birthday,email,user,pass) 
					VALUES ('$gender','$birthday','$email','$user','$pass')";
			
	if	(mysqli_query($con,$sql))
		{//Success Insert
			echo "<html>";
			echo "	<head>";
			echo "		<head>";
			echo "			<meta charset='utf-8'>";
			echo "			<title>Register Success !</title>";
			echo "			<link rel='stylesheet' type='css/text' href='../css/Register.css'>";
			echo "			<script src='../js/function.js'></script>";
			echo "		</head>";
			echo "		<body>";			
			echo "			<div id='Register_form'>";
			echo "			<h3>Your Data is</h3>";
			echo "				gender :".$gender."<br>";
			echo "				birthday :".$birthday."<br>";
			echo "				email :".$email."<br>";
			echo "				user : ".$user."<br>";
			echo "				pass : ".$pass."<br>";
			echo "			</div>";			
			echo " 		<input type='button' value='返回首頁' onclick='HomePage()' />";
			echo "		</body>";
			echo "	</head>";
			echo "</html>";
			mysqli_close($con);			
		}
	else{ die('Error: ' . mysqli_error($con));
		}	
?>