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
$caterer_name =$_POST["caterer_name"];
$caterer_office_address =$_POST["caterer_office_address"];
$caterer_cost_per_plate =$_POST["caterer_cost_per_plate"];
$caterer_rating =$_POST["caterer_rating"];



$sql_1="SELECT * FROM caterer WHERE caterer_id= '$caterer_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['caterer_name']))
	{
		$sql = "UPDATE caterer
			SET caterer_name='$caterer_name'
			WHERE caterer_id='$caterer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "caterer_name Updated";
			}
			else
			{
				echo "caterer_name Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "caterer_name Updation not required";
	}
	if(!empty($_POST['caterer_office_address']))
	{
		$sql = "UPDATE caterer
			SET caterer_office_address= '$caterer_office_address'
			WHERE caterer_id='$caterer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "caterer_office_address Updated";
			}
			else
			{
				echo "caterer_office_address Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "caterer_office_address Updation not required";
	}
	if(!empty($_POST['caterer_cost_per_plate']))
	{
		$sql = "UPDATE caterer
			SET caterer_cost_per_plate='$caterer_cost_per_plate'
			WHERE caterer_id='$caterer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "caterer_cost_per_plate Updated";
			}
			else
			{
				echo "caterer_cost_per_plate Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "caterer_cost_per_plate Updation not required";
	}
	if(!empty($_POST['caterer_rating']))
	{
		$sql = "UPDATE caterer
			SET caterer_rating='$caterer_rating'
			WHERE caterer_id='$caterer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "caterer_rating Updated";
			}
			else
			{
				echo "caterer_rating Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "caterer_rating Updation not required";
	}
	
	
}
else
{
	echo "caterer does not exists.";
}

header("Location:updatecaterer.html");
$conn->close();
?>