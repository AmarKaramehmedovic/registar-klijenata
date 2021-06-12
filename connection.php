<?php
	$servername = "localhost:3306";
	$user = "root";
	$pass = "";	
	$db = "registar_klijenata_db";
				
	$conn = mysqli_connect($servername, $user, $pass, $db) or die("Error" . mysqli_connect_error());
?>