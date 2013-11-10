<?php
	//mysql_query("SET NAMES ‘UTF8′");
	$link = mysqli_connect( "127.0.0.1" , "root" , "123456" , "board" );
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$account=$_POST['account'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['phone'];
    $birthday=$_POST['birthday'];
	$sql = "INSERT INTO user ( account , password , name , mobile , email , birthday ) 
	VALUES ('$account' , '$password' , '$name' , '$mobile' , '$email' , '$birthday' )";
	if($account == null||$password == null || $name == null || $email == null ){
		echo "error";
	}
	else{
	 if(mysqli_query($link,$sql))
		 {
	 		mysqli_close($link);
	 	}
	 else
	 	{
	 		die('Error:' . mysqli_error($link));
	 	}
	 	echo "<a href = 'login.html'>login</a>";
	}
?>