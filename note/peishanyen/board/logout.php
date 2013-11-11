<?php
	session_start();
    unset($_SESSION['acc']);
	unset($_SESSION['pwd']);
	echo '<h1>You log out.</h1><br>';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=home.php>';
?>