<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthday = $_POST['birthday'];
$age= $_POST['age'];
$username= $_POST['username'];
$password= $_POST['password'];
$cpassword= $_POST['cpassword'];


if(!empty($username) || !empty($password) || !empty($cpassword))
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

	{     $SELECT = "SELECT username from register where username= '$username' Limit 1";
            $INSERT = "INSERT into register(username, password) values( '$username' ,'$password') ";
		$result1=mysqli_query($conn,$SELECT);
		if(mysqli_num_rows($result1)==0)
		{
			if (mysqli_query($conn, $INSERT)) {
				include 'home.html';
			  } else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			  }
		}

	else { 
		// include 'home.html?status=1';
		echo "Username Exists";
	}
	
	}
}
		// {       $stmt->close();
		// 	$stmt = $conn->prepare($INSERT);
		// $stmt->bind_param("sssissssi", $firstname, $lastname, $birthday, $age, $username, $password, $cpassword, $email, $phone);
		// 	$stmt->execute();
		// 	header("location:login.php"); }
		 
else  {  echo "All fields are required.";
	die();
}
?>