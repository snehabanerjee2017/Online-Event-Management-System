<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/displaycaterer_styles.css">
</head>
<body>
<?php
	
$servername = "localhost";
$username="root";
$password="";
$dbname="onlineeventmanagementsystem";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

// Query 1: List of all caterers

$sql = "SELECT * 
		FROM caterer";
$result = $conn->query($sql);

if($result->num_rows > 0){

	echo "<table>
		<caption>CATERER CATALOGUE</caption>
		<thead>
			<tr>
				<th scope='col'>Caterer ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Office Address</th>
				<th scope='col'>Avg. Cost/Plate(in ₹)</th>
				<th scope='col'>Rating</th>
			</tr>
		</thead>
		<tbody>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {    
    	echo "<tr>
    	 		<td>".$row["caterer_id"]."</td>
    	 		<td>".$row["caterer_name"]."</td>
    	 		<td>".$row["caterer_office_address"]."</td>
    	 		<td>".$row["caterer_cost_per_plate"]."</td>
    	 		<td>".$row["caterer_rating"]."</td>
    	 	</tr>";
	}
	echo "</tbody></table>";
}
else {
    echo "0 results";
}

$conn->close();

?>