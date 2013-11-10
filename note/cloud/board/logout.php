<?php 
	session_start(); 
	unset($_SESSION['account']);
	unset($_SESSION['user']);
	header("location:login.html");
?>