<?php
	session_start();
	$link = mysqli_connect("127.0.0.1" , "root" , "123456" , "board");
	//mysql_select_db("msg");
	mysql_query("set names utf8");
	if($_SESSION['account'] == null){
		header('location:login.html');
	}
	$usid = $_SESSION['sid'];
	
	$del = "DELETE FROM user WHERE sid = '$usid' ";
	if(mysqli_query($link,$del)){
		//echo "success";
		header ('location:logout.php');
	}
	else {
		echo "error";
	}
?>