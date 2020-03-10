<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname= "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$name =$_POST["name"];
$username =$_POST["username"];
$pw =$_POST["pw"];
$password =$_POST["confirm_pw"];
$type =$_POST["type"];


if($pw!=$password)
{
	echo "Password mismatch with confirm password.";
	header("refresh:2; url=registration.html");
}
else
{
	$sql = "INSERT INTO registration(name,username,password,type,reg_time) VALUES ( '$name',  '$username', '$password', '$type', DEFAULT)";

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		if($type=='customer')
		{
			echo "Insert customer details";
			header("Location:insertcustomer.html");
		}
		else
		{
			header("Location:login.html");
		}
		
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


$conn->close();


?>