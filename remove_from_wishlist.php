<?php
session_start();
mysqli_report(MYSQLI_REPORT_STRICT);
$postid = $_POST["wishlist_postid"];
$userid = $_SESSION["userid"];
$table_id = $_POST["table_id"];

$conn=mysqli_connect("localhost","root","root","craigslist",3306);
$wishlid=0;

$query1 = "select * from wishlist where userID=$userid AND postID=$postid AND tableID=$table_id;";
$result = mysqli_query( $conn, $query1);

while($row = $result->fetch_assoc())
{
	$wishlid=$row["wishlID"];	
	$query2 = "DELETE FROM wishlist WHERE wishlID = $wishlid;";
	$result = mysqli_query( $conn, $query2);	
}

mysqli_close($conn);
?>