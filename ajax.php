<?php

$conn=mysqli_connect("localhost","root","root","craigslist",3306);
$state = $_GET["state"];

$query_string_city = "select * from city where stateID=$state;";
$result = mysqli_query( $conn, $query_string_city);
echo "<label>City</label>";
echo "<select id=\"city\" name=\"city\" >";
while($row = $result->fetch_assoc())
{
	echo "<option value=".$row["cityID"].">".$row["city"]."</option>";
}
echo"</select>";


?>