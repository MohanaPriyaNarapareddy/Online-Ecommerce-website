<?php
$name=$_POST['name'];
$uname=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['repeatpassword'];
$street=$_POST['street'];
$appt=$_POST['appt'];
$city=$_POST['city'];
$state=$_POST['state'];
$pin=$_POST['pin'];
$contact=$_POST['contact'];
$addressid = "";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$conn=mysqli_connect("localhost","root","root","craigslist",3306);
	if(!$conn)
	{
		die("Failed to connect to MySQL: " . mysqli_connect_error());
	}
	#store user details in db
	#redirect user to signin.html page
	else
	{
		$insert_address = "INSERT INTO `address` (`addressID`, `street`, `apt`, `cityID`, `stateID`) VALUES (NULL, '$street', '$appt', '$city', '$state');";
		$result = mysqli_query( $conn, $insert_address);
		
		$select_userid = "SELECT addressID from address where street='$street' AND apt='$appt' AND cityID='$city' AND stateID='$state';";
		$result = mysqli_query( $conn, $select_userid);
		while($row = $result->fetch_assoc())
		{
			$addressid = $row["addressID"];
		}
		
		$insert_user = "INSERT INTO `user` (`name`,`username`,`emailid`,`password`,`addressID`,`contact`,`usertypeID`) values('$name','$uname','$email','$password','$addressid','$contact','2');";
		$result = mysqli_query( $conn, $insert_user);
		
		mysqli_close($conn);
	}
	

}

	header('Location: http://localhost/craiglist/homepage.php');
	exit();
?>