<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="signup.css" />
	<script src="jquery-3.2.1.min.js"></script>
	<script src="http://localhost/craiglist/assets/js/jquery-3.2.1.min.js"></script>
	<script src="signup_js.js"></script>
	<link rel="icon" href="http://localhost/craiglist/favicon.png" type="image/jpg">
	<link rel="stylesheet" type="text/css" href="http://localhost/craiglist/assets/css/main.css" />		
	<link rel="stylesheet" type="text/css" href="signup.css" />

	<title>SignUp</title>
</head>

<body>
	<p>Register to Craigslist</p>
	<form action="signup.php" method="post" id="signup_page">
		<div class="supcontainer">
			<label>Name</label><br/>
			<input type="text" placeholder="Enter Name" name="name" id="name" required><br>
			<label>Username</label><br/>
			<input type="text" placeholder="Enter Username" name="username" id="username" required><br>
			<span id="info"></span><br/>
			<script>
				$(function() {

						$("#username").on("change", function() {

							$.ajax({
								type: 'POST',
								url: 'username_validation.php',
								data: {username:$('#username').val()},
								success: function(r)
								{
									if(r=="1")
									{
										//Exists
										$("#info").html("Username already exists");
									}
									else
									{
										//Doesn't exist
										$("#info").html("Username available!");   
									}
								}
							});

						});

				});	
			</script>
			<label>Password</label><br/>
			<input type="password" placeholder="Enter Password" name="password" id="password" required><br>
			<label>Repeat Password</label><br/>
			<input type="password" placeholder="Repeat Password" name="repeatpassword" id="repeatpassword" required><br>
			<label>Email</label><br/>
			<input type="text" placeholder="Enter Email" name="email" id="email" required><br>
			<label>Street</label><br/>
			<input type="text" placeholder="Enter Street" name="street" id="street" required><br>
			<label>Appt/Building</label><br/>
			<input type="text" placeholder="Enter Appt/Building number" name="appt" id="appt" required><br>
			<label>State</label><br/>
			<select id="state" name="state" onChange="change_state()">
				<option selected> Select </option>
				<?php
					$conn=mysqli_connect("localhost","root","root","craigslist",3306);
					$query_string_state = "select * from state;";
					$result = mysqli_query( $conn, $query_string_state);
					while($row = $result->fetch_assoc())
					{
						echo "<option value=".$row["stateID"].">".$row["state"]."</option>";
					}
				?>
			</select><br/>
			
			
			<div id="city_div"><br/>
			<label>City</label><br/>
			<select>
				<option selected> Select </option>
			</select>
			</div>
			
			<!--<input type="text" placeholder="Enter City" name="city" id="city" required><br>
	-->		<label>Postal code</label><br>
			<input type="text" placeholder="Enter Postal Code" name="pin" id="pin" required><br>
			<label>Contact Number</label><br>
			<input type="text" placeholder="Enter Phone Number" name="contact" id="contact" required><br>
			<div class="clearfix">
				<button type="button" class="cancelbtn">Cancel</button>
				<button type="submit" class="signupbtn">Sign Up</button>
			</div>
		</div>
		
	</form> 
	
	<script type="text/javascript">
	function change_state()
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.open("GET","ajax.php?state="+document.getElementById("state").value,false);
		xmlhttp.send(null);
		document.getElementById("city_div").innerHTML = xmlhttp.responseText;
		
	}
	</script>
	
</body>

</html>