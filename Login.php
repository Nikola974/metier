<html>
	<head>
	<link href="style_reg.css" rel="stylesheet">
	<link href="Login.css" rel="stylesheet">
	</head>
	
<body>
		<?php
			include 'menu.php';
		?>
		<form method="post">
		  <div class="imgcontainer">
			<img src="avatar.jpg" alt="Avatar" class="avatar">
		  </div>

		  <div class="container">
			<label for="uname"><b>Име</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label for="psw"><b>Парола</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<button type="submit">Login</button>
			<label>
			  <input type="checkbox" checked="checked" name="remember"> Remember me
			</label>
		  </div>

		  <div class="container" style="background-color:#f1f1f1">
			<button type="button" class="cancelbtn" id="cancelb" onclick="document.location.href='contacts.php';">Cancel</button>
		  </div>
		</form>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['uname']) && isset($_POST['psw'])) {
			$username = $_POST['uname'];
			include 'metier.php';
			$sql="SELECT * FROM accounts WHERE username = '$username'";
			$result = mysqli_query($link, $sql) or die(mysqli_error($link));
			$user = mysqli_fetch_array($result);
			
			echo $_POST['psw'];
			echo $user['password'];
			if(password_verify($_POST['psw'],$user['password'])) {
					session_start();
					$_SESSION['username'] = $username;
					$_SESSION['userid'] = $user['id'];
					$_SESSION['cv'] = $user['CV'];
					header('Location: Profile.php');
				} 
				else {
					echo "<p>Wrong password</p>";
				}
			}
		}		
	?>
</body>
</html>