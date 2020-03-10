<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$planner_name =$_POST["planner_name"];
$planner_gender =$_POST["planner_gender"];
$planner_city =$_POST["planner_city"];
$planner_salary =$_POST["planner_salary"];
$planner_rating =$_POST["planner_rating"];



$sql = "INSERT INTO planner(planner_name,planner_gender,planner_city,planner_salary,planner_rating) VALUES ( '$planner_name', '$planner_gender','$planner_city','$planner_salary', '$planner_rating')";
	

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:insertplanner.html");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}


$conn->close();
?>