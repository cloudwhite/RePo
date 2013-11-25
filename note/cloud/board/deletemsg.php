<?php
	session_start();
	$link = mysqli_connect("127.0.0.1" , "root" , "123456" , "board");
	//mysql_select_db("msg");
	mysql_query("set names utf8");
	if($_SESSION['account'] == null){
		header('location:login.html');
	}
	/*$useraccount = $_SESSION['account'];
	$sql = "SELECT * FROM user WHERE account = '$useraccount'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_array($result);*/
	$raccount = $_SESSION['sid'];
	$psid = $_POST['dsid'];
	$del = "DELETE FROM msg WHERE account = '$raccount' AND sid = '$psid' ";
	if(mysqli_query($link,$del)){
		//echo "success";
		header ('location:lookmessage.php');
	}
	else {
		echo "error";
	}
?>