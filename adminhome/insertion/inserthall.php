<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$hall_name =$_POST["hall_name"];
$hall_location =$_POST["hall_location"];
$hall_area_sq_ft =$_POST["hall_area_sq_ft"];
$hall_capacity =$_POST["hall_capacity"];
$hall_rent =$_POST["hall_rent"];
$hall_rating =$_POST["hall_rating"];


$sql = "INSERT INTO hall(hall_name,hall_location,hall_area_sq_ft,hall_capacity,hall_rent,hall_rating) VALUES ( '$hall_name', '$hall_location','$hall_area_sq_ft','$hall_capacity','$hall_rent','$hall_rating')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:inserthall.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}


$conn->close();
?>