<?php
session_start();
	if($_SESSION['user']!=null){
		unset($_SESSION['user']);
	}
	if($_SESSION['type']!=null){
		unset($_SESSION['type']);
	}
	if($_SESSION['sid']!=null){
		unset($_SESSION['sid']);
	}
	
	echo "<script>";
	echo "	location.href='../index.php';";
	echo "</script>;";
?>