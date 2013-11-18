<?php session_start(); ?>
<?php
if($_SESSION['user']==null){
	header("location:register.php");
}
else{	
// Create connection
	$con=mysqli_connect("127.0.0.1","root","root","MessageBoard");
//
	$pass=$_POST['pass'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$birthday=$_POST['birthday'];
	$user=$_SESSION['user'];
	$sql="UPDATE user SET pass='$pass',email='$email',phone='$phone',birthday='$birthday' WHERE user='$user'";
			
	if	(mysqli_query($con,$sql))
		{//Success Insert
			echo "<html>";
			echo "	<head>";
			echo "		<head>";
			echo "			<meta charset='utf-8'>";
			echo "			<title>Update Success !</title>";
			echo "			<link rel='stylesheet' type='css/text' href='../css/updatedata.css'>";
			echo "		</head>";
			echo "		<body>";			
			echo "			<div id='updatedataform'>";
			echo "			<h3>Update Data is</h3>";
			echo "				user : ".$user."<br>";
			echo "				pass : ".$pass."<br>";
			echo "				id   : ".$_SESSION['id']."<br>";
			echo "				email :".$email."<br>";
			echo "				phone :".$phone."<br>";
			echo "				birthday :".$birthday."<br>";
			echo "				<center><a href='../index.php' style='text-decoration:none'>Back to HomePage ?</a></center>";
			echo "			</div>";					
			echo "		</body>";
			echo "	</head>";
			echo "</html>";		
		
			mysqli_close($con);			
		}
	else{
			die('Error: ' . mysqli_error($con));
	}
	
	
}	
?>