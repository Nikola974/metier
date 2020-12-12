<?php
	session_start();
	include 'metier.php';
	$cv_content = $_SESSION["cv"];
		if(isset($_GET['id'])){
				$sql= "SELECT CV FROM accounts WHERE id=" .$_GET['id'];
				$result = mysqli_query($link, $sql) or die(mysqli_error($link));
				while ($row = mysqli_fetch_array($result) ){
					$cv_content = $row['CV'];
				}
		}
		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="test.pdf"');
	echo base64_decode($cv_content, true);
	exit;
?>