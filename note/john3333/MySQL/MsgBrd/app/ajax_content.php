<?php
// Create connection
$con = mysqli_connect('127.0.0.1','root','root','MessageBoard');
if 	(!$con)
	{	
		die('Could not connect: ' . mysqli_error($con));
	}
//
mysqli_select_db($con,"msg");
$sql="SELECT content FROM msg";

$result = mysqli_query($con,$sql);

while($content = mysqli_fetch_array($result))
	{ 
		echo "<p>".$content['content']."</p>"."</br>"; 
	}

mysqli_close($con);
?>