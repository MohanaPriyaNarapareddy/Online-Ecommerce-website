<?php
session_start();
$userid = $_SESSION["userid"];
$username = $_SESSION["username"];
if(isset($_FILES["picture_form"]["name"]))
{
	$upload_image=$_FILES["picture_form"]["name"];			
}
$category=$_POST['category'];
$section=$_POST['section'];
$post_title=$_POST['post_title'];
$post_body=$_POST['post_body'];
$contact_name=$_POST['name'];
$contact_email=$_POST['email'];
$contact_phone=$_POST['phone'];
$street=$_POST['street'];
$appt=$_POST['appt'];
$cityid=$_POST['city'];
$pocode=$_POST['pocode'];
$addressid = "";
$city_name="";
$state_name="";
$state_id="";
$contact_info="Name: ".$contact_name."<br/>Email: ".$contact_email."<br/>Contact: ".$contact_phone;

//MAPS
$street_map = str_replace(' ', '+', $street);

$con=mysqli_connect("localhost","root","root","craigslist",3306);
$query_state = "select state,stateID from state where stateID=(select stateID from city where cityID=$cityid);";
$result1 = mysqli_query( $con, $query_state);
while($row = $result1->fetch_assoc())
	{
		$state_name = $row["state"];
		$state_id = $row["stateID"];
	}		

$query_city = "select city from city where cityID=$cityid;";
$result2 = mysqli_query( $con, $query_city);
while($row = $result2->fetch_assoc())
	{
		$city_name = $row["city"];
	}		

$url = $street_map.'+'.$appt.'+'.$city_name.'+'.$state_name.'+US';

$gurl = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$url.'&key=AIzaSyDyXJuAFDmY43ltTn2uh9mXxl4XxeSyIC4';
$result = file_get_contents($gurl);
$j_decode_array = json_decode($result, true);
$latitude = $j_decode_array["results"][0]["geometry"]["location"]["lat"];
$longitude = $j_decode_array["results"][0]["geometry"]["location"]["lng"];
mysqli_close($con);

// //IMAGE
// if( $category!=5 && $category!=6 && $category!=8)
// {


// }


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$conn=mysqli_connect("localhost","root","root","craigslist",3306);
	if(!$conn)
	{
		die("Failed to connect to MySQL: " . mysqli_connect_error());
		echo "Click <a href=\"http://localhost/craiglist/homepage.php\">here</a> to go back to homepage";
	}
	#store user details in db
	#redirect user to signin.html page
	else
	{
		$select_userid = "SELECT addressID from address where street='$street' AND apt='$appt' AND cityID='$cityid' AND stateID='$state_id';";
		$result3 = mysqli_query( $conn, $select_userid);
		
		if($row = $result3->fetch_assoc())
		{
			$addressid = $row["addressID"];
		}
		else
		{
			$insert_address = "INSERT INTO `address` (`addressID`, `street`, `apt`, `cityID`, `stateID`) VALUES (NULL, '$street', '$appt', '$cityid', '$state_id');";
			$result = mysqli_query( $conn, $insert_address);
			$select_userid = "SELECT addressID from address where street='$street' AND apt='$appt' AND cityID='$cityid' AND stateID='$state_id' LIMIT 1;";
			$result = mysqli_query( $conn, $select_userid);
			while($row = $result->fetch_assoc())
			{
				$addressid = $row["addressID"];
			}
		}
		
		
		if( $category==5 || $category==6 || $category==8)
		{
			//NO IMAGE
			$insert_ad = "INSERT INTO `jobs_gigs` (`postID`,`userID`,`sectionID`,`title`,`description`,`latitude`,`longitude`,`addressID`,`updatedon`,`contactinfo`,`status`) values(NULL,'$userid','$section','$post_title','$post_body','$latitude','$longitude','$addressid',NULL,'$contact_info','processing');";
			$result = mysqli_query( $conn, $insert_ad);
			
			
			header('Location: http://localhost/craiglist/homepage.php');
			exit();

		}
		else
		{
			//WITH IMAGE
				$org_image=$_FILES["picture_form"]["name"];
				
				$upload_image=$_FILES["picture_form"]["name"];
				
				$date_folder = date("mdYHis");
				$folder="C:/MAMP/htdocs/craiglist/imagescr\\";

				$patterns = "/JPG/";
				$replacements = "jpg";
				$upload_image = preg_replace($patterns, $replacements, $upload_image);

				$patterns = "/PNG/";
				$replacements = "png";
				$upload_image = preg_replace($patterns, $replacements, $upload_image);

				$patterns = "/\./";
				$replacements = $category.$section.$date_folder.".";
				$upload_image = preg_replace($patterns, $replacements, $upload_image);

				$_FILES["picture_form"]["name"] = $upload_image;

				if(($_FILES["picture_form"]["name"]))
				{
					if(move_uploaded_file($_FILES["picture_form"]["tmp_name"], "$folder"."$upload_image"))				//tmp_name
					{
						$folder_db="C:.-MAMP.-htdocs.-craiglist.-imagescr-_";
						$pieces = explode(".", $org_image);
						$new_filename = $pieces[0].$category.$section.$date_folder."-_-".$pieces[1];

						//$insert_path="INSERT INTO `image_table` (`folder`, `image`) VALUES ('$folder1','$new_filename')";
						$insert_ad = "INSERT INTO `advertisements` (`postID`,`userID`,`sectionID`,`title`,`description`,`img_folderpath`,`img_name`,`latitude`,`longitude`,`addressID`,`updatedon`,`contactinfo`,`status`) values(NULL,'$userid','$section','$post_title','$post_body','$folder_db','$new_filename','$latitude','$longitude','$addressid',NULL,'$contact_info','processing');";
						$result = mysqli_query( $conn, $insert_ad);

						header('Location: http://localhost/craiglist/homepage.php');
						exit();					
					}
					else
					{
						header('Location: http://localhost/craiglist/community/advertisement_form_html.php');
						exit();
					}
				}
				else
				{
					$insert_ad = "INSERT INTO `advertisements` (`postID`,`userID`,`sectionID`,`title`,`description`,`img_folderpath`,`img_name`,`latitude`,`longitude`,`addressID`,`updatedon`,`contactinfo`,`status`) values(NULL,'$userid','$section','$post_title','$post_body',NULL,NULL,'$latitude','$longitude','$addressid',NULL,'$contact_info','processing');";
						$result = mysqli_query( $conn, $insert_ad);

						header('Location: http://localhost/craiglist/homepage.php');
						exit();	
				}

		}
		

	}

	mysqli_close($conn);
	
	
}

	
?>