<?php
	session_start();
	$link = mysqli_connect("127.0.0.1" , "root" , "123456" , "board");
	//mysql_select_db("msg");
	mysql_query("set names utf8");
	date_default_timezone_set("Asia/Taipei");
	if($_SESSION['account'] == null){
		header('location:login.html');
	}
	$msid = $_POST['msid'];
	$content = $_POST['contant'];
	$modifydate = date("o/m/d  h:i:s  a");
	$sql = "UPDATE msg SET modifydate = '$modifydate' , content = '$content' WHERE sid = '$msid' ";
	if(mysqli_query($link,$sql)){
		header('location:lookmessage.php');
	}
	else {
		echo "error";
	}
?>