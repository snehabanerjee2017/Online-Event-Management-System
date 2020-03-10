<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$decorator_id =$_POST["decorator_id"];

$sql_1="SELECT * FROM decorator WHERE decorator_id= '$decorator_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM decorator WHERE decorator_id='$decorator_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " decorator deleted";
		header("Location:deletedecorator.html");
	}
	else
	{
		echo " decorator deletion failed". $conn->error;
	}
}
else
{
	echo "decorator does not exists.";
	header("refresh:5; url=deletedecorator.html");
}



$conn->close();


?>