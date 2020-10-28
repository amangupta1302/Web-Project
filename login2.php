<?php
$username= $_POST['username'];
$password= $_POST['password'];

if(!empty($username) || !empty($password))
{
	$host = "localhost";
	$dbUsername = "weblab" ;
	$dbPassword = "weblab" ;
	$dbname = "signup" ;
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if(mysqli_connect_error())
	{
die('Connection error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else
	{	
		$SELECT = "SELECT username from register where username= '$username' and password = '$password' Limit 1";
		$result1=mysqli_query($conn,$SELECT);
		if(mysqli_num_rows($result1)==0)
		{
			$status=4;
			include "home.html";
		}
		else{
			$status=3;
			include "home.html";
		}
	}
}
else
{
	echo "All fields are required.";
	die();
}
?>
