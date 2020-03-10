<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$event_id =$_POST["event_id"];

$sql_1="SELECT * FROM event WHERE event_id= '$event_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM event WHERE event_id='$event_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " event deleted";
		header("Location:viewevent.php");
	}
	else
	{
		echo " event deletion failed". $conn->error;
	}
}
else
{
	echo "event does not exists.";
	header("refresh:5; url=viewevent.php");
}



$conn->close();


?>