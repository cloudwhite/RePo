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
						echo "		<meta charset='utf-8'>";
						echo "		<title>更新成功 !</title>";
						echo "	</head>";
                        echo "<script>";											
                        echo "	alert('更新內容為:'+'$content');";
						echo "	location.href='../index.php'";
						echo "</script>";
                                               
                }
        else{
                        die('Error: ' . mysqli_error($con));
        }
        mysqli_close($con);
}        
?>