<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/displaydecorator_styles.css">
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
		FROM decorator";
$result = $conn->query($sql);

if($result->num_rows > 0){

	echo "<table>
		<caption>DECORATOR CATALOGUE</caption>
		<thead>
			<tr>
				<th scope='col'>Decorator ID</th>
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
    	 			<td>".$row["decorator_id"]."</td>
    	 			<td>".$row["decorator_name"]."</td>
    	 			<td>".$row["decorator_office_address"]."</td>
    	 			<td>".$row["decorator_average_rate"]."</td>
    	 			<td>".$row["decorator_rating"]."</td>
    	 		</tr>";
	}
	echo "</tbody></table>";
}
else {
    echo "0 results";
}

$conn->close();

?>