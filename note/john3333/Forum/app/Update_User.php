<?php
session_start();

if($_SESSION['user']==null){
        header("location:register.php");
}
else{        
// Create connection
        $con=mysqli_connect("127.0.0.1","root","root","Forum");
//
		
		$gender=$_POST['gender'];
        $birthday=$_POST['birthday'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		
        $user=$_SESSION['user'];
        $sql="UPDATE user SET gender='$gender',birthday='$birthday',email='$email',pass='$pass' WHERE user='$user'";
                        
        if	(mysqli_query($con,$sql)){
		//Success Insert
                    echo "<html>";
                    echo "	<head>";
                    echo "  	<meta charset='utf-8'>";
                    echo "      <title>Update Success !</title>";
					echo "	</head>";
                    echo "  <body>";
					echo "		<script>";				
					echo "      	alert('".
										"更新資料為:\\r".
										"	gender :".$gender."\\r".
										"	birthday :".$birthday."\\r".
										"	email :".$email."\\r".
										"	user : ".$user."\\r".						
										"	pass : ".$pass."\\r".
									"');";
					echo "			location.href='../index.php'";
					echo "		</script>";
                    echo "	</body>";    
                    echo "</html>";                        
        }
        else{
                    die('Error: ' . mysqli_error($con));
        }
	mysqli_close($con);   
}        
?>