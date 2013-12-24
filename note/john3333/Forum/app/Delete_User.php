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
        $sql="DELETE FROM user where user='$user'";
                        
        if        (mysqli_query($con,$sql))
                {//Success Insert
                        echo "<html>";
                        echo "        <head>";
                        echo "                <head>";
                        echo "                        <meta charset='utf-8'>";
                        echo "                        <title>Delete User Success !</title>";
                        echo "                        <link rel='stylesheet' type='css/text' href='../css/Delete_User.css'>";
                        echo "                </head>";
                        echo "                <body>";                        
                        echo "                        <script>".
						                                "alert('".
														"gender :".$gender."\\r".
						                                "birthday :".$birthday."\\r".
						                                "email :".$email."\\r".
                                                        "user : ".$user."\\r".				
                                                        "pass : ".$pass."\\r".
														"');".
														"location.href='../index.php';";
                        echo "                        </script>";                                        
                        echo "                </body>";
                        echo "        </head>";
                        echo "</html>";                
                
                        mysqli_close($con);                        
                }
        else{
                        die('Error: ' . mysqli_error($con));
        }
        
}
unset($_SESSION['user']);      
?>