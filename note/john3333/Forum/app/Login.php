<?php
session_start();
	unset($_SESSION['user']);
//	Create connection
	$con=mysqli_connect("127.0.0.1","root","root","Forum");
//
	$user=$_POST['user'];
	$password=$_POST['password'];		
	$sql="SELECT * FROM user WHERE user='$user'";
	$result=mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	if	(mysqli_query($con,$sql))
		{
			if	($password==$row['pass'])
				{	
					$_SESSION['user']=$row['user'];
					echo "Login Success !";
				}
			else{					
					echo "Login Fail !";
				}
		}
	else{
			echo "Error Connection !";
		}
	mysqli_close($con);
?>