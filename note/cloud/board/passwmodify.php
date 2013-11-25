<?php
	session_start();
	$link = mysqli_connect("127.0.0.1" , "root" , "123456" , "board");
	//mysql_select_db("msg");
	mysql_query("set names utf8");
	if($_SESSION['account'] == null){
		header('location:login.html');
	}
	$usersid = $_SESSION['sid'];
	$sql = "SELECT * FROM user WHERE sid = '$usersid'";
	$result = mysqli_query($link,$sql);
	echo "<input type = 'textarea' name = 'npas' />";
	$useraccount = $_SESSION['account'];
	$npassword = $_GET['npas'];
	$update = "UPDATE user SET password='$npassword' WHERE account='$useraccount' ";
	if(mysqli_query($link,$update)){
		header('location:lookmessage.php');
	}
	else {
		echo "error";
	}
?>