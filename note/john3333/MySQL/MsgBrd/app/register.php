<?php	
// Create connection
	$con=mysqli_connect("127.0.0.1","root","root","MessageBoard");
//
	$user=$_POST['user'];
	$pass=$_POST['password'];
	$id=$_POST['id'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$birth=$_POST['birthday'];
	$sql="INSERT INTO user (user,pass,id,email,phone,birthday) 
							VALUES ('$user','$pass','$id','$email','$phone','$birth')";
			
	if	(mysqli_query($con,$sql))
		{//Success Insert
			echo "<html>";
			echo "	<head>";
			echo "		<head>";
			echo "			<meta charset='utf-8'>";
			echo "			<title>Register Success !</title>";
			echo "			<link rel='stylesheet' type='css/text' href='../css/newdata.css'>";
			echo "		</head>";
			echo "		<body>";			
			echo "			<div id='newdataform'>";
			echo "			<h3>Your Data is</h3>";
			echo "				user : ".$user."<br>";
			echo "				pass : ".$pass."<br>";
			echo "				id   : ".$id['id']."<br>";
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
	else{ die('Error: ' . mysqli_error($con));
		}	
?>