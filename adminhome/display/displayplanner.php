<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/displayplanner_styles.css">
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
		FROM planner";
$result = $conn->query($sql);

if($result->num_rows > 0){

	echo "<table>
			<caption>PLANNER CATALOGUE</caption>
			<thead>
			<tr>
				<th scope='col'>Planner ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Gender</th>
				<th scope='col'>City</th>
				<th scope='col'>Salary(in ₹)</th>
				<th scope='col'>Rating</th>
			</tr>
		</thead>
		<tbody>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {    
    	echo "<tr>
    	 		<td>".$row["planner_id"]."</td>
    	 		<td>".$row["planner_name"]."</td>
    	 		<td>".$row["planner_gender"]."</td>
    	 		<td>".$row["planner_city"]."</td>
    	 		<td>".$row["planner_salary"]."</td>
    	 		<td>".$row["planner_rating"]."</td>
    	 	</tr>";
	}
	echo "</tbody></table>";
}
else {
    echo "0 results";
}

$conn->close();

?>