<html>

	<head>
		<link href="style_home.css" rel="stylesheet">
	</head>
	<meta charset="utf-8">
	
	<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
	<script type="text/javascript">
				$(document).ready(function(){  
			  $("#Search").click(function(){
				var sect_id=$("#sector").val();
				var city_id=$("#city").val();
				if (sect_id==0 && city_id==0) {
					 $("#box").html("<p>Няма записи</p>");
				} else
				   $("#box").load("show.php?city_id="+city_id+"&sect_id="+sect_id);
			  });	
			});
	</script>
	<body>
		<?php
			include 'menu.php';
		?>
		
		<div class="selectt">
			<select name="sector" id="sector">
				<option value="0" selected>Бизнес сектори</option>
					<?php
					include 'metier.php';
					$sqlQuery = 'SELECT * FROM sector';
					$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
					if($result) {		
						while ($sect = mysqli_fetch_array($result)) {
						echo '<option value="'.$sect['id'].'">' . $sect['sector'] . '</option>';
						}
					}                
					
					?>
			</select>
			
			<select name="city" id="city">
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
			
			<input type="button" id="Search" value ="Search" />
		</div>
		
		<div class="box-holder right" id="box">
		</div>
	</body>
</html>

