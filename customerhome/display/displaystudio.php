<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/displaystudio_styles.css">
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

// Query 1: List of all studio

$sql = "SELECT * 
		FROM studio";
$result = $conn->query($sql);

if($result->num_rows > 0){

	echo "<table>
		<caption>STUDIO CATALOGUE</caption>
		<thead>
			<tr>
				<th scope='col'>Studio ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Office Address</th>
				<th scope='col'>Avg. Rate(in ₹)</th>
				<th scope='col'>Rating</th>
			</tr>
		</thead>
		<tbody>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {    
    	 echo "<tr>
    	 		<td>".$row["studio_id"]."</td>
    	 		<td>".$row["studio_name"]."</td>
    	 		<td>".$row["studio_office_address"]."</td>
    	 		<td>".$row["studio_average_rate"]."</td>
    	 		<td>".$row["studio_rating"]."</td>
    	 	</tr>";
	}
	echo "</tbody></table>";
}
else {
    echo "0 results";
}

$conn->close();

?>