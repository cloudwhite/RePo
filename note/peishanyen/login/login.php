<?php
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	echo "<div style='width:750px; height:400px; margin-left:20%; margin-top:10%; border:3px solid #99FF66; padding:20px; ' >";
	$account=$_POST['act'];
    $password=$_POST['pwd'];
	$tarea=$_POST['tarea'];
	$tarea=ereg_replace("\n", "<br>\n",$tarea);
	$subject=$_POST['sbj'];
	echo "<h3>Subject:";
	echo $subject;
	echo "</h3><br>";
	echo $tarea;
	echo "<br>";
	date_default_timezone_set('Asia/Taipei');
	if ( $account!=NULL && $password!=NULL )
	{ echo "member"; }
	else
	{ echo "not member"; }
	echo "<h4><br>";
	echo date("o/m/d  h:i:s  a");
	echo "</div>";
?>