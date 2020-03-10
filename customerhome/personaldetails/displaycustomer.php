<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/displaycustomer_styles.css">
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
		FROM customer
		WHERE customer_id= '$customer_id'";


$result = $conn->query($sql);

if($result->num_rows > 0){

	echo "<table>
		<caption>PERSONAL DETAILS</caption>
		<thead>
			<tr>
				<th scope='col'>Customer ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Phone Number</th>
				<th scope='col'>Email</th>
				<th scope='col'>City</th>
				<th scope='col'>Username</th>
			</tr>
		</thead>
		<tbody>";
	// Process all rows
	while($row = mysqli_fetch_array($result)) {    
    	 echo "<tr>
    	 		<td>".$row["customer_id"]."</td>
    	 		<td>".$row["customer_name"]."</td>
    	 		<td>".$row["customer_phone_number"]."</td>
    	 		<td>".$row["customer_email"]."</td>
    	 		<td>".$row["customer_city"]."</td>
    	 		<td>".$row["customer_username"]."</td>
    	 	</tr>";
	}
	echo "</tbody></table>";
}
else {
    echo "0 results";
}

$conn->close();

?>


