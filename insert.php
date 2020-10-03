<?php
$username= $_POST['username'];
$password= $_POST['password'];

if(!empty($username) || !empty($password))
{
	$host = "localhost";
	$dbUsername = "root" ;
	$dbPassword = "" ;
	$dbname = "signup page" ;
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if(mysqli_connect_error())
	{
die('Connection error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else
{	$SELECT = "SELECT username from register where username=? Limit 1";

		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$stmt->bind_result($username);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if($rnum==1)
		{
			header("location:home.php");
			//echo "Login successfully";
		}
		else
			{   header("location:register.php");
			    //echo "Login failed, username does not exists.";
	}
		$stmt->close(); $conn->close();
	}
}
else
{
	echo "All fields are required.";
	die();
}
?>
