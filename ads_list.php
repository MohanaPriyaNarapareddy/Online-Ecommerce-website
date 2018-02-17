<?php
session_start();

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$pieces = explode("/", $actual_link);
$table_id = (int)$pieces[5];
$post_id = (int)$pieces[6];
$category_iD=0;
$row="";


?>

<html lang="en">
	<head>
		<script src="http://localhost/craiglist/assets/js/jquery-3.2.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/craiglist/assets/css/boxed.css" />
		<link rel="icon" href="http://localhost/craiglist/favicon.png" type="image/jpg">
		<link rel="stylesheet" type="text/css" href="http://localhost/craiglist/assets/css/main.css" />
	<!-- 	<link rel="stylesheet" type="text/css" href="http://localhost/craiglist/assets/css/description_style.css" />
 -->

		<title>Advertisement List</title>
		<meta charset="UTF-8">
	</head>
	<body >
			<div id= "header" >
			<div id="title-header">
			<a href="http://localhost/craiglist/homepage.php" class="title-header">craigslist</a>
			</div>
			<div id="location"><img src="http://localhost/craiglist/assets/img/location.png" style="height:3%; width:8%; padding-top:9%;border:none;"/> <!-- Dallas -->

					<select id="city_select" name="city" onchange="change_city()">
							
							<option selected> Select </option>
							<?php
								$conn=mysqli_connect("localhost","root","root","craigslist",3306);
								$query_string_category = "select * from city;";
								$result = mysqli_query( $conn, $query_string_category);
								while($row = $result->fetch_assoc())
								{
									echo "<option value=".$row["cityID"].">".$row["city"]."</option>";
								}
								mysqli_close($conn);
							?>
						</select>
						<script type="text/javascript">
							function change_city()
							{
								var name= "cityID";
								var city = document.getElementById("city_select").value;

								var date = new Date();
								date.setTime(date.getTime() + (30 * 24 * 60 * 60));
								expires = "; expires=" + date.toGMTString();
								document.cookie = name + "=" + city + expires + "; path=/";

							}
						</script>

						<?php
						if(isset($_COOKIE["cityID"]))
						{
							echo "<script type=\"text/javascript\">";
							echo "document.getElementById(\"city_select\").value=".$_COOKIE["cityID"];
							echo "</script>";

						}
						?>

			</div>	
			 <script type="text/javascript">
				$(document).ready(function(){
				    $('.search-box input[type="text"]').on("keyup input", function(){
				        /* Get input value on change */
				        var inputVal = $(this).val();
				        var resultDropdown = $(this).siblings(".result");
				        if(inputVal.length){
				            $.get("http://localhost/craiglist/search.php", {term: inputVal}).done(function(data){
				                // Display the returned data in browser
				                $(".result").css("display","block");
				        
				                resultDropdown.html(data);
				            });
				        } else{
				            resultDropdown.empty();
				        }
				    });
				    
				    // Set search input value on click of result item
				    $(document).on("click", ".result p", function(){
				    	$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
				        $(this).parent(".result").empty();
				    });
				});
			</script>
			
			<div id="button" class="search-box">
			 <input type="text" name="search" id="button" placeholder="Search" style="color:#42aaf4;">
			 <div class="result" style="display: none;"></div>
			</div>
			
			<?php
			if(!empty($_SESSION['username']) ) 
			{	
				echo "<div id='buttontwo'><a href='http://localhost/craiglist/user_details/userhomepage.php' class='button_1'>";
				echo $_SESSION['username'];
				echo "</a></div>";
				echo "<div id=\"buttonthree\"><a href=\"http://localhost/craiglist/logout.php\" class=\"button_2\">LOG OUT</a></div>";
			}
			else
			{
				echo "<div id=\"buttontwo\"><a href=\"http://localhost/craiglist/forms/signin-up/signin_html.php\" class=\"button_1\" >LOG IN</a></div>";
				echo "<div id=\"buttonthree\"><a href=\"http://localhost/craiglist/forms/signin-up/signup_html.php\" class=\"button_2\">SIGN UP</a></div>";
				// 		header('Location: http://localhost/craiglist/forms/signin-up/signin_html.php');
				//exit(); 
			}
			?>	
				
				
			
		
	</div>
	<div id="post1" > 
			<h2 style="padding-top: 2%;"> Description: </h2><br/>
				<?php
					$conn=mysqli_connect("localhost","root","root","craigslist",3306);
					
					if($table_id==2)
					{
						//jobs_gigs
						$query = "select * from jobs_gigs where postID = $post_id;";
				 		$result = mysqli_query( $conn, $query);
						$row = $result->fetch_assoc();

					}

					else
					{
						//advertisements
						$query = "select * from advertisements where postID = $post_id;";
				 		$result = mysqli_query( $conn, $query);
						$row = $result->fetch_assoc();
					}
					mysqli_close($conn);
				 
				?>		

			<div> 
				<!-- id="car-photo"> -->
				<strong style="padding-left: 10%; "><?php echo $row["title"]; ?></strong><br/>
      			<?php
      			 $image_path=$row["img_folderpath"];
				 $image_name=$row["img_name"];
				 
				 $patterns = "/-_-/";
				 $replacements=".";
				 $org_filename = preg_replace($patterns, $replacements, $image_name);
				 
				 $patterns = "/\.-/";
				 $replacements = "/";
				 //$replacements = "\\";
				 $image_path = preg_replace($patterns, $replacements, $image_path);


				 $patterns = "/-_/";
				 $replacements="/";
				 $image_path = preg_replace($patterns, $replacements, $image_path);

				 $patterns = "/C:\/MAMP\/htdocs/";
				 $replacements="http://localhost";
				 $image_path = preg_replace($patterns, $replacements, $image_path);

				 echo "<div class=\"ad_image_description_class\"><img src=".$image_path.$org_filename." id=\"ad_description_img\" /></div><br/>";
				 echo "<div class=\"ad_description_class\">".$row["description"]."</div><br/>";
				  echo "<div class=\"ad_contact_class\">Contact:<br/>".$row["contactinfo"]."</div><br/>";
      			?>	    		
				
			</div>

			<div id="map" ></div>

			<div class="buttons">
				<?php
					if(isset($_SESSION["userid"]))
					{
						if(!($_SESSION["userid"]==0))
		
						{
							$conn=mysqli_connect("localhost","root","root","craigslist",3306);
							$userid_w = $_SESSION["userid"];
							$query = "select * from wishlist where postID = $post_id AND userID = $userid_w AND tableID = $table_id;";
							$result = mysqli_query( $conn, $query);
							if(mysqli_num_rows($result)>0)
							{
								echo "<span id=\"add_wish_span\">Already Wishlisted!!</span>";
								echo "<button  id=\"remove_wish\" type=\"button\" onclick=\"remove_from_wishlist()\">Remove from Wishlist</button>";
								echo "<span id=\"remove_wish_span\"></span>";
							}
							else
							{	
								echo "<button  id=\"add_wish\" type=\"button\" onclick=\"add_to_wishlist()\">Add to Wishlist</button><br/>";
								echo "<span id=\"add_wish_span\"></span>";
							}

						}

					}

					if(isset($_SESSION["adminid"]))
					{
						if($row["status"]=="processing")
						{
							echo "<button  id=\"add_wish\" type=\"button\" onclick=\"activate()\">Activate</button><br/>";
							echo "<span id=\"add_wish_span\"></span>";
							echo "<button  id=\"remove_wish\" type=\"button\" onclick=\"deactivate()\">Deactivate</button>";
							echo "<span id=\"remove_wish_span\"></span>";
						}
						else
						{
							if($row["status"]=="active")
							{
								echo "<button  id=\"remove_wish\" type=\"button\" onclick=\"deactivate()\">Deactivate</button>";
								echo "<span id=\"remove_wish_span\"></span>";
							}
							else
							{
								echo "<span id=\"remove_wish_span\">Archived</span>";
								echo "<button  id=\"add_wish\" type=\"button\" onclick=\"activate()\">Activate?</button><br/>";
								echo "<span id=\"add_wish_span\"></span>";
							}
						}
						
					}
				?>
			</div>
		</div>
				<script type="text/javascript">
				      function initMap() {
						var lat_value = parseFloat(<?php echo $row["latitude"] ?>);
						var lng_value = parseFloat(<?php echo $row["longitude"] ?>);

						//extra values added so that actual location is not given up by the centre
				        var uluru = {lat: lat_value+0.013, lng: lng_value+0.023 };
				        
						var map = new google.maps.Map(document.getElementById('map'), { zoom: 11, center: uluru });
				    
						//var marker = new google.maps.Marker({ position: uluru, map: map });
						
						var cityCircle = new google.maps.Circle({
				            strokeColor: '#FF0000',
				            strokeOpacity: 0.8,
				            strokeWeight: 2,
				            fillColor: '#FF661100',
				            fillOpacity: 0.35,
				            map: map,
				            center: uluru,
				            radius: 3500
				          });
						
				      }
					  
					  
				</script>
				<script async defer
				    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyXJuAFDmY43ltTn2uh9mXxl4XxeSyIC4&callback=initMap">
				</script>
			
				<script type="text/javascript">
					function add_to_wishlist()
					{
					      $.ajax({
					           type: "POST",
					           url: 'http://localhost/craiglist/user/add_to_wishlist.php',
					           data:{wishlist_postid:<?php echo $row["postID"]; ?>,table_id:<?php echo $table_id; ?>},
					           success:function(html) {
					             document.getElementById('add_wish_span').innerHTML='Added!!';
					            document.getElementById('remove_wish_span').innerHTML='';
					              
					           }

					      });
					 }

					function remove_from_wishlist()
					{
					      $.ajax({
					           type: "POST",
					           url: 'http://localhost/craiglist/user/remove_from_wishlist.php',
					           data:{wishlist_postid:<?php echo $row["postID"]; ?>,table_id:<?php echo $table_id; ?>},
					           success:function(html) {
					             document.getElementById('add_wish_span').innerHTML='';
					            document.getElementById('remove_wish_span').innerHTML='Removed!!';
					              
					           }

					      });
					 }

 					function activate()
					{
					      $.ajax({
					           type: "POST",
					           url: 'http://localhost/craiglist/admin/activate.php',
					           data:{wishlist_postid:<?php echo $row["postID"]; ?>,table_id:<?php echo $table_id; ?>},
					           success:function(html) {
					             document.getElementById('add_wish_span').innerHTML='Activated';
					            document.getElementById('remove_wish_span').innerHTML='';
					              
					           }

					      });
					 }

					function deactivate()
					{
					      $.ajax({
					           type: "POST",
					           url: 'http://localhost/craiglist/admin/deactivate.php',
					           data:{wishlist_postid:<?php echo $row["postID"]; ?>,table_id:<?php echo $table_id; ?>},
					           success:function(html) {
					             document.getElementById('add_wish_span').innerHTML='';
					            document.getElementById('remove_wish_span').innerHTML='Deactivated!!';
					              
					           }

					      });
					 }

				</script>

	</body>
</html>