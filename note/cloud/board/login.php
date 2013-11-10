<?php
	session_start(); 
	$link = mysqli_connect("127.0.0.1" , "root" , "123456" , "board");
	$account = $_POST["account"];
	$password = $_POST["password"];
	$sql = "SELECT * FROM user WHERE account = '$account' AND password = '$password'";
	$result = mysqli_query( $link , $sql );
	$row = mysqli_fetch_array($result);
	if( mysqli_query( $link , $sql) )
	{
		$_SESSION['account'] = $row ['account'];
		$_SESSION['user'] = $row['name'];
		echo "<div style = 'text-align:center;'>";
		echo "welcome";
		echo $row['name'];
		echo "<br>";
		echo "<a href = 'lookmessage.php'>go to look message</a></div>";
	}
	else {
		echo "error";
	}
?>