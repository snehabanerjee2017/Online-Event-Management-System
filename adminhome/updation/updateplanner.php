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
$planner_name =$_POST["planner_name"];
$planner_gender =$_POST["planner_gender"];
$planner_city =$_POST["planner_city"];
$planner_salary =$_POST["planner_salary"];
$planner_rating =$_POST["planner_rating"];



$sql_1="SELECT * FROM planner WHERE planner_id= '$planner_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['planner_name']))
	{
		$sql = "UPDATE planner
			SET planner_name='$planner_name'
			WHERE planner_id='$planner_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " planner_name Updated";
			}
			else
			{
				echo "planner_name Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "planner_name Updation not required";
	}
	if(!empty($_POST['planner_gender']))
	{
		$sql = "UPDATE planner
			SET planner_gender= '$planner_gender'
			WHERE planner_id='$planner_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " planner_gender Updated";
			}
			else
			{
				echo "planner_gender Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "planner_gender Updation not required";
	}
	if(!empty($_POST['planner_city']))
	{
		$sql = "UPDATE planner
			SET planner_city='$planner_city'
			WHERE planner_id='$planner_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " planner_city Updated";
			}
			else
			{
				echo "planner_city Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "planner_city Updation not required";
	}
	if(!empty($_POST['planner_salary']))
	{
		$sql = "UPDATE planner
			SET planner_salary='$planner_salary'
			WHERE planner_id='$planner_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " planner_salary Updated";
			}
			else
			{
				echo "planner_salary Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "planner_salary Updation not required";
	}
	if(!empty($_POST['planner_rating']))
	{
		$sql = "UPDATE planner
			SET planner_rating='$planner_rating'
			WHERE planner_id='$planner_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " planner_rating Updated";
			}
			else
			{
				echo "planner_rating Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "planner_rating Updation not required";
	}
	
}
else
{
	echo "planner does not exists.";
}

header("Location:updateplanner.html");

$conn->close();
?>