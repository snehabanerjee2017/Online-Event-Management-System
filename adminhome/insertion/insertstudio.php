<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$studio_name =$_POST["studio_name"];
$studio_office_address =$_POST["studio_office_address"];
$studio_average_rate =$_POST["studio_average_rate"];
$studio_rating =$_POST["studio_rating"];



$sql = "INSERT INTO studio(studio_name,studio_office_address,studio_average_rate,studio_rating) VALUES ( '$studio_name', '$studio_office_address','$studio_average_rate','$studio_rating')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:insertstudio.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}


$conn->close();
?>