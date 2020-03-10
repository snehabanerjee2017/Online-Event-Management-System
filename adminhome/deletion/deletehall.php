<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$hall_id =$_POST["hall_id"];

$sql_1="SELECT * FROM hall WHERE hall_id= '$hall_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM hall WHERE hall_id='$hall_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " hall deleted";
		header("Location:deletehall.html");
	}
	else
	{
		echo " hall deletion failed". $conn->error;
	}
}
else
{
	echo "hall does not exist.";
	header("refresh:5; url=deletehall.html");
}



$conn->close();


?>