<html>
	<head>
		<title> Craigslist</title>
		<link href='http://fonts.googleapis.com/css?family=Crimson+Text:600' rel='stylesheet' type='text/css'>
	  	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 		<link rel="stylesheet" type="text/css" href="assets/css/main.css" />
		<link rel="icon" type="image/x-icon" href="favicon.png">
		  
	<!-- 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	</head>
	
	<body>
 				<?php
//				$ip = $_SERVER['REMOTE_ADDR'];
	//			$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
		//		echo $details->city;
 				if(!(isset($_COOKIE["cityID"])))
 				{
	 				$cookie_name = "cityID";
					$cookie_value = "";
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
				}
				?>
		
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
								date.setTime(date.getTime() + (30 * 24 * 60 * 60 ));
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
			 <div class="result"></div>
			</div>

			 <?php
			session_start();

			if(!empty($_SESSION['username']) ) 
			{	
				echo "<div id='buttontwo'><a href='http://localhost/craiglist/user_details/userhomepage.php' class='button_1'>";
				echo $_SESSION['username'];
				echo "</a></div>";
				echo "<div id=\"buttonthree\"><a href=\"logout.php\" class=\"button_2\">LOG OUT</a></div>";
			}
			else
			{
				echo "<div id=\"buttontwo\"><a href=\"http://localhost/craiglist/forms/signin-up/signin_html.php\" class=\"button_1\" >LOG IN</a></div>";
				echo "<div id=\"buttonthree\"><a href=\"http://localhost/craiglist/forms/signin-up/signup_html.php\" class=\"button_2\">SIGN UP</a></div>";
		
			}
			?>
		
		</div>
		
		
		
		<div id="container"> 
				<div id = "row1" class = "row">
					<a href="http://localhost/craiglist/category/1" class="category_links">
						<div class = "item Community">
							<h2> Community </h2>
							<img src="assets/img/Fotolia_76955435_XS.jpg" class="category_img">
						</div>
					</a>

					<a href="http://localhost/craiglist/category/2" class="category_links">
						<div class="item Housing">
							<h2> Housing </h2>
							<img src="assets/img/SBCC_Housing_03.jpg" class="category_img">
						</div>
					</a>
					
					<a href="http://localhost/craiglist/category/5" class="category_links">
						<div class="item Jobs">
							<h2> Jobs </h2> 
							<img src="assets/img/jobs.jpg" class="category_img">
						</div>
					</a>
				</div>
				<div id = "row2" class = "row">
					<a href="http://localhost/craiglist/category/4" class="category_links">
						<div class="item Dating"> 
							<h2> Personals </h2>
							<img src="assets/img/OnlineDating1.jpg" class="category_img">
						</div>
					</a>

					<a href="http://localhost/craiglist/category/3" class="category_links">
						<div class="item ForSale">
							<h2> For Sale </h2>
							<img src="assets/img/forsale.jpg" class="category_img">
						</div>
					</a>

					<a href="http://localhost/craiglist/category/9" class="category_links">
						<div class="item DiscussionForums"> 
							<h2>Events</h2>
							<img src="assets/img/DiscussionForum.jpg" class="category_img">
						</div>
					</a>
				</div>
				<div id = "row3" class = "row">
					<a href="http://localhost/craiglist/category/7" class="category_links">
						<div class="item Services"> 
							<h2> Services </h2>
							<img src="assets/img/ratina_logo.png" class="category_img">
						</div>
					</a>

					<a href="http://localhost/craiglist/category/6" class="category_links">
						<div class="item Gigs"> 
							<h2> Gigs </h2>
							<img src="assets/img/gigs.jpg" class="category_img">
						</div>
					</a>

					<a href="http://localhost/craiglist/category/8" class="category_links">
						<div class="item Resumes"> 
							<h2> Resumes </h2>
							<img src="assets/img/resume.jpg" class="category_img">
						</div>
					</a>
				</div>
			</div>
		

	</body>


</html>
