<?php
	$content=$_POST['content'];
//
	$con=mysqli_connect("127.0.0.1","root","root","MessageBoard");
	$sql="INSERT INTO msg (content)	VALUES ('$content')";
			
	if	(mysqli_query($con,$sql))
		{//Success Insert		
			mysqli_close($con);			
		}
	else{ die('Error: ' . mysqli_error($con));
		}
?>