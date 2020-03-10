<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$caterer_id =$_POST["caterer_id"];

$sql_1="SELECT * FROM caterer WHERE caterer_id= '$caterer_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM caterer WHERE caterer_id='$caterer_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " caterer deleted";
		header("Location:deletecaterer.html");
	}
	else
	{
		echo " caterer deletion failed". $conn->error;
	}
}
else
{
	echo "caterer does not exists.";
	header("refresh:5; url=deletecaterer.html");
}



$conn->close();


?>