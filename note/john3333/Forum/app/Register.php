<?php	
// Create connection
	$con=mysqli_connect("127.0.0.1","root","root","Forum");
//
	$gender=$_POST['gender'];
	$birthday=$_POST['birthday'];
	$email=$_POST['email'];
	$user=$_POST['user'];
	$pass=$_POST['password'];	
	$sql="INSERT INTO user (gender,birthday,email,user,pass) 
					VALUES ('$gender','$birthday','$email','$user','$pass')";
	$result=mysqli_query($con,"SELECT * FROM user WHERE user='$user'");
	$row = mysqli_fetch_array($result);
if($row['user']==$user){
	echo "	<script>
				alert('The Same ID !');
				location.href='../index.php';
			</script>";
}
else{
	if ($gender==null || $birthday==null || $email==null || $user==null || $pass==null){
		echo "	<script>
					alert('Something is Empty !');
					location.href='../index.php';
				</script>";
	}
	else{
		if	(mysqli_query($con,$sql)){
			//Success Insert
				echo "<html>";
				echo "	<head>";
				echo "		<head>";
				echo "			<meta charset='utf-8'>";
				echo "			<title>Register Success !</title>";
				echo "			<link rel='stylesheet' type='css/text' href='../css/Register.css'>";
				echo "			<script src='../js/function.js'></script>";
				echo "		</head>";
				echo "		<body>";			
				echo "			<div id='Register_form'>";
				echo "			<h4>Your Data is</h4>";
				echo "				<h3>You are the ".$row['sid']."th User in this Website !</h3>";
				echo "				gender :".$gender."<br>";
				echo "				birthday :".$birthday."<br>";
				echo "				email :".$email."<br>";
				echo "				user : ".$user."<br>";
				echo "				pass : ".$pass."<br>";
				echo "			</div>";			
				echo "			<script>Time=setTimeout('HomePage()',5000)</script>";
				echo "		</body>";
				echo "	</head>";
				echo "</html>";		
		}
		else{
				die('Error: ' . mysqli_error($con));
		}
	}
}
	mysqli_close($con);
?>