<?php
	session_start();
	$user=$_SESSION['valid_user'];
	$pass = $_SESSION['valid_password'];
?>
<html>
<body>
	<form method="POST">
		<table>
			<tr>
				<td colspan="2"><h1>Log In</h1></td>
			</tr>
			<tr>
				<td>Potrebitelsko ime</td>
				<td><input type="text" name="userid" /></td>
			</tr>
			<tr>
				<td style="text-align:right">Password</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td colspan = "2" style="text-align:right"> <input type="submit" value="Vhod" id="Enter" /> </td>
			</tr>
		</table>
	</form>
	
	<?php
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(isset($_POST['userid']) && isset($_POST['password'])){
				$username = $_POST['userid'];
				$password = $_POST['password'];
				if($username == $user && $password == $pass){
					echo "Zdraveite $user dobre doshli! <br/>";
					echo '<a href="logout.php">Izhod</a><br/>';
				}
			}
		}
	?>
</body>
</html>