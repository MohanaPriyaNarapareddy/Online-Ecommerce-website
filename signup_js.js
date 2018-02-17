$(document).ready(function()
{
		var count_name=0;
		var count_username=0;
		var count_password=0;
		var count_repeatpassword=0;
		var count_email=0;
		var count_pin=0;
		// Validation Functions
		
		function isValidEmailAddress(emailAddress) {
			var pattern =  /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    
			return pattern.test(emailAddress);
		};
		
		function isValidUserName(userName) {
			var pattern = /^[a-zA-Z0-9]+$/i;
			return pattern.test(userName);
		};
		
		function isValidName(name) {
			var pattern = /^[a-zA-Z]+$/i;
			return pattern.test(name);
		};

		function isValidPassword(passwordn) {
			var pattern = /^[a-zA-Z0-9_~\-!@#\$%\^&\*\(\)]{7,}$/i;
			return pattern.test(passwordn);
		};
		
		
		function isValidPincode(pincode) {
			var pattern = /^[0-9]{5}$/i;
			return pattern.test(pincode);
		};
		
		// Actions - Notifications
		

		$( "#username" ).focus(function() {
			$( "#username" ).after( '<span class="info" id="info-username">   UserName - Only Characters and Numbers<br/></span> ');
			$(".error#username").remove();
		});
			
		$( "#username" ).blur(function() {
			$( "#info-username" ).remove();	
		});
		
		//==
		$( "#password" ).focus(function() {
			$( "#password" ).after( '<span class="info" id="info-password">    Password - Atleast 7 characters long, alphabets, numbers, _,~,-,!,@,#,$,%,^,&,*,(,) <br/></span> ' );
			$(".error#password").remove();
		});
			
		$( "#password" ).blur(function() {
			$( "#info-password" ).remove();	
		});
		//==
		
		$( "#repeatpassword" ).focus(function() {
			$( "#repeatpassword" ).after( '<span class="info" id="info-repeatpassword">    Same as the password written above <br/></span> ' );
			$(".error#repeatpassword").remove();
		});
			
		$( "#repeatpassword" ).blur(function() {
			$( "#info-repeatpassword" ).remove();	
		});
		
		//==
		$( "#email" ).focus(function() {
			$( "#email" ).after( '<span class="info" id="info-email">    Email - A valid Email Address<br/></span> ' );
			$(".error#email").remove();
		});
			
		$( "#email" ).blur(function() {
			$( "#info-email" ).remove();
		});	
		
		//==
		$( "#pin" ).focus(function() {
			$( "#pin" ).after( '<span class="info" id="info-pin">    Only 5 digit postal number allowed <br/></span> ' );
			$(".error#pin").remove();
		});
			
		$( "#pin" ).blur(function() {
			$( "#info-pin" ).remove();	
		});
		
		// Actions - Validation  ++++++++++++++++++++++++++++++++++++++++++++++++++++ 
		
		$( "#username" ).change(function() {
			var user_name = $('#username').val();
			var check_username = isValidUserName(user_name);
			
			$( ".error#username" ).remove();	
			$( ".error#username_e" ).remove();						
						
			
			if (check_username == true)
			{
				
					$( ".error#username" ).remove();	
					$( ".error#username_e" ).remove();						
					count_username++;

				// $.post('validation.php',{username: $('#username').val()}, function(data){
						// if(data.exists)
						// {
							// $( "#username" ).after( '<span class="error" id="username_e">Username Exists<br/></span>' );
							// count_username=0;
						// }
						// else
						// {
							// $( ".error#username" ).remove();	
							// $( ".error#username_e" ).remove();						
							// count_username++;

						// }
					 // }, 'JSON');
			}
			else
			{
				$( "#username" ).after( '<span class="error" id="username">Error<br/></span>' );
				count_username=0;
			}

		});
		
		//------------------------------------
		
		$( "#password" ).change(function() {
			var user_pwd = $('#password').val();
			var check_password = isValidPassword(user_pwd);
			if (check_password == true)
			{
				$( ".error#password" ).remove();	
				count_password++;
			}
			else
			{
				$( "#password" ).after( '<span class="error" id="password">Error<br/></span>' );
				count_password=0;
			}

		});
		
		//------------------------------------
		
		$( "#repeatpassword" ).change(function() {
			var user_pwd = $('#password').val();
			var repeat_user_pwd = $('#repeatpassword').val();
			
			if ( user_pwd == repeat_user_pwd)
			{
				$( ".error#repeatpassword" ).remove();
				count_repeatpassword++;
			}
			else
			{
				$( "#repeatpassword" ).after( '<span class="error" id="repeatpassword">Error<br/></span>' );
				count_repeatpassword=0;
			}

		});
		
		//------------------------------------
		
		$( "#email" ).change(function() {
			var user_email = $('#email').val();
			var check_email = isValidEmailAddress(user_email);
			
			if (check_email == true)
			{
				$( ".error#email" ).remove();		
				count_email++;
			}
			else
			{
				$( "#email" ).after( '<span class="error" id="email">Error<br/></span>' );
				count_email=0;
			}

		});
		
		//------------------------------------	
		
		$( "#pin" ).change(function() {
			var pin_code = $('#pin').val();
			var check_pin = isValidPincode(pin_code);
			
			if (check_pin == true)
			{
				$( ".error#pin" ).remove();	
					count_pin++;
			}
			else
			{
				$( "#pin" ).after( '<span class="error" id="pin">Error<br/></span>' );
				count_pin=0;
			}

		});
		
		//------------------------------------	
		
		$( "#name" ).change(function() {
			var name = $('#name').val();
			var check_name = isValidName(name);
			
			if (check_name == true)
			{
				$( ".error#name" ).remove();		
				count_name++;
			}
			else
			{
				$( "#name" ).after( '<span class="error" id="name">Error<br/></span>' );
				count_name=0;
			}

		});
		
		//------------------------------------	
		
	
		
		// $("#signup_page").submit(function (){
			// var count =  count_name + count_username+ count_password+ count_repeatpassword+count_email+count_pin;
			// if(count<6)
			// {
				// return false;
			// }
		// });
});
