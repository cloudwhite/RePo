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
        	/*function myrefresh()
 			{
      			window.location.reload();
 			}
 			setTimeout('myrefresh()',1000);/*
        </script>
        <div style="text-align: right;">
        <form action="logout.php" method="get">
        	<input type="submit" value="logout" />
        </form>
        <br>
        	<a href = 'modifyuser.php'>modify-personal-information</a>
		</div>
		<h1 style="text-align:center;">welcome</h1>
		<form action = "messagein.php" method = "post" name = "form">
		<div style="text-align:center;">
		<textarea id = "message" name = "content" wrap="soft" style=" width: 700px; height: 100px"></textarea>
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
			<table align='center' width='700px' height='150px' border='0' >
 			<tr style=font-size:10px;height:10px>
 				<td></td>
 				<td></td>
 				<td>
 					<form action = 'modifymsg.php' method = 'post' name = 'modifymsgform' >
 					<input type = 'textarea' style = 'display : none;' value = ".$row['sid']." name = 'msid' />
 					<input type = 'submit' value = 'modify' />
 					</form>
 				</td>
 				<td>
 					<form action = 'deletemsg.php' method = 'post' name = 'delform' >
 					<input type = 'textarea' style = 'display : none;' value = ".$row['sid']." name = 'dsid' />
 					<input type = 'submit' value = 'delete' />
 					</form>
 				</td>
 			</tr>
 			<tr style=height:10px>
 				<td style=width:70px>user:
 				".$row['user']."</td>
 				<td align='left'>center:</td>
    		</tr>
    		<tr >
    			<td></td>
    			<td align='left'>".$row['content']."</td>
    		</tr>
    		<tr style=font-size:5px;height:10px>
    			<td></td>
    			<td></td>
    			<td>msgtime:</td>
    			<td>modify time :</td>
    		</tr>
    		<tr style=font-size:5px;height:10px>
    			<td></td>
    			<td></td>
    			<td style=width:120px>".$row['date']."</td>
    			<td style=width:120px>".$row['modifydate']."</td>
  			</tr>
		</table>";
	}
?>