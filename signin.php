<?php
session_start();
$uname=$_POST['username'];
$pass=$_POST['password'];

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$conn=mysqli_connect("localhost","root","root","craigslist",3306);
	if(!$conn)
	{
		die("Failed to connect to MySQL: " . mysqli_connect_error());
		header('Location: http://localhost/craiglist/forms/signin-up/signin_html.php');
		exit();
	}
	else
	{
		$query = "select password,userID,usertypeID from user where username='".$uname."';";
		$result = mysqli_query( $conn, $query);

		if(($row = $result->fetch_assoc()))
		{
			if($pass == $row["password"])
			{
				
				$_SESSION["username"]=$uname;
				if($row["usertypeID"]==1)
				{
					$_SESSION["userid"] = 0;
					$_SESSION["adminid"] = $row["userID"];				
				}
				else
				{
					$_SESSION["userid"] = $row["userID"];				
				}
				header('Location: http://localhost/craiglist/homepage.php');
				exit();
			}
			else
			{
				header('Location: http://localhost/craiglist/forms/signin-up/signin_html.php');
				exit();	
			}
		}
		
		else
		{
			header('Location: http://localhost/craiglist/forms/signin-up/signin_html.php');
			exit();
		}
		
	}
}
?>