<?php
session_start();
$postid = $_POST["wishlist_postid"];
$userid = $_SESSION["userid"];
$table_id = $_POST["table_id"];

$conn=mysqli_connect("localhost","root","root","craigslist",3306);

$query1 = "select * from wishlist where userID=$userid AND postID=$postid AND tableID=$table_id;";
$result = mysqli_query( $conn, $query1);


if(!($row = $result->fetch_assoc()))
{
$query1 = "INSERT INTO wishlist(wishlID,userID,postID,tableID) values (null,$userid,$postid,$table_id);";
$result = mysqli_query( $conn, $query1);	
}

mysqli_close($conn);
?>