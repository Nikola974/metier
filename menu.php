
<?php
	session_start();
		echo '<header>
			<img class="logo" src="Capture.png">
		</header>';
	if(isset($_SESSION['username'])){
		echo '<nav class="footer-nav">
			<ul class="clearfix">
				<li><a href="LogOut.php">Изход</a></li>
				<li><a href="Registration_firm.php">Регистрация на фирма</a></li>
				<li><a href="CV.php">CV</a></li>
				<li><a href="Profile.php">'.$_SESSION['username'].'</a></li>
			</ul>
		</nav>';
	} 
	else {
	echo '<nav class="footer-nav">
		<ul class="clearfix">
			<li><a href="Registration.php">Регистрация</a></li>
			<li><a href="Login.php">Вход</a></li>
			<li><a href="Home.php">Начало</a></li>
		</ul>
	</nav>';
	}
?>