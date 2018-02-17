<?php
//ini_set('display_errors',1); 
//error_reporting(E_ALL);
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$username = $_POST['username'];
//error_log($username,0);
$conn=mysqli_connect("localhost","root","root","craigslist",3306);

$query1 = "SELECT * FROM user WHERE username = '$username' ;";
$result = mysqli_query( $conn, $query1);
//error_log($result,0);


 if(mysqli_num_rows($result)>0)
	{
		echo "1";
	}
else
	{
		echo "0";   
	}

mysqli_close($conn);
?>