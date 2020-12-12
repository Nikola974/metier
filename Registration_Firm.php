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
				<h1>Създаване на обява</h1>
				<hr>
				
				<label for="firmname"><b>Име на фирмата</b></label>
				<input placeholder="Име на фирмата" type="text" name="firmname" required>
				
				<label for="bulstat"><b>ЕИК/БУЛСТАТ</b></label>
				<input placeholder="Булстат" type="text" name="bulstat" required>
				
				<label for="address"><b>Адрес на компанията</b></label>
				<input placeholder="Адрес" type="text" name="address" id="address" required>
				
				<label for="sector"><b>Дейност на фирмата</b></label>
				<select name="sector" class="field-select" id="sector" required>
				<option value="0" selected>Бизнес сектор</option>
					<?php
					include 'metier.php';
					$sqlQuery = 'SELECT * FROM sector';
					$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
					if($result) {		
						while ($spec = mysqli_fetch_array($result)) {
						echo '<option value="'.$spec['id'].'">' . $spec['sector'] . '</option>';
						}
					}                
					
					?>
				</select>
				
				<label for="position"><b>Длъжност</b></label>
				<input placeholder="Длъжност" type="text" name="position" id="position" required>
				
				<label for="city"><b>Град</b></label>
				<select name="city" class="field-select" id="city" required>
				<option value="0" selected>Град</option>
					<?php
					include 'metier.php';
					$sqlQuery = 'SELECT * FROM city';
					$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
					if($result) {		
						while ($city = mysqli_fetch_array($result)) {
						echo '<option value="'.$city['id'].'">' . $city['city'] . '</option>';
						}
					}                
					
					?>
				</select>
				
				<label for="conditions"><b>Условия</b></label>
				<input placeholder="Условия" type="text" name="conditions">
				<hr>

				<button type="submit" class="registerbtn">Създаване</button>
				</div>

				<div class="container signin">
				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						if(isset($_POST['firmname']) && isset($_POST['bulstat'])){
							$firmname = $_POST['firmname'];
							$bulstat = $_POST['bulstat'];
							$address = $_POST['address'];
							$sector = $_POST['sector'];
							$city = $_POST['city'];
							$position = $_POST['position'];
							$conditions = $_POST['conditions'];
							
							
							include 'metier.php';
							$sqlQuery= "INSERT INTO offers (firmname,bulstat,address,id_sector,id_city,position,conditions) 
										VALUES ('$firmname','$bulstat','$address','$sector','$city','$position','$conditions')";
							$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));  
							if(!$result)
								die("Добавяне на запис е неуспешно:". mysqli_error($link));
							echo "Добавянето на запис е успешно";       
							
							session_start();
							
							$_SESSION['valid_firmname'] = $firmname;
							$_SESSION['valid_bulstat'] = $bulstat;
							$_SESSION['valid_$address'] = $address;
							echo "<p>Успешна регистрация!</p>";
							echo '<p> Продължете към <a href="signin.php"> Вход! </a></p>';
						} else {
							echo "Neuspeshna registraciq!";
						}
					}
				?>
				
				
	
				</div>
		</form>
	</body>
</html>