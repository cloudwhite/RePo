<?php
include('config.php');
$acc = $_POST['account'];
$pass = $_POST['password'];

$display = "";
$login = false;
if (!isset($_SESSION[$session])) {
	if (!isset($acc, $pass)) {
		$display = "<h1>請輸入帳號和密碼!</h1>";
	}
	else {
	    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($mysqli->connect_errno) {
            die('Connection Error#' . $mysqli->connect_error);
        }
	    $query = "SELECT acc,pwd FROM user WHERE acc='$acc';";
        $res = $mysqli->query($query);
        if ($mysqli->errno) {
             die('Error #' . $mysqli->error);
        }
        $row = $res->fetch_row();
        if ($row && $row[1] == $pass) {
            $display = "<h1>登入成功</h1>";
            $_SESSION[$session]=$row[0];
            $login = true;
        }
    	else {
    		$display = "<h1>輸入錯誤</h1>";
    	}
        $res->close();
        $mysqli->close();
    }
} // isset($_SESSION[$session])
else {
	if ($_POST['logout'] == 'logout') {
		$login = false;
		unset($_SESSION[$session]);
		header('location:.');
		exit;
	}
	
	$display = "<h1>登入成功</h1>";
	$login = true;
}
?>
<!DOCTYPE HTML>
<html lang="zh-TW">
	<head>
		<meta charset="UTF-8"/>
		<title>Login plz</title>
		<link rel="stylesheet" href="layout.css"/>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="event.js"></script>
		<script src="message.js"></script>
	</head>
	
	<body>
		<div id="display">
<?php
if ($login) {
    // 顯示user帳號和歡迎訊息
	$display .= "<table><tr>
                    <td id=\"msg_board\">
                        <p>User:$_SESSION[$session]</p>
                        <form method=\"post\">
                        	<input type=\"submit\" name=\"logout\" value=\"logout\"/>
                        	<input type=\"button\" id=\"update\" value=\"update\" />
                        </form>
<br/>";
    // 先顯示10筆訊息做測試，時間由JS轉為locale
	$display .= "=========================================<br/><div id=\"output\"></div><script>load_msg()</script>";
    // <div id="msg_board">...</div>
	$display .= '  </td>
                    <td id="input_area">
                                        寫個留言吧ლ(́◉◞౪◟◉‵ლ):<input id="subject" type="text" value="輸入主題" required /><br/>
                        <textarea id="content" rows="6" cols="60" required ></textarea>
                        <input type="button" id="send_text" value="送出" />
                    </td>
                </tr></table>';
	
	print $display;
}
else {
	$display.= '<form method="post">
					<div id="login_field">
						Account:<input name="account" type="text" required/><br/>
						Password:<input name="password" type="password" required/><br/>
						<input type="submit" value="Submit"/>
						<input type="button" id="reg" value="Register" />
					</div>
				</form>';
	print $display;
}
?>
		</div>
	</body>
</html>