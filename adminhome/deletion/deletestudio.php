<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem"; 

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$studio_id =$_POST["studio_id"];

$sql_1="SELECT * FROM studio WHERE studio_id= '$studio_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	$sql = "DELETE FROM studio WHERE studio_id='$studio_id' ";
	if($conn->query($sql)===TRUE)
	{
		echo " studio deleted";
		header("Location:deletestudio.html");
	}
	else
	{
		echo " studio deletion failed". $conn->error;
	}
}
else
{
	echo "studio does not exists.";
	header("refresh:5; url=deletestudio.html");
}



$conn->close();


?>