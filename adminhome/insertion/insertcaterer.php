<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$caterer_name =$_POST["caterer_name"];
$caterer_office_address =$_POST["caterer_office_address"];
$caterer_cost_per_plate =$_POST["caterer_cost_per_plate"];
$caterer_rating =$_POST["caterer_rating"];



$sql = "INSERT INTO caterer(caterer_name,caterer_office_address,caterer_cost_per_plate,caterer_rating) VALUES ( '$caterer_name', '$caterer_office_address','$caterer_cost_per_plate','$caterer_rating')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:insertcaterer.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}


$conn->close();
?>