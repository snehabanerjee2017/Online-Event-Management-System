<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$decorator_name =$_POST["decorator_name"];
$decorator_office_address =$_POST["decorator_office_address"];
$decorator_average_rate =$_POST["decorator_average_rate"];
$decorator_rating =$_POST["decorator_rating"];



$sql = "INSERT INTO decorator(decorator_name,decorator_office_address,decorator_average_rate,decorator_rating) VALUES ( '$decorator_name', '$decorator_office_address','$decorator_average_rate','$decorator_rating')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:insertdecorator.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}


$conn->close();
?>