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
					echo "Welcome ".$row['id']." !"."<br>"  ;
					echo "<a href='../chat.html'>Go to Chat ?</a><br>";	
				}
			else{
					echo "Fail Login"."<br>";
					echo "<a href='../index.html'>Back to HomePage ?</a><br>";
				}
		}
	else{
			"Error Connection !";
		}
		
	mysqli_close($con);
?>