<?php
session_start();
unset($_SESSION['user']);
	echo "<script>";
	echo "	location.href='../index.php';";
	echo "</script>;";
?>