<?php 
session_start();
	if($_SESSION['user']==null){
		header('location:register.php');
	}

echo "<html>";
echo "	<head>";
echo "		<title>Po��</title>";
echo "	</head>";
	
echo "	<body>";
echo "	<div id='Po_form'>";
echo "		<form action='./app/Po.php' method='POST' name='writing'>";
echo "			Po���� :".$_SESSION['type']."<br>";
echo "			���D�G<input type='text' name='title' /><br>";
echo "			�Ϥ��G<br>";
echo "			�峹���e�G<input type='text' name='content' /><br>";
echo "			�����ɮסG<br>";
echo "			<input type='submit' value='PO_ing'>";
echo "		</form>";
echo "	</div>";
echo "	</body>";
echo "</html>";
?>