<?php
session_start();

if($_SESSION['user']==null){
        header("location:register.php");
}
else{        
// Create connection
        $con=mysqli_connect("127.0.0.1","root","root","Forum");
//
		$content=$_POST['content'];
		$sid=$_SESSION['sid'];
        $sql="UPDATE board SET content='$content' WHERE sid='$sid'";                        
        if	(mysqli_query($con,$sql))
                {//Success Insert
                        echo "<html>";
                        echo "	<head>";
                        echo "  	<meta charset='utf-8'>";
                        echo "  	<title>Update Success !</title>";
                        echo "  	<link rel='stylesheet' type='css/text' href='../css/Update_Essay.css'>";
                        echo "		<script src='../js/function.js'></script>";
						echo "	</head>";
                        echo "	<body>";                        
                        echo "      <div id='Update_Essayform'>";
                        echo "      	<h3>Update Data is</h3>";											
                        echo "      	content : ".$content."<br>";   
                        echo "      </div><br>";
						echo "  	<input type='button' value='首頁' onclick='HomePage()' />";						
                        echo "	</body>";
                        echo "</html>";
                                               
                }
        else{
                        die('Error: ' . mysqli_error($con));
        }
        mysqli_close($con);
}        
?>