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
                        
        if        (mysqli_query($con,$sql))
                {//Success Insert
                        echo "<html>";
                        echo "        <head>";
                        echo "                <head>";
                        echo "                        <meta charset='utf-8'>";
                        echo "                        <title>Update Success !</title>";
                        echo "                        <link rel='stylesheet' type='css/text' href='../css/updatedata.css'>";
                        echo "                </head>";
                        echo "                <body>";                        
                        echo "                        <div id='updatedataform'>";
                        echo "                        <h3>Update Data is</h3>";
						echo "                                gender :".$gender."<br>";
						echo "                                birthday :".$birthday."<br>";
						echo "                                email :".$email."<br>";
                        echo "                                user : ".$user."<br>";						
                        echo "                                pass : ".$pass."<br>";
                        
                        echo "                                <center><a href='../index.php' style='text-decoration:none'>Back to HomePage ?</a></center>";
                        echo "                        </div>";                                        
                        echo "                </body>";
                        echo "        </head>";
                        echo "</html>";                
                
                        mysqli_close($con);                        
                }
        else{
                        die('Error: ' . mysqli_error($con));
        }
        
        
}        
?>