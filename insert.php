<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthday = $_POST['birthday'];
$age= $_POST['age'];
$username= $_POST['username'];
$password= $_POST['password'];
$cpassword= $_POST['cpassword'];
$email = $_POST['email'];
$phone= $_POST['phone'];

if(!empty($firstname) || !empty($lastname) || !empty($birthday) || !empty($age) || !empty($username) || !empty($password) || !empty($cpassword) || !empty($email) || !empty($phone))
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
else  {  echo "All fields are required.";
	die();
}
?>
