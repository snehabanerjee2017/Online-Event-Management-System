<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$customer_name =$_POST["customer_name"];
$customer_phone_number =$_POST["customer_phone_number"];
$customer_email =$_POST["customer_email"];
$customer_city =$_POST["customer_city"];

$sql="SELECT * FROM  registration 
	ORDER BY reg_time DESC LIMIT 1";

$result = $conn->query($sql);
if($result->num_rows > 0)
{
	while($row = mysqli_fetch_array($result)) 
	{
	    $customer_username=$row['username']; 
	}
}

$sql="SELECT * FROM  customer 
	WHERE customer_username= '$customer_username'";

$result = $conn->query($sql);
if($result->num_rows > 0)
{
	while($row = mysqli_fetch_array($result)) 
	{
	    $customer_id=$row['customer_id']; 
	}

	if(!empty($_POST['customer_name']))
	{
		$sql = "UPDATE customer
			SET customer_name='$customer_name'
			WHERE customer_id='$customer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "customer_name Updated";
			}
			else
			{
				echo "customer_name Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "customer_name Updation not required";
	}
	if(!empty($_POST['customer_phone_number']))
	{
		$sql = "UPDATE customer
			SET customer_phone_number= '$customer_phone_number'
			WHERE customer_id='$customer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "customer_phone_number Updated";
			}
			else
			{
				echo "customer_phone_number Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "customer_phone_number Updation not required";
	}
	if(!empty($_POST['customer_email']))
	{
		$sql = "UPDATE customer
			SET customer_email='$customer_email'
			WHERE customer_id='$customer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "customer_email Updated";
			}
			else
			{
				echo "customer_email Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "customer_email Updation not required";
	}
	if(!empty($_POST['customer_city']))
	{
		$sql = "UPDATE customer
			SET customer_city='$customer_city'
			WHERE customer_id='$customer_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "customer_city Updated";
			}
			else
			{
				echo "customer_city Updation failed". $conn->error;
			}
			
	}
	else
	{
		echo "customer_city Updation not required";
	}
	header("Location:displaycustomer.php");
}
else{
	echo "Customer does not exist".$conn->error;
}


$conn->close();
?>