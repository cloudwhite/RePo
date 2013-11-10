<?php
	session_start();
	$link = mysqli_connect("127.0.0.1" , "root" , "123456" , "board");
	//mysql_select_db("msg");
	mysql_query("set names utf8");
	if($_SESSION['account'] == null){
		header('location:login.html');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>message</title>
	</head>
	<body>
		<script language="JavaScript" type="text/javascript">
        	setInterval(function(){showcontent()},3000);
        </script>
        <div style="text-align: right;">
        <form action="logout.php" method="get">
        	<input type="submit" value="logout" />
        </form>
		</div>
		<h1 style="text-align:center;">welcome</h1>
		<form action = "messagein.php" method = "post" name = "form">
		<div style="text-align:center;">
		<textarea id = "message" name = "content" wrap="soft" style=" width: 500px; height: 100px"></textarea>
		</div>
		<br>
		<div style = "text-align:center;">
			<input type="submit" value = "enter" />
		</div>
		</form>
		
	</body>
</html>
<?php
	$sql = "SELECT * FROM msg ORDER BY sid DESC";//DESC 是由大往小
	$result = mysqli_query($link,$sql);
	echo "<div style = 'text-align:center;'>最新貼文</div>";
	while($row = mysqli_fetch_array($result)){
		echo "<br>
			<br>
			<table align='center' width='300px' height='100px' border='0' >
 			<tr style=font-size:10px;>
 				<td>account:</td>
 				<td>".$row['account']."</td>
 			</tr>
 			<tr style=font-size:20px;>
 				<td>user:</td>
 				<td>".$row['user']."</td>
    		</tr>
    		<tr style=font-size:15px;>
    			<td>center:</td>
    			<td>".$row['content']."</td>
    		</tr>
    		<tr style=font-size:10px;>
    			<td>time:</td>
    			<td>".$row['date']."</td>
  			</tr>
		</table>";
	}
?>