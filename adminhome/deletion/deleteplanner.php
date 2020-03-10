<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$planner_id =$_POST["planner_id"];

$sql_1="SELECT * FROM planner WHERE planner_id= '$planner_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM planner WHERE planner_id='$planner_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " planner deleted";
		header("Location:deleteplanner.html");
	}
	else
	{
		echo " planner deletion failed". $conn->error;
	}
}
else
{
	echo "planner does not exists.";
	header("refresh:5; url=deleteplanner.html");
}



$conn->close();


?>