
<?php
	include 'metier.php';
	$city_id=$_GET["city_id"];
	$sect_id=$_GET["sect_id"];
	$sqlQuery= 'SELECT *,offers.id AS "offer_id" FROM offers INNER JOIN city ON city.id = offers.id_city INNER JOIN sector ON sector.id = offers.id_sector WHERE id_city='.$city_id.' AND id_sector='.$sect_id;
	session_start();

	$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));
	if($result) {
		if(!isset($_SESSION['username'])){
			echo "<table>
			<tr>
			<th>Име на фирмата</th>
			<th>Aдрес</th>
			<th>Град</th>
			<th>Позиция</th>
			<th>Условия</th>
			</tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>"; 
				echo "<td>" .$row['firmname']. "</td>"; 
				echo "<td>" .$row['address']. "</td>";
				echo "<td>" .$row['city']. "</td>";			
				echo "<td>" .$row["position"]. "</td>";
				echo "<td>" .$row["conditions"]. "</td>";
				echo "</tr>";
			} 
				echo "</table>";
		} else {
					echo "<table>
				<tr>
				<th>Име на фирмата</th>
				<th>Aдрес</th>
				<th>Град</th>
				<th>Позиция</th>
				<th>Условия</th>
				<th>Кандидатствай</th>
				</tr>";
				while ($row = mysqli_fetch_array($result)) {  
					echo "<tr>"; 
					echo "<td>" .$row['firmname']. "</td>"; 
					echo "<td>" .$row['address']. "</td>";
					echo "<td>" .$row['city']. "</td>";			
					echo "<td>" .$row["position"]. "</td>";
					echo "<td>" .$row["conditions"]. "</td>";
					echo "<td> <button class=\"apply\" data-id=\"".$row["offer_id"]."\">Apply</button> </td>";
					echo "</tr>";
				}
				echo "</table>"; 
			}   
		}   	
?>