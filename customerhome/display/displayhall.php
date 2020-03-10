<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href="css/displayhall_styles.css">
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
		FROM hall";
$result = $conn->query($sql);

if($result->num_rows > 0){

	echo "<table>
			<caption>BANQUET HALL CATALOGUE</caption>
			<thead>
			<tr>
				<th scope='col'>Hall ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Location</th>
				<th scope='col'>Area(sq ft)</th>
				<th scope='col'>Capacity</th>
				<th scope='col'>Rent(in ₹)</th>
				<th scope='col'>Rating</th>
			</tr>
		</thead>
		<tbody>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {    
    	 echo "<tr>
    	 			<td>".$row["hall_id"]."</td>
    	 			<td>".$row["hall_name"]."</td>
    	 			<td>".$row["hall_location"]."</td>
    	 			<td>".$row["hall_area_sq_ft"]."</td>
    	 			<td>".$row["hall_capacity"]."</td>
    	 			<td>".$row["hall_rent"]."</td>
    	 			<td>".$row["hall_rating"]."</td>
    	 		</tr>";
	}
	echo "</tbody></table>";
}
else {
    echo "0 results";
}

$conn->close();

?>