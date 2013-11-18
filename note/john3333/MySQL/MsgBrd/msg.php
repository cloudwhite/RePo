<?php session_start(); ?>
<?php
if($_SESSION['user']==null){
	header("location:register.php");
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./css/msg.css">
		<title>Msg</title>
		<script src="./js/ajax_content.js"></script>
		<script src="./js/ajax_msg.js"></script>		
	</head>
	
		<body onload="showcontent()">
			<div id="contents"></div>
			<br>
			<div id="msgsend">
				留言內容 : 	<input type="text" name="content" id="content" />
							<input type="submit" value="留言" onclick="msgsend()" />
							<a href="./app/logout.php" style="text-decoration:none">登出</a>
			</div>
			<!-- 自動抓取 ajax 同步聊天記錄 ,每 5 秒一次動作 -->
			<script language="JavaScript" type="text/javascript">
				setInterval(function(){showcontent()},5000);
			</script>
		</body>
</html>