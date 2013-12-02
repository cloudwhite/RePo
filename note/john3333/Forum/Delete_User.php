<?php 
session_start();
        if($_SESSION['user']==null){
                echo "<script>";
				echo "	alert('Didnt Register!');";
				echo "	location='./Register.php';";
				echo "</script>";
        }
        else{
                $con=mysqli_connect("127.0.0.1","root","root","Forum");
                $user=$_SESSION['user'];
                $sql="SELECT * FROM user WHERE user='$user'";
                $result=mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
                if	(mysqli_query($con,$sql)){                        
                        echo "	<html>";
                        echo "		<head>";
                        echo "			<meta charset='utf-8'>";
                        echo "          <title>Delete ?</title>";
                        echo "          <link rel='stylesheet' type='css/text' href='./css/Delete_User.css'>";
                        echo "			<script src='./js/function.js'></script>";
						echo "		</head>";
                        echo "		<body>";
                        echo "			<div id='Delete_User_form'>";
                        echo "          	<form action='./app/Delete_User.php' method='POST' name='Delete_User_form'>";
						echo "              	gender: "."<input type='text' name='gender' value='".$row['gender']."' /><br>";
						echo "                  birthday: "."<input type='text' name='birthday' value='".$row['birthday']."' /><br>";
						echo "                  email: "."<input type='text' name='email' value='".$row['email']."' /><br>";
                        echo "                  user : ".$row['user']."<br>";
                        echo "                  pass : "."<input type='text' name='pass' value='".$row['pass']."' /><br>";						
                        echo "              <input type='submit' value='確定刪除'>";                                          
                        echo "           	</form>";
                        echo "			</div>";
						echo "          <input type='button' value='返回首頁' onclick='index()' />";						 
                        echo "		</body>";
                        echo "</html>";
                }
                else{
                        die('Error: ' . mysqli_error($con));
                }                
        }
?>