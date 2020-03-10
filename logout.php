<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$sql = "UPDATE login
		SET status=0
		WHERE login_time =( SELECT MAX(login_time)
						   FROM login
						   WHERE status=1)";
if($conn->query($sql)===TRUE)
{
	echo "Logged Out";
	header("Location:login.html");
}
else
{
	echo " Logout failed". $conn->error;
}
?>