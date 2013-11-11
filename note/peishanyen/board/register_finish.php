<?php
	session_start();
	include("sql_connect.php");
	$na=$_POST['na'];
	$ac=$_POST['ac'];
	$pw=$_POST['pw'];
	$em=$_POST['em'];
	$mo=$_POST['mo'];
	$bi=$_POST['bi'];
	if ( isset($na) && isset($ac) && isset($pw) && isset($em) )
	{
		$sql="INSERT INTO  `messageboard`.`user` (`name` ,`pwd` ,`moblie` ,`email` ,`birth` ,`acc` ,`sid`)VALUES ('{$na}',  '{$pw}',  '{$mo}',  '{$em}',  '{$bi}',  '{$ac}', NULL);";
		if (mysql_query($sql))
		{
			echo "<h1>You success to register.</h1>";
			$_SESSION['acc']=$ac;
			$_SESSION['pwd']=$pw;
			echo '<meta http-equiv=REFRESH CONTENT=1;url=msg.php>';
		}
		else
		{
			echo "<h1>You fail to register.</h1>";
			echo '<meta http-equiv=REFRESH CONTENT=1;url=home.php>';
		}	
	}
	else
	{
		print $na['na'] . "  ;" . $ac . '  ;' . $pw . '  ;' . $em;
		echo "<h1>You fail to register.</h1>";
		echo '<meta http-equiv=REFRESH CONTENT=1;url=home.php>';
	}
	
?>