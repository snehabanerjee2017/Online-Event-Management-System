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
$hall_name =$_POST["hall_name"];
$hall_location =$_POST["hall_location"];
$hall_area_sq_ft =$_POST["hall_area_sq_ft"];
$hall_capacity =$_POST["hall_capacity"];
$hall_rent =$_POST["hall_rent"];
$hall_rating =$_POST["hall_rating"];


$sql_1="SELECT * FROM hall WHERE hall_id= '$hall_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['hall_name']))
	{
		$sql = "UPDATE hall
			SET hall_name='$hall_name'
			WHERE hall_id='$hall_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " hall_name Updated";
			}
			else
			{
				echo "hall_name Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "hall_name Updation not required";
	}
	if(!empty($_POST['hall_location']))
	{
		$sql = "UPDATE hall
			SET hall_location= '$hall_location'
			WHERE hall_id='$hall_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " hall_location Updated";
			}
			else
			{
				echo "hall_location Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "hall_location Updation not required";
	}
	if(!empty($_POST['hall_area_sq_ft']))
	{
		$sql = "UPDATE hall
			SET hall_area_sq_ft='$hall_area_sq_ft'
			WHERE hall_id='$hall_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " hall_area_sq_ft Updated";
			}
			else
			{
				echo "hall_area_sq_ft Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "hall_area_sq_ft Updation not required";
	}
	if(!empty($_POST['hall_capacity']))
	{
		$sql = "UPDATE hall
			SET hall_capacity='$hall_capacity'
			WHERE hall_id='$hall_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " hall_capacity Updated";
			}
			else
			{
				echo "hall_capacity Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "hall_capacity Updation not required";
	}
	if(!empty($_POST['hall_rent']))
	{
		$sql = "UPDATE hall
			SET hall_rent='$hall_rent'
			WHERE hall_id='$hall_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "hall_rent Updated";
			}
			else
			{
				echo "hall_rent Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "hall_rent Updation not required";
	}
	if(!empty($_POST['hall_rating']))
	{
		$sql = "UPDATE hall
			SET hall_rating='$hall_rating'
			WHERE hall_id='$hall_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " hall_rating Updated";
			}
			else
			{
				echo "hall_rating Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "hall_rating Updation not required";
	}
	
}
else
{
	echo "hall does not exists.";
}

header("Location:updatehall.html");

$conn->close();
?>