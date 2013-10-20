我目前的進度
----
```html
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>write message</title>
	</head>
	<body>
		<h3 style="text-align: center">please write your message</h3>
		<br>
		<form action = "message.php" method = "post" name = "form">
		<div style="text-align:center;">
		<textarea id = "message" name = "content" wrap="soft" style=" width: 600px; height: 300px"></textarea>
		</div>
		<br>
		<div style = "text-align:center;">
			<input type="submit" value = "enter" />
		</div>
		</form>
	</body>
</html>
```

----

```php
<?php
	//mysql_query("SET NAMES ‘UTF8′");
	//$link = mysql_connect( "127.0.0.1" , "root" , "123456" );
	//$now = date("o/m/d  h:i:s  a");
	echo "<div style='text-align:center;'>";
	$content = $_POST["content"];
	$content = ereg_replace("\n", "<br>", $content);
	date_default_timezone_set("Asia/Taipei");
	echo "<h1> write on ";
	echo date("o/m/d  h:i:s  a");
	echo "</h1><br>";
	echo "<h3>your content: </h3><br>";
	echo $content;
	echo "</div>";
?>
```