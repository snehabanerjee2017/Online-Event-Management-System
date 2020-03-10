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
$studio_name =$_POST["studio_name"];
$studio_office_address =$_POST["studio_office_address"];
$studio_average_rate =$_POST["studio_average_rate"];
$studio_rating =$_POST["studio_rating"];



$sql_1="SELECT * FROM studio WHERE studio_id= '$studio_id'";

$result=$conn->query($sql_1);

if ($result->num_rows>0)
{
	if(!empty($_POST['studio_name']))
	{
		$sql = "UPDATE studio
			SET studio_name='$studio_name'
			WHERE studio_id='$studio_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " studio_name Updated";
			}
			else
			{
				echo "studio_name Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "studio_name Updation not required";
	}
	if(!empty($_POST['studio_office_address']))
	{
		$sql = "UPDATE studio
			SET studio_office_address= '$studio_office_address'
			WHERE studio_id='$studio_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " studio_office_address Updated";
			}
			else
			{
				echo "studio_office_address Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "studio_office_address Updation not required";
	}
	if(!empty($_POST['studio_average_rate']))
	{
		$sql = "UPDATE studio
			SET studio_average_rate='$studio_average_rate'
			WHERE studio_id='$studio_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " studio_average_rate Updated";
			}
			else
			{
				echo "studio_average_rate Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "studio_average_rate Updation not required";
	}
	if(!empty($_POST['studio_rating']))
	{
		$sql = "UPDATE studio
			SET studio_rating='$studio_rating'
			WHERE studio_id='$studio_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo " studio_rating Updated";
			}
			else
			{
				echo "studio_rating Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "studio_rating Updation not required";
	}
	
}
else
{
	echo "studio does not exists.";
}

header("Location:updatestudio.html");
$conn->close();
?>