<?php
session_start();

// $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// $pieces = explode("/", $actual_link);
// $table_id = (int)$pieces[5];
// $post_id = (int)$pieces[6];
$category_iD=0;
$row="";
$name="";
$email="";
$uname="";
$count=0;
?>

<html lang="en">
	<head>
		<script src="http://localhost/craiglist/assets/js/jquery-3.2.1.min.js"></script>
		<link rel="icon" href="http://localhost/craiglist/favicon.png" type="image/jpg">
		<link rel="stylesheet" type="text/css" href="http://localhost/craiglist/assets/css/main.css" />
		<link rel="stylesheet" type="text/css" href="userhomepage.css" />
		
	<!-- 	<link rel="stylesheet" type="text/css" href="http://localhost/craiglist/assets/css/description_style.css" />
 -->

		<title>Archived Links</title>
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
				<br><pre>	Archived Links</pre><br><br>

		<?php
			if((isset($_SESSION["userid"]))==true)
			{
				$conn=mysqli_connect("localhost","root","root","craigslist",3306);
				if(!$conn)
				{
					die("Failed to connect to MySQL: " . mysqli_connect_error());
				}
				else
				{
						$sql="SELECT * FROM advertisements where status='archived';"; 
						$res=mysqli_query($conn,$sql);
						if(mysqli_num_rows($res)>0) 
						{
							while($row=$res->fetch_assoc())
							{	
									//advertisements
									echo "<div ><a href=\"http://localhost/craiglist/ads/1/".$row["postID"]."\" class=\"detail_link\" >".$row["title"]."</a></div><br/><br/>";
							}
							
						}
						else
						{
							$count++;
						}


						$sql="SELECT * FROM jobs_gigs where status='archived';"; 
						$res=mysqli_query($conn,$sql);
						if(mysqli_num_rows($res)>0) 
						{
							while($row=$res->fetch_assoc())
							{	
									//jobs_gigs
									echo "<div><a href=\"http://localhost/craiglist/ads/2/".$row["postID"]."\"  class=\"detail_link\">".$row["title"]."</a></div><br/><br/>";
							}
						
						}
						else
						{
							$count++;
						}



						if($count>1)
						{
							echo "<div class=\"detail_link\">There seems an error. NO ARCHIVED LINKS.</div>";
						}


				}
					mysqli_close($conn);
			}
		?>

	</div>
	</body>
</html>
