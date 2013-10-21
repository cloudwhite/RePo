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
			mysqli_close($con);			
		}
	else{ die('Error: ' . mysqli_error($con));
		}
	
	echo " Rigister Success ! "."<br>";
	echo "          Welcome , ".$id."<br>";
	echo "<a href='../index.html'>Back to HomePage ?</a>";	
?>