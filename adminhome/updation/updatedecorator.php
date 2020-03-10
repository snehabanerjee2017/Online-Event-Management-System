<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$decorator_id=$_POST["decorator_id"];
$decorator_name =$_POST["decorator_name"];
$decorator_office_address =$_POST["decorator_office_address"];
$decorator_average_rate =$_POST["decorator_average_rate"];
$decorator_rating =$_POST["decorator_rating"];



$sql_1="SELECT * FROM decorator WHERE decorator_id= '$decorator_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['decorator_name']))
	{
		$sql = "UPDATE decorator
			SET decorator_name='$decorator_name'
			WHERE decorator_id='$decorator_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " decorator_name Updated";
			}
			else
			{
				echo "decorator_name Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "decorator_name Updation not required";
	}
	if(!empty($_POST['decorator_office_address']))
	{
		$sql = "UPDATE decorator
			SET decorator_office_address= '$decorator_office_address'
			WHERE decorator_id='$decorator_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "decorator_office_address Updated";
			}
			else
			{
				echo "decorator_office_address Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "decorator_office_address Updation not required";
	}
	if(!empty($_POST['decorator_average_rate']))
	{
		$sql = "UPDATE decorator
			SET decorator_average_rate='$decorator_average_rate'
			WHERE decorator_id='$decorator_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "decorator_average_rate Updated";
			}
			else
			{
				echo "decorator_average_rate Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "decorator_average_rate Updation not required";
	}
	if(!empty($_POST['decorator_rating']))
	{
		$sql = "UPDATE decorator
			SET decorator_rating='$decorator_rating'
			WHERE decorator_id='$decorator_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "decorator_rating Updated";
			}
			else
			{
				echo "decorator_rating Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "decorator_rating Updation not required";
	}
	
	
}
else
{
	echo "decorator does not exists.";
}

header("Location:updatedecorator.html");
$conn->close();
?>