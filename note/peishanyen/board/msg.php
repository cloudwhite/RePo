<?php session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style>
		.textarea { height: 400px; width:350px; margin-top:10px; float:left; background-color:white; padding:20px; border:3px solid #FFFFA3;}
		.right { float:right; }
	</style>
</head>
<?php
	include("sql_connect.php");
	if ( !isset($_SESSION['acc']) || !isset($_SESSION['pwd']) )
	{
		$acco=$_POST['acc'];
		$result=mysql_query("SELECT `acc`,`pwd` FROM `user` WHERE `acc`='$acco' ");
		if(!$result)
		{
			echo "Can't run query".mysql_error();
		}
		else {
			$row=mysql_fetch_row($result);
		}
		if ($row[1] == $_POST['pwd'])
		{
			$_SESSION['acc']=$_POST['acc'];
			$_SESSION['pwd']=$_POST['pwd'];
		}
		else {
			echo '<h1>not passing</h1><br>';
			echo '<meta http-equiv=REFRESH CONTENT=10;url=home.php>';
			die();
		}
	}
	$text = $_POST['text'];
	$sbj = $_POST['sbj'];
	if ($text)
	{
		mysql_query("INSERT INTO `messageboard`.`board`(`subject`, `content`) VALUES('$sbj','$text');");
		echo mysql_error();
	}
	
	echo "<div class='right'>
		  <form action='logout.php' method='post'>
		  <input type='submit' value='log out' /></form></div>";

	echo "<form action='msg.php' method='post'>
          <div class='textarea'>
          Subject: <input type='text' name='sbj' /><br><p>
		  Please write down your message.</p>
		  <textarea rows='10' cols='30' name='text'> </textarea>
		  <input type='submit' /></form></div>";
	
	$all=mysql_query("SELECT `subject`,`content` FROM `board` ");
	if(!$all)
	die ("123");
 	while($t=mysql_fetch_array($all))
	{
		echo $t['subject']."<br>";
		echo $t['content']."<br>";
	}
	
	
?>
</html>