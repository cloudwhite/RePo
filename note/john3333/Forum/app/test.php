<?php
	$content=$_GET['content'];
	$content=str_replace(' ','',$content);
	$content=str_replace('</',' ',$content);
	$content=str_replace('<',' ',$content);
	$content=str_replace('>',' ',$content);	
	echo $content;
?>