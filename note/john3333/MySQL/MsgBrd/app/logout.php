<?php session_start(); ?>
<?php
header("location:../index.php");
unset($_SESSION['user']);
?>