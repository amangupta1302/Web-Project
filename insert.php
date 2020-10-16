<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthday = $_POST['birthday'];
$age= $_POST['age'];
$username= $_POST['username'];
$password= $_POST['password'];
$cpassword= $_POST['cpassword'];
<<<<<<< HEAD


if(!empty($username) || !empty($password) || !empty($cpassword))
=======
$email = $_POST['email'];
$phone= $_POST['phone'];

if(!empty($firstname) || !empty($lastname) || !empty($birthday) || !empty($age) || !empty($username) || !empty($password) || !empty($cpassword) || !empty($email) || !empty($phone))
>>>>>>> 882e910adbd8a38c3cc8846f45db20db9591f280
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
<<<<<<< HEAD

	{     $SELECT = "SELECT username from register where username= '$username' Limit 1";
            $INSERT = "INSERT into register(username, password) values( '$username' ,'$password') ";
		$result1=mysqli_query($conn,$SELECT);
		if(mysqli_num_rows($result1)==0)
		{
			if (mysqli_query($conn, $INSERT)) {
				echo "New User Registered";
			  } else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			  }
		}

	else { echo "Username already exists";}
	
	}
}
		// {       $stmt->close();
		// 	$stmt = $conn->prepare($INSERT);
		// $stmt->bind_param("sssissssi", $firstname, $lastname, $birthday, $age, $username, $password, $cpassword, $email, $phone);
		// 	$stmt->execute();
		// 	header("location:login.php"); }
		 
=======
	{     $SELECT = "SELECT email from register where email=? Limit 1";
            $INSERT = "INSERT into register(firstname, lastname, birthday, age, username, password, cpassword, email, phone) values(?,?,?,?,?,?,?,?,?) ";

		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

		if($rnum==0)
		{       $stmt->close();
			$stmt = $conn->prepare($INSERT);
		$stmt->bind_param("sssissssi", $firstname, $lastname, $birthday, $age, $username, $password, $cpassword, $email, $phone);
			$stmt->execute();
			header("location:login.php"); }
		
else { echo "Email id already registered, try again using another email.";}
		$stmt->close(); $conn->close();
	}
} 
>>>>>>> 882e910adbd8a38c3cc8846f45db20db9591f280
else  {  echo "All fields are required.";
	die();
}
?>