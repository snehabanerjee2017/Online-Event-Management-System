<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}


$customer_phone_number =$_POST["customer_phone_number"];
$customer_email =$_POST["customer_email"];
$customer_city =$_POST["customer_city"];

$sql="SELECT * FROM  registration 
	ORDER BY reg_time DESC LIMIT 1";

$result = $conn->query($sql);
if($result->num_rows > 0)
{
	while($row = mysqli_fetch_array($result)) 
	{
	    $customer_username=$row['username']; 
	    $customer_name =$row['name'];
	}
}




$sql = "INSERT INTO customer(customer_name,customer_phone_number,customer_email,customer_city,customer_username) VALUES ( '$customer_name', '$customer_phone_number','$customer_email','$customer_city', '$customer_username')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:login.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}


$conn->close();
?>