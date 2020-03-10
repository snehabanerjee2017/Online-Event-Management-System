<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/displayevent_styles.css">
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

// Query 1: List of all events

$sql = "SELECT * 
		FROM event";
$result = $conn->query($sql);

if($result->num_rows > 0){

	echo "<table>
		<caption>LIST OF EVENTS</caption>
		<thead>
			<tr>
				<th scope='col'>Event ID</th>
				<th scope='col'>Customer ID</th>
				<th scope='col'>Event Type</th>
				<th scope='col'>Date</th>
				<th scope='col'>Time</th>
				<th scope='col'>Hall ID</th>
				<th scope='col'>Caterer ID</th>
				<th scope='col'>Decorator ID</th>
				<th scope='col'>Studio ID</th>
				<th scope='col'>Planner ID</th>
				<th scope='col'>Total Cost</th>
			</tr>
		</thead>
		<tbody>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {    
    	 echo "<tr>
    	 			<td>".$row["event_id"]."</td>
    	 			<td>".$row["customer_id"]."</td>
    	 			<td>".$row["event_type"]."</td>
    	 			<td>".$row["event_date"]."</td>
    	 			<td>".$row["event_time"]."</td>
    	 			<td>".$row["hall_id"]."</td>
    	 			<td>".$row["caterer_id"]."</td>
    	 			<td>".$row["decorator_id"]."</td>    	 			
    	 			<td>".$row["studio_id"]."</td>
    	 			<td>".$row["planner_id"]."</td>
    	 			<td>".$row["total_cost"]."</td>
    	 		</tr>";
	}
	echo "</tbody></table>";
}
else {
    echo "0 results";
}

$conn->close();

?>