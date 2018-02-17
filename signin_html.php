<?php
session_start();
if(!empty($_SESSION['username']) ) 
{
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="signin.css" />
		<title>SignIn</title>
		<meta charset="UTF-8">
	</head>
	<body>
		You are already logged in.
		Please click <a href="http://localhost/craiglist/homepage.php">here</a> to go to home page.

		If you wish to login with another account first <a href="http://localhost/craiglist/logout.php">Logout</a> and then login again.
		Thanks.
	</body>
	</html>
<?php
}
else
{
?>
<html lang="en">
	<head>
		<script src="http://localhost/craiglist/assets/js/jquery-3.2.1.min.js"></script>
		<!--<link rel="stylesheet" type="text/css" href="http://localhost/craiglist/assets/css/boxed.css" />-->
		<link rel="icon" href="http://localhost/craiglist/favicon.png" type="image/jpg">
		<link rel="stylesheet" type="text/css" href="http://localhost/craiglist/assets/css/main.css" />		
		<link rel="stylesheet" type="text/css" href="signin.css" />

 

		<title>Log In</title>
		<meta charset="UTF-8">
	</head>
	<body >
	<!--	<div id= "header" >

				<div id="title-header">
				<a href="http://localhost/craiglist/homepage.php" class="title-header">craigslist</a>
				</div>

				<div id="location"><img src="http://localhost/craiglist/assets/img/location.png" style="height:3%; width:11%; padding-top:9%;border:none;"/> Dallas</div>

				<div id="button"><a href="#search.php" class="button_3">SEARCH</a></div>
				
				 //<?php
				// if(!empty($_SESSION['username']) ) 
				// {	
					// echo "<div id='buttontwo'><a href='user/signin.html' class='button_1'>";
					// echo $_SESSION['username'];
					// echo "</a></div>";
					// echo "<div id=\"buttonthree\"><a href=\"http://localhost/craiglist/logout.php\" class=\"button_2\">LOG OUT</a></div>";
				// }
				// else
				// {
					// echo "<div id=\"buttontwo\"><a href=\"http://localhost/craiglist/forms/signin-up/signin_html.php\" class=\"button_1\" >LOG IN</a></div>";
					// echo "<div id=\"buttonthree\"><a href=\"http://localhost/craiglist/forms/signin-up/signup_html.php\" class=\"button_2\">SIGN UP</a></div>";
					// // 		header('Location: http://localhost/craiglist/forms/signin-up/signin_html.php');
					// //exit(); 
				// }
				// ?>	
		
		</div>-->
		
		<p>Login to Craigslist</p>
		<form action="signin.php" method="post">
			<div class="sincontainer">
				<br/> <br/>
				<label>Username</label>
				<input type="text" placeholder="Enter Username" name="username" required><br><br>
				<label>Password</label>
				<input type="password" placeholder="Enter Password" name="password" required><br><br>
					<div>
						<a href="http://localhost/craiglist/forms/signin-up/signup_html.php"><button type="button" class="cancelbtn">Register</button></a>
						
						<button type="submit" class="signupbtn">Sign In</button>
					</div>
			</div>
		</form> 
	</body>
	</html>
<?php
}
?>