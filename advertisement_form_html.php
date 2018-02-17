

<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="advertisement_form.css" />
		<link rel="icon" href="http://localhost/craiglist/favicon.png" type="image/jpg">
			<script src="http://localhost/craiglist/assets/js/jquery-3.2.1.min.js"></script>
		<script src="advertisement_form.js"></script>
		<link rel="stylesheet" type="text/css" href="http://localhost/craiglist/assets/css/main.css" />
		<title>Post Advertisement</title>
		<meta charset="UTF-8">
	</head>
	<body>
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
			session_start();

			if(!empty($_SESSION['username']) ) 
			{	
				echo "<div id='buttontwo'><a href='http://localhost/craiglist/user_details/userhomepage.php' class='button_1'>";
				echo $_SESSION['username'];
				echo "</a></div>";
				echo "<div id=\"buttonthree\"><a href=\"http://localhost/craiglist/logout.php\" class=\"button_2\">LOG OUT</a></div>";
			}
			else
			{
				echo "<div id=\"buttontwo\"><a href=\"forms/signin-up/signin_html.php\" class=\"button_1\" >LOG IN</a></div>";
				echo "<div id=\"buttonthree\"><a href=\"forms/signin-up/signup_html.php\" class=\"button_2\">SIGN UP</a></div>";
				header('Location: http://localhost/craiglist/forms/signin-up/signin_html.php');
				exit();
			}
			?>	
				
				
			
		</div>
		<form id="post1" action="advertisement_form.php" method="post" enctype="multipart/form-data"> 
			<div class="postcontainer">
				<div class="side">
					<div class="side1">
						<label> Category </label><br/>
						<select id="category_ad" name="category" onChange="change_category()">
							
							<option selected> Select </option>
							<?php
								$conn=mysqli_connect("localhost","root","root","craigslist",3306);
								$query_string_category = "select * from category;";
								$result = mysqli_query( $conn, $query_string_category);
								while($row = $result->fetch_assoc())
								{
									echo "<option value=".$row["categoryID"].">".$row["category"]."</option>";
								}
								mysqli_close($conn);
							?>
						</select>


						<div id="section_div"><br/>
							<label>Section</label><br/>
							<select id="section_ad">
								<option selected> Select </option>
							</select>
						</div>
						<br/>
						<label>Posting Title</label>
						<input type="text" name="post_title" id="post_title" required>
					</div>
				</div>	
				<br/>
				<div>
				<label>Posting Body</label><br>
				<textarea rows="10" cols="104" maxlength="1000" name="post_body" id="post_body" form="post1" required></textarea>
				</div><br/><br/>
				<label>Contact Information</label>
				<div class="cinfo">
					<label>Contact Name</label><br>
					<input type="text" name="name" id="name"> <br>
					<label>Email</label><br>
					<input type="email" placeholder="Enter Email" name="email" id="email" required>
					<div class="side_">
						<div class="side_1">
							<label>Phone Number</label><br>
							<input type="text" name="phone" id="phone">
						</div>
						
					</div>
				</div><br/><br/>

				<div class="addr">
					<label>Street</label><br>
					<input type="text" name="street" id="street"><br>
					<label>Appt/Building</label><br>
					<input type="text" name="appt" id="cross_street"><br>
					<label>City</label><br>
				<?php

				$conn=mysqli_connect("localhost","root","root","craigslist",3306);
				$userid = $_SESSION["userid"];

				//$query_string_section = "select * from city where stateID=(select stateID from address where addressID =(select addressID from user where userID=$userid));";
				$query_string_section = "select * from city";
				$result = mysqli_query( $conn, $query_string_section);
				echo "<select name=\"city\" >";
				while($row = $result->fetch_assoc())
				{
					echo "<option value=".$row["cityID"].">".$row["city"]."</option>";
				}
				echo"</select>";

				mysqli_close($conn);
				?>	
					<br/><br/><label>Postal Code</label><br/>
					<input type="text" name="pocode" id="pocode" required>

				</div><br>
					<br/>
				<label id="pic_label">Upload Image</label>
				<input type="file" id="pic" name="picture_form" accept="image/*"><br><br>

				<input type="submit" value = "Submit" class="postadbtn">
			</div>
		</form> 

		<script type="text/javascript">
			function change_category()
			{
				var category = document.getElementById("category_ad").value;
				var x = document.getElementById("pic");
				var y = document.getElementById("pic_label");
				if (category==5 || category==6 || category==8)
					{	
						x.setAttribute("type", "hidden");
						y.style.display='none'; 
					}
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.open("GET","ajax.php?category="+document.getElementById("category_ad").value,false);
				xmlhttp.send(null);
				document.getElementById("section_div").innerHTML = xmlhttp.responseText;
				
			}
		</script>

	</body>
</html>