<?php session_start();?>
<?php 
	if($_SESSION['user']==null){
		header("location:register.php");
	}
	else{
		$con=mysqli_connect("127.0.0.1","root","root","MessageBoard");
		$user=$_SESSION['user'];
		$sql="SELECT * FROM user WHERE user='$user'";
		$result=mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		if	(mysqli_query($con,$sql))
		{			
			echo "<html>";
			echo "	<head>";
			echo "		<meta charset='utf-8'>";
			echo "		<title>Update</title>";
			echo "		<link rel='stylesheet' type='css/text' href='./css/update.css'>";
			echo "	</head>";
			echo "	<body>";
			echo "		<div id='updateform'>";
			echo "			<form action='./app/update.php' method='POST' name='updateform'>";
			echo "				user : ".$row['user']."<br>";
			echo "  			pass : "."<input type='text' name='pass' value='".$row['pass']."' /><br>";
			echo "				id   : ".$row['id']."<br>";
			echo "  			email: "."<input type='text' name='email' value='".$row['email']."' /><br>";
			echo "  			phone: "."<input type='text' name='phone' value='".$row['phone']."' /><br>";
			echo "  			birthday: "."<input type='text' name='birthday' value='".$row['birthday']."' /><br>";
			echo "		<center><input type='submit' value='Update'>";
			echo "		<a href='./app/logout.php' style='text-decoration:none'>LOG OUT</a></center>";			
			echo "			</form>";
			echo "		</div>";
			echo "	</body>";
			echo "</html>";
		}
		else{
			die('Error: ' . mysqli_error($con));
		}
		
	}
?>