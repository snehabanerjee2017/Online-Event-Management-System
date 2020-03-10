<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname );

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$event_id =$_POST["event_id"];
$event_date =$_POST["event_date"];
$event_time =$_POST["event_time"];
$hall_id=$_POST["hall_id"];
$caterer_id =$_POST["caterer_id"];
$studio_id =$_POST["studio_id"];
$decorator_id =$_POST["decorator_id"];
$planner_id =$_POST["planner_id"];
$event_type =$_POST["event_type"];
$guests =$_POST["guests"];



$sql1="SELECT * FROM  login 
	ORDER BY login_time DESC LIMIT 1";

$result = $conn->query($sql1);
if($result->num_rows > 0)
{
	while($row = mysqli_fetch_array($result)) 
	{
	    $customer_username=$row['username']; 
	}
}

$sql2="SELECT * FROM  customer 
	WHERE customer_username= '$customer_username'";

$result = $conn->query($sql2);
if($result->num_rows > 0)
{
	while($row = mysqli_fetch_array($result)) 
	{
	    $customer_id=$row['customer_id']; 
	}
}

$sql3= "SELECT total_cost
			FROM event
			WHERE event_id='$event_id' ";
$result = $conn->query($sql3);
if($result->num_rows > 0)
{
	while($row = mysqli_fetch_array($result)) 
	{
	    $total_cost= $row['total_cost']; 
	}
}

if(!empty($_POST['hall_id']))
{
	$sql4 = "SELECT hall_id
			FROM event
			WHERE event_id='$event_id' ";
		$result = $conn->query($sql4);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $prev_hall_id= $row['hall_id']; 
			}
		}
	$sql5 = "SELECT hall_rent 
			FROM hall
			WHERE hall_id='$prev_hall_id' ";
		$result = $conn->query($sql5);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $total_cost= $total_cost-$row['hall_rent']; 
			}
		}
	$sql6 = "SELECT hall_rent 
			FROM hall
			WHERE hall_id='$hall_id' ";
		$result = $conn->query($sql6);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $total_cost= $total_cost+$row['hall_rent']; 
			}
		}
	$sql7 = "UPDATE event
			SET hall_id='$hall_id'
			WHERE event_id='$event_id' ";
			if($conn->query($sql7)===TRUE)
			{
				echo "hall_id Updated";
			}
			else
			{
				echo "hall_id Updation failed". $conn->error;
			}

	$sql8 = "UPDATE event
			SET total_cost='$total_cost'
			WHERE event_id='$event_id' ";
			if($conn->query($sql8)===TRUE)
			{
				echo "total_cost Updated";
			}
			else
			{
				echo "total_cost Updation failed". $conn->error;
			}		
}
else
{
	echo "hall_id, total_cost updation not required";
}

if(!empty($_POST['caterer_id']))
{
	$sql9 = "SELECT * 
			FROM event
			WHERE event_id='$event_id' ";
		$result = $conn->query($sql9);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $prev_caterer_id= $row['caterer_id'];
			    $prev_guests= $row['guests'];
			}
		}

	$sql10 = "SELECT caterer_cost_per_plate 
			FROM caterer
			WHERE caterer_id='$prev_caterer_id' ";
		$result = $conn->query($sql10);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $total_cost= $total_cost-($row['caterer_cost_per_plate']*$prev_guests); 
			    echo "Total cost reduced<br>";
			}
		}

	$sql11 = "SELECT caterer_cost_per_plate 
			FROM caterer
			WHERE caterer_id='$caterer_id' ";
		$result = $conn->query($sql11);
		if($result->num_rows > 0)
		{
			$row1 = mysqli_fetch_array($result);
			if(!empty($_POST['guests']))
				{
					$total_cost= $total_cost+($row1['caterer_cost_per_plate']*$guests); 
					echo "Total cost increased for changed number of guests<br>";
				}
				else
				{
					$total_cost= $total_cost+($row1['caterer_cost_per_plate']*$prev_guests);
					echo "Total cost increased for previous number of guests<br>";
				}
		}
	
	
	$sql12 = "UPDATE event
			SET caterer_id='$caterer_id'
			WHERE event_id='$event_id' ";
			if($conn->query($sql12)===TRUE)
			{
				echo "caterer_id Updated";
			}
			else
			{
				echo "caterer_id Updation failed". $conn->error;
			}

	$sql13 = "UPDATE event
			SET total_cost='$total_cost'
			WHERE event_id='$event_id' ";
			if($conn->query($sql13)===TRUE)
			{
				echo "total_cost Updated";
			}
			else
			{
				echo "total_cost Updation failed". $conn->error;
			}
	if(!empty($_POST['guests']))
	{
		$sql14 = "UPDATE event
			SET guests = '$guests'
			WHERE event_id = '$event_id'";	

			if($conn->query($sql14)===TRUE)
			{
				echo "guests Updated";
			}
			else
			{
				echo "guests Updation failed". $conn->error;
			}
	}
	
		
}
else if(!empty($_POST['guests']) && empty($_POST['caterer_id'])) {
	$sql9 = "SELECT * 
			FROM event
			WHERE event_id='$event_id' ";
		$result = $conn->query($sql9);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $prev_caterer_id= $row['caterer_id'];
			    $prev_guests= $row['guests'];
			}
		}

	$sql10 = "SELECT caterer_cost_per_plate 
			FROM caterer
			WHERE caterer_id='$prev_caterer_id' ";
		$result = $conn->query($sql10);
		if($result->num_rows > 0)
		{
			$row = mysqli_fetch_array($result);
			$total_cost= $total_cost-($row['caterer_cost_per_plate']*$prev_guests); 
			$total_cost = $total_cost + ($row['caterer_cost_per_plate']*$guests);
		}

		

		$sql13 = "UPDATE event
			SET total_cost='$total_cost'
			WHERE event_id='$event_id' ";
			if($conn->query($sql13)===TRUE)
			{
				echo "total_cost Updated";
			}
			else
			{
				echo "total_cost Updation failed". $conn->error;
			}
		$sql14 = "UPDATE event
			SET guests = '$guests'
			WHERE event_id = '$event_id'";	

			if($conn->query($sql14)===TRUE)
			{
				echo "guests Updated";
			}
			else
			{
				echo "guests Updation failed". $conn->error;
			}
}
else
{
	echo "caterer_id/guests total_cost updation not required";
}

if(!empty($_POST['studio_id']))
{
	$sql = "SELECT studio_id 
			FROM event
			WHERE event_id='$event_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $prev_studio_id= $row['studio_id']; 
			}
		}
	$sql = "SELECT studio_average_rate 
			FROM studio
			WHERE studio_id='$prev_studio_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $total_cost= $total_cost-$row['studio_average_rate']; 
			}
		}
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
	$sql = "UPDATE event
			SET studio_id='$studio_id'
			WHERE event_id='$event_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "studio_id Updated";
			}
			else
			{
				echo "studio_id Updation failed". $conn->error;
			}

	$sql = "UPDATE event
			SET total_cost='$total_cost'
			WHERE event_id='$event_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "total_cost Updated";
			}
			else
			{
				echo "total_cost Updation failed". $conn->error;
			}
		
}

else
{
	echo "studio_id, total_cost updation not required";
}


if(!empty($_POST['decorator_id']))
{
	$sql = "SELECT decorator_id 
			FROM event
			WHERE event_id='$event_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $prev_decorator_id= $row['decorator_id']; 
			}
		}
	$sql = "SELECT decorator_average_rate 
			FROM decorator
			WHERE decorator_id='$prev_decorator_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $total_cost= $total_cost-$row['decorator_average_rate']; 
			}
		}
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
	$sql = "UPDATE event
			SET decorator_id='$decorator_id'
			WHERE event_id='$event_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "decorator_id Updated";
			}
			else
			{
				echo "decorator_id Updation failed". $conn->error;
			}

	$sql = "UPDATE event
			SET total_cost='$total_cost'
			WHERE event_id='$event_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "total_cost Updated";
			}
			else
			{
				echo "total_cost Updation failed". $conn->error;
			}
		
}

else
{
	echo "decorator_id, total_cost updation not required";
}

if(!empty($_POST['planner_id']))
{
	$sql = "SELECT planner_id 
			FROM event
			WHERE event_id='$event_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $prev_planner_id= $row['planner_id']; 
			}
		}
	$sql = "SELECT planner_salary 
			FROM planner
			WHERE planner_id='$prev_planner_id' ";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			while($row = mysqli_fetch_array($result)) 
			{
			    $total_cost= $total_cost-$row['planner_salary']; 
			}
		}
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
	$sql = "UPDATE event
			SET planner_id='$planner_id'
			WHERE event_id='$event_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "planner_id Updated";
			}
			else
			{
				echo "planner_id Updation failed". $conn->error;
			}

	$sql = "UPDATE event
			SET total_cost='$total_cost'
			WHERE event_id='$event_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "total_cost Updated";
			}
			else
			{
				echo "total_cost Updation failed". $conn->error;
			}
		
}

else
{
	echo "planner_id, total_cost updation not required";
}

if(!empty($_POST['event_type']))
{
	$sql = "UPDATE event
			SET event_type='$event_type'
			WHERE event_id='$event_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "event_type Updated";
			}
			else
			{
				echo "event_type Updation failed". $conn->error;
			}
		
}

else
{
	echo "event_type updation not required";
}

if(!empty($_POST['event_date']))
{
	$sql = "UPDATE event
			SET event_date='$event_date'
			WHERE event_id='$event_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "event_date Updated";
			}
			else
			{
				echo "event_date Updation failed". $conn->error;
			}
		
}

else
{
	echo "event_date updation not required";
}

if(!empty($_POST['event_time']))
{
	$sql = "UPDATE event
			SET event_time='$event_time'
			WHERE event_id='$event_id' ";
			if($conn->query($sql)===TRUE)
			{
				echo "event_time Updated";
			}
			else
			{
				echo "event_time Updation failed". $conn->error;
			}
		
}

else
{
	echo "event_time updation not required";
}


header("Location:viewevent.php");


$conn->close();
?>