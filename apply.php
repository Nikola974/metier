<?php
	session_start();
	include 'metier.php';
	
	$offer_id = $_GET['offer_id'];//
	$user_id = $_SESSION['userid'];//
	$sql= "INSERT INTO applications (offer_id,user_id) VALUES ($offer_id,$user_id)";
	echo $sql;
	$result = mysqli_query($link, $sql) or die(mysqli_error($link));
?>