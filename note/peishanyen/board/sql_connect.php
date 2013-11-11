<?php
    $db = mysql_connect("localhost","root","root","messageboard");
	if (!$db)
		die("Not connect SQL.");
	if (!mysql_query("SET NAMES utf8"))
		die("Can't use SQL.");
	if (!mysql_select_db("messageboard", $db))
		die("Can't use SQL.");
	
?>