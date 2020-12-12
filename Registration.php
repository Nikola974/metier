<html>
	<head>
	<link href="style_reg.css" rel="stylesheet">
	</head>
	
	<body>		
		<?php
			include 'menu.php';
		?>
		<form method="post">
			<div class="container">
				<h1>Регистрация</h1>
				<hr>
				
				<label for="name"><b>Име</b></label>
				<input placeholder="Въведете вашето име" type="text" name="name" required>
				
				<label for="famname"><b>Фамилия</b></label>
				<input placeholder="Въведете вашата фамилия" type="text" name="famname" required>
				
				<label for="email"><b>Email</b></label>
				<input placeholder="Въедете вашия email" type="email" name="email" id="email" required>

				<label for="name"><b>Потребителско име</b></label>
				<input placeholder="Въведете вашето потребителско име" type="text" name="username" required>
				
				<label for="password"><b>Парола</b></label>
				<input placeholder="Въведете вашата парола" type="password" name="password" id="password" required>

				<label for="psw-repeat"><b>Повторете Парола</b></label>
				<input placeholder="Повторете вашата парола" type="password" name="psw-repeat" id="psw-repeat" required>

				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						if(isset($_POST['username']) && isset($_POST['password'])){
							$username = $_POST['username'];
							$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
							$email = $_POST['email'];
							$name = $_POST['username'];
							$fname = $_POST['famname'];
							
							include 'metier.php';
							$sqlQuery= "INSERT INTO accounts (name,fname,email,username,password) VALUES ('$name','$fname','$email','$username','$password')";
							$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));  
							if(!$result)
								die("Добавяне на запис е неуспешно:". mysqli_error($link));      
														
							$_SESSION['valid_user'] = $username;
							echo "<p>Успешна регистрация!</p>";
							echo '<p> Продължете към <a href="Login.php"> Вход! </a></p>';
						} else {
							echo "Neuspeshna registraciq!";
						}
					}
				?>
				<hr>
				<button type="submit" class="registerbtn">Регистрация</button>
				</div>

				<div class="container signin">
				<p>Вече имате акаунт <a href="Login.php">Вход</a>.</p>
				</div>
		</form>
	</body>
</html>