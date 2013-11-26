<?php 
session_start();
        if($_SESSION['user']==null){
                header("location:register.php");
        }
        else{
                $con=mysqli_connect("127.0.0.1","root","root","Forum");
				$sid=$_GET['sid'];
				$_SESSION['sid']=$sid;
                $sql="SELECT * FROM board WHERE sid='$sid'";                
                if	(mysqli_query($con,$sql))
                {                        
                        $result=mysqli_query($con,$sql);
						$row = mysqli_fetch_array($result);
						if($row['author']!=$_SESSION['user']){
							echo "<script>";
							echo "	alert('You are not Author !');";
							echo " 	location.href='./index.php'";
							echo "</script>";
						}
						else{
							echo "<html>";
							echo "	<head>";
							echo "  	<meta charset='utf-8'>";
							echo "      <title>Update Essay</title>";
							echo "		<link rel='stylesheet' type='css/text' href='./css/Update_Essay.css'>";
							echo "		<script src='./js/function.js'></script>";
							echo "  </head>";
							echo "  <body>";
							echo "     	<div id='Update_Essayform'>";
							echo "      	<form action='./app/Update_Essay.php' method='POST' name='updateform'>";
							echo "				content: <input type='text' value='".$row['content']."' name='content' /><br>";
							echo "          <input type='submit' value='Update'>";														
							echo "          </form>";							  							
							echo "      </div><br>";
							echo "		<input type='button' value='登出' onclick='Logout()'>";
							echo "		<input type='button' value='返回首頁' onclick='index()'>";
							echo "	</body>";
							echo "</html>";
						}
                }
                else{						
                        die('Error: ' . mysqli_error($con));
                }                
        }
?>


