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
			  
			  	$(document).on("click",".apply",function(){
					$.get("apply.php?offer_id="+$(this).data('id'));
				});
				
				$("#Show").click(function(){
				$("#hiden").fadeIn("fast");
				});
				
				$("#Show").dblclick(function() {
				$("#hiden").hide("fast");
				});
			});
	</script>
	</head>
	<body>
		<?php
			include 'menu.php';
		?>

		<div class="selectt">
			<select name="sector" id="sector">
				<option value="0" selected>Бизнес сектор</option>
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
			<input type="button" id="Show" value ="Show" />
		</div>
		
		<?php
			include 'metier.php';
			$sql= 'SELECT * FROM offers WHERE created_by = '.$_SESSION['userid'];
			$result = mysqli_query($link, $sql) or die(mysqli_error($link));
			$offer_ids=[];
			while($row = mysqli_fetch_array($result)) {
				$offer_ids[]= $row['id'];
			}
			if (count($offer_ids)>0) {
				$offer_ids= join(",",$offer_ids);
			$sql='SELECT *,user_id AS userid1 FROM applications INNER JOIN offers ON offers.id=offer_id INNER JOIN accounts ON accounts.id=user_id WHERE offers.id IN ('.$offer_ids. ')';
			$result=mysqli_query($link, $sql) or die(mysqli_error($link));
			echo '<div id="hiden" style="display: none">';
			echo "Applications to your offers: <br/><br/>";
			while ($row = mysqli_fetch_array($result)) {
				echo '<a target="_blank" href="Preview.php?id='.$row['userid1'].'">'.$row['name']."</a> has applied to ".$row['firmname']. "<br/>"; //
			}
			echo "</div>";
			}
		?>
		<div class="box-holder right" id="box">
		</div>
		</div>
	</body>
</html>

