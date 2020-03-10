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

// List of all events of a customer

$sql="SELECT * FROM  login 
	ORDER BY login_time DESC LIMIT 1";

$result = $conn->query($sql);
if($result->num_rows > 0)
{
	while($row = mysqli_fetch_array($result)) 
	{
	    $customer_username=$row['username']; 
	}
}

$sql="SELECT * FROM  customer 
	WHERE customer_username= '$customer_username'";

$result = $conn->query($sql);
if($result->num_rows > 0)
{
	while($row = mysqli_fetch_array($result)) 
	{
	    $customer_id=$row['customer_id']; 
	}
}

$sql = "SELECT *
		FROM event
		WHERE customer_id= '$customer_id'";


$result = $conn->query($sql);

echo "<table>
		<caption>YOUR EVENTS</caption>
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
				<th scope='col'>Guests</th>
				<th scope='col'>Total Cost</th>
			</tr>
		</thead>
		<tbody>";

if($result->num_rows > 0){

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
    	 			<td>".$row["guests"]."</td>
    	 			<td>".$row["total_cost"]."</td>
    	 		</tr>";
	}
	
}

else {
    echo "0 results";
}

echo "</tbody></table>";

$conn->close();

?>