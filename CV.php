
<html>
	
	<head>
	<link href="style_home.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include 'metier.php';
			include 'menu.php';
			
			if(isset($_FILES["fileToUpload"])){
				$file = $_FILES["fileToUpload"];
				$file_content = file_get_contents($file["tmp_name"]);
				$file_content = base64_encode($file_content);
				$sql = "UPDATE accounts SET CV = '$file_content' WHERE id = " .$_SESSION['userid'];
				$result=mysqli_query($link, $sql) or die(mysqli_error($link));
				$_SESSION['cv'] = $file_content;
			}
		?>
		<div>
			<button id="cvbutton">Preview my CV</button>
		</div>
		<br>
		<div>
			<form method="post" enctype="multipart/form-data">
				Избери CV за качване:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Upload CV" name="submit">
			</form>
		</div>
		
		
		<div class="box-holder right" id="box">
		</div>
		
		<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){  
			$("#cvbutton").click(function() {
				window.open("Preview.php","_blank");
			});
		});
	</script>
	</body>
</html>