```html
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>login</title>
	</head>
	<body>
		<h2 style = "text-align:center;">please input account and password</h2>
		<form style = "text-align:center;" action = "login.php" method = "post" name = "form">
		account:<input type="text" name = "account" />
		<br>
		password:<input type="password" name = "password"/>
		<br>
		<input type="submit" value="login" />
		 </form>
	</body>
</html>
```

----

```php
<?php
	//echo $_POST["account"];
	//echo "<br>";
	//echo $_POST["password"];
	//date_default_timezone_set("Asia/Taipei");
	$account = $_POST["account"];
	$password = $_POST["password"];
	if( $account == "cloud" && $password == "1234" )
	{
		echo "sucess";
	}
	else {
		echo "error";
		//echo "<br>";echo date("o/m/d  h:i:s  a");
	}
?>
```