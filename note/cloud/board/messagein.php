<?php
	session_start();
	if($_SESSION['account'] == null){
		header('location:login.html');
	}
	mysql_query("SET NAMES ‘UTF8′");
	$link = mysqli_connect( "127.0.0.1" , "root" , "123456" , "board");
	date_default_timezone_set("Asia/Taipei");
	//$now = date("o/m/d  h:i:s  a");
	echo "<div style='text-align:center;'>";
	$content = $_POST["content"];
	$content = ereg_replace("\n", "<br>", $content);
	//echo $content."<br>";
	$date = date("o/m/d  h:i:s  a");
	//echo $date."<br>";
	$user = $_SESSION['account'];
	//echo $user."<br>";
	$account = $_SESSION['sid'];
	//echo $account;
	if($content != ""){
	$sql = "INSERT INTO msg (user , account , `date` , content) VALUES ('$user' , '$account' , '$date' , '$content')";
	//$sql = "INSERT INTO  `board`.`msg` (`sid` ,`user` ,`account` ,`date-time` ,`content` ,`file` ,`subject` ,`type` ,`group` ,`priority` ,`like` ,`reply` ,`password`)VALUES (NULL ,  '$user',  '$account',  '$date',  '$content',  '',  '',  '',  '',  '',  '',  '',  '')";
	if(mysqli_query($link,$sql)){
		echo "<h1> write on ";
		echo $date;
		echo "</h1><br>";
		echo "<h3>your content: </h3><br>";
		echo $content;
		echo "</div>";
		echo "<a href='lookmessage.php'>goback</a>";
	}
	else{
		echo "error : enter information fail";
	}}
	else{
		echo "error : content can not NULL";
	}
?>