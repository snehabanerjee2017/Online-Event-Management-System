<?php 
$servername = "localhost";
$username="root";
$password="";
$dbname = "onlineeventmanagementsystem";

$conn = new mysqli($servername, $username, $password,$dbname);

if($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}

$username =$_POST["username"];
$password =$_POST["password"];
$status =1;

$sql_1="SELECT type FROM registration WHERE username= '$username'";

$result=$conn->query($sql_1);
$row= mysqli_fetch_array($result);

$type = $row["type"];

$result=$conn->query($sql_1);


if ($result->num_rows>0)
{
	$sql = "INSERT INTO login VALUES ('$username', '$password', '$status', DEFAULT)";

	if($conn->query($sql)===TRUE)
	{
		echo "Inserted";
		if($type=='customer')
		{
			header("Location:customerhome.html");
		}
		else if($type=='admin')
		{
			header("Location:adminhome.html");
		}
		
	}
	else
	{
		echo " Not Inserted". $conn->error;
	}
}


else
{
	header("Location: register_prompt.html");
}


$conn->close();

?>