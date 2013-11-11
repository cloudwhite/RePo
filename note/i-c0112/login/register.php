<?php
require("config.php");
$acc = $_POST['account'];
$pwd = $_POST['password'];
$nm = $_POST['name'];
$em = $_POST['email'];
$pn = $_POST['phone'];
$bt = $_POST['birth'];

$login = false;
if (isset($acc, $pwd)) {
    // 註冊並處理SQL錯誤，尤其是unique是否有重複
    // 錯誤->留在此頁並顯示錯誤訊息; 正確->跳至index.php並登入
    // errno: 1062 -> duplicate entry for UNIQUE KEY(S)
    $mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$mysqli) {
        mysqli_close($mysqli);
        die("Conmection Error #" . mysqli_connect_errno($mysqli));
    }
    
    $sql = "INSERT INTO user(acc, pwd, name, email, mobile, birth) VALUES(\"$acc\", \"$pwd\", \"$nm\", \"$em\", \"$pn\", \"$bt\")";
    if (!mysqli_query($mysqli, $sql)) {
        $e = mysqli_errno($mysqli);
        if ($e == 1062 || $e == 1586) {
            $err = '帳號已被使用';
            // continue and print the document
        }
        else {
            die("Error #" . mysqli_error($mysqli));
        }
    }
    else {
        $_SESSION[$session] = $acc;
        header("location:index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="layout.css" />
		<title>註冊帳號</title>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="event.js"></script>
	</head>
	<body>
	   <div id="display">
	       <form method="post">
                           帳號:<input type="text" name="account" value="<?php print $err?>" required /><br />
	           密碼:<input type="text" name="password" required /><br />
	           姓名:<input type="text" name="name" /><br />
               E-mail<input type="text" name="email" /><br />
	           手機:<input type="text" name="phone" /><br />
	           生日:<input type="text" name="birth" /><br />
	           <input type="submit" value="register" />
	           <input type="button" id="back" value="back to Main page" />
	       </form>
	   </div>
	</body>
</html>