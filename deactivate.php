<?php
session_start();
$postid = $_POST["wishlist_postid"];
$table_id = $_POST["table_id"];

$conn=mysqli_connect("localhost","root","root","craigslist",3306);

if($table_id==1)
{
$query1 = "UPDATE advertisements SET status=\"archived\" WHERE postID=$postid;";
$result = mysqli_query( $conn, $query1);
}
else
{
$query1 = "UPDATE jobs_gigs SET status=\"archived\" WHERE postID=$postid;";
$result = mysqli_query( $conn, $query1);	
}

mysqli_close($conn);
?>