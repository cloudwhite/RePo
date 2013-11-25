<?php
	session_start();
	$link = mysqli_connect("127.0.0.1" , "root" , "123456" , "board");
	//mysql_select_db("msg");
	mysql_query("set names utf8");
	if($_SESSION['account'] == null){
		header('location:login.html');
	}
	$useraccount = $_SESSION['account'];
	$sql = "SELECT * FROM user WHERE account = '$useraccount'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);
	$name =  $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$birth =  $_POST['birthday'];
	$update = "UPDATE user SET name='$name' , mobile='$phone' , email='$email', birthday='$birth' WHERE account='$useraccount' ";
	if(mysqli_query($link,$update)){
		header('location:lookmessage.php');
	}
	else {
		echo "error";
	}
?>