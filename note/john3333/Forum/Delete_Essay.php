<?php 
session_start();
        if($_SESSION['user']==null){
                header("location:register.php");
        }
        else{
                $con=mysqli_connect("127.0.0.1","root","root","Forum");
				$sid=$_SESSION['sid'];
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
							echo "      <title>Delete Essay ?</title>";
							echo "		<link rel='stylesheet' type='css/text' href='./css/Delete_Essay.css'>";
							echo "		<script src='./js/function.js'></script>";
							echo "  </head>";
							echo "  <body>";
							echo "	<div id='image_form'>";
								if($row['image']!=null){
									echo "		<img src='./file/image/".$row['image']."' />";
								}
								else{
									echo "No Image";
								}			
							echo "	</div><br>";
							echo "	<div id='file_form'>";
								if($row['file']!=null){
									echo "		<a href='./file/file/".$row['file']."' target='_blank' >".$row['file']."</a>";
								}
								else{
									echo "No Image";
								}			
							echo "	</div><br>";
							echo "	<div id='content_form'>";
								if($row['content']!=null){
									echo $row['content']."<br>";
								}
								else{
								}
							echo "	</div><br>";	
							echo "     	<div id='Delete_Essay_form'>";
							echo "      	<form action='./app/Delete_Essay.php' method='POST' name='Delete_Essay_form'>";
							echo "				<h3>警告 ! 若刪除資料將無法復原!!</h3>";							
							echo "          <input type='submit' value='確認刪除'><br>";
							echo "			<input type='button' value='返回首頁' onclick='index()'>";							
							echo "          </form>";							  							
							echo "      </div><br>";							
							echo "	</body>";
							echo "</html>";
						}
                }
                else{						
                        die('Error: ' . mysqli_error($con));
                }                
        }
?>


