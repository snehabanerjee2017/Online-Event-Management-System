<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$event_date =$_POST["event_date"];
$event_time =$_POST["event_time"];
$hall_id=$_POST["hall_id"];
$caterer_id =$_POST["caterer_id"];
$studio_id =$_POST["studio_id"];
$decorator_id =$_POST["decorator_id"];
$planner_id =$_POST["planner_id"];
$total_cost=0;
$event_type ="cultural";
$guests=$_POST["guests"];



$sql="SELECT * FROM  login 
	ORDER BY login_time DESC LIMIT 1";

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
}

if(!empty($_POST['hall_id']))
{
	$sql = "SELECT hall_rent 
			FROM hall
			WHERE hall_id='$hall_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $total_cost= $total_cost+$row['hall_rent']; 
			}
		}
		
}

if(!empty($_POST['caterer_id']))
{
	$sql = "SELECT caterer_cost_per_plate 
			FROM caterer
			WHERE caterer_id='$caterer_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $caterer_cost =$row['caterer_cost_per_plate']*$guests;
			    $total_cost= $total_cost+$caterer_cost; 
			}
		}
		
}

if(!empty($_POST['studio_id']))
{
	$sql = "SELECT studio_average_rate 
			FROM studio
			WHERE studio_id='$studio_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $total_cost= $total_cost+$row['studio_average_rate']; 
			}
		}
		
}

if(!empty($_POST['decorator_id']))
{
	$sql = "SELECT decorator_average_rate 
			FROM decorator
			WHERE decorator_id='$decorator_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $total_cost= $total_cost+$row['decorator_average_rate']; 
			}
		}
		
}

if(!empty($_POST['planner_id']))
{
	$sql = "SELECT planner_salary 
			FROM planner
			WHERE planner_id='$planner_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $total_cost= $total_cost+$row['planner_salary']; 
			}
		}
		
}


$sql = "INSERT INTO event(customer_id,event_date,event_time,hall_id,caterer_id, decorator_id,studio_id, planner_id,total_cost,event_type,guests) VALUES ( '$customer_id', '$event_date','$event_time','$hall_id', '$caterer_id', '$decorator_id','$studio_id',  '$planner_id', '$total_cost', '$event_type', '$guests')";

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		header("Location:../manageevent/viewevent.php");
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}


$conn->close();
?>