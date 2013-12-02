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
		$sql="SELECT * FROM board WHERE sid='$sid'";
		$result=mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
        if(mysqli_query($con,$sql)){
			$image=$row['image'];
			if($row['image']==null){
			}
			else{
				$image="..\\file\\image\\".$row['image'];
				unlink($image);
			}
			$file=$row['file'];
			if($row['file']==null){
			}
			else{
				$file="..\\file\\file\\".$row['file'];
				unlink($file);
			}
		
		}
		else{
			die('Error: ' . mysqli_error($con));
		}
		$sql="DELETE FROM board WHERE sid='$sid'";                        
        if	(mysqli_query($con,$sql))
                {//Success Insert
                        echo "<html>";
                        echo "	<head>";
                        echo "  	<meta charset='utf-8'>";
                        echo "  	<title>Delete Success !</title>";
                        echo "  	<link rel='stylesheet' type='css/text' href='../css/Delete_Essay.css'>";
                        echo "		<script src='../js/function.js'></script>";
						echo "	</head>";
                        echo "	<body>";                        
                        echo "      <div id='Delete_Essay_form'>";
                        echo "      	<h3>Delete Data is</h3>";											
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