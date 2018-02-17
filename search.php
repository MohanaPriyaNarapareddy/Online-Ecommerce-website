
<?php
$link = mysqli_connect("localhost","root","root","craigslist",3306);
$count=0; 
// Check connection
if($link == false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST['term']))
{

    $sql = "SELECT * FROM advertisements WHERE title LIKE '%". $_REQUEST['term'] . "%';";
	$result = mysqli_query( $link, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "<a class=\"advertisement_links_search\" href=\"http://localhost/craiglist/ads/1/".$row["postID"]."\" >".$row["title"]."</a><br/><br/>";
		}
		$count = $count + 1;
	} 

	$sql = "SELECT * FROM jobs_gigs WHERE title LIKE '%". $_REQUEST['term'] . "%';";
	$result = mysqli_query( $link, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "<a class=\"advertisement_links_search\" href=\"http://localhost/craiglist/ads/2/".$row["postID"]."\" >".$row["title"]."</a><br/><br/>";
		}
		$count = $count + 1;
	}

	if($count==0) 
	{
		echo "<p>No matches found</p>";
	}

}
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>