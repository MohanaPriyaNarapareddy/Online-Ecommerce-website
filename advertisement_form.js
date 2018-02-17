$(document).ready(function()
{
		var count_name=0;
		var count_post_title=0;
		var count_description=0;
		var count_phone=0;
		var count_email=0;
		var count_city=0;
		var count_pin=0;
		// Validation Functions
		
		
		function isValidTitle(title) {
			var pattern = /^[a-zA-Z0-9]{,100}$/i;
			return pattern.test(title);
		};
		
		function isValidDescription(description) {
			var pattern = /^[a-zA-Z0-9_\-!@#\$%\^&\*\(\)]{,1000}$/i;
			return pattern.test(description);
		};
		
		function isValidName(name) {
			var pattern = /^[a-zA-Z\s]{1,40}$/i;
			return pattern.test(name);
		};


		function isValidEmailAddress(emailAddress) {
			var pattern =  /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    
			return pattern.test(emailAddress);
		};
				
		function isValidCity(city) {
			var pattern = /^[a-zA-Z]+$/i;
			return pattern.test(city);
		};
		
		function isValidPincode(pincode) {
			var pattern = /^[0-9]{5}$/i;
			return pattern.test(pincode);
		};
		
		function isValidNumber(number) {
			var pattern = /^[0-9]{10}$/i;
			return pattern.test(number);
		};
		// Actions - Notifications==========================================================
		

		$( "#post_title" ).focus(function() {
			$( "#post_title" ).after( '<span class="info" id="info-post_title">Not more than 100 characters<br/></span> ');
			$(".error#post_title").remove();
		});
			
		$( "#post_title" ).blur(function() {
			$( "#info-post_title" ).remove();	
		});
		
		//==
		$( "#phone" ).focus(function() {
			$( "#phone" ).after( '<span class="info" id="info-phone">10 digit phone number <br/></span> ' );
			$(".error#phone").remove();
		});
			
		$( "#phone" ).blur(function() {
			$( "#info-phone" ).remove();	
		});
	
		//==
		$( "#email" ).focus(function() {
			$( "#email" ).after( '<span class="info" id="info-email"> <br/>   Email - A valid Email Address<br/></span> ' );
			$(".error#email").remove();
		});
			
		$( "#email" ).blur(function() {
			$( "#info-email" ).remove();
		});	
		
		//==
		$( "#pocode" ).focus(function() {
			$( "#pocode" ).after( '<span class="info" id="info-pocode"> <br/>   Only 5 digit postal number allowed. If you don\'t know enter 0. <br/></span> ' );
			$(".error#pocode").remove();
		});
			
		$( "#pocode" ).blur(function() {
			$( "#info-pocode" ).remove();	
		});
		
		// Actions - Validation ==========================================================
		
		$( "#post_title" ).change(function() {
			var post_title = $('#post_title').val();
			var check_post_title = isValidTitle(post_title);						
			
			if (check_post_title == true)
			{
				$( ".error#post_title" ).remove();					
				count_post_title++;
			}
			else
			{
				$( ".error#post_title" ).remove();			
				$( "#post_title" ).after( '<span class="error" id="post_title">Error<br/></span>' );
				count_post_title=0;
			}

		});
		
		//------------------------------------
		
		$( "#description" ).change(function() {
			var description = $('#description').val();
			var check_description = isValidDescription(description);
			if (check_description == true)
			{
				$( ".error#description" ).remove();	
				count_description++;
			}
			else
			{
				$( ".error#description" ).remove();	
				$( "#description" ).after( '<span class="error" id="description">Error<br/></span>' );
				count_description=0;
			}

		});
		
		//------------------------------------	
		
		$( "#name" ).change(function() {
			var name = $('#name').val();
			var check_name = isValidName(name);
			
			if (check_name == true)
			{
				$( ".error#name1" ).remove();		
				count_name++;
			}
			else
			{
					$( ".error#name1" ).remove();		
				$( "#name" ).after( '<span class="error" id="name1">Error<br/></span>' );
				count_name=0;
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
				$( ".error#email" ).remove();		
				$( "#email" ).after( '<span class="error" id="email">Error<br/></span>' );
				count_email=0;
			}

		});
		
		//------------------------------------	
		
		// $( "#city" ).change(function() {
			// var city = $('#city').val();
			// var check_city = isValidCity(city);
			
			// if (check_city == true)
			// {
				// $( ".error#city" ).remove();		
				// count_city++;
			// }
			// else
			// {
					// $( ".error#city" ).remove();
				// $( "#city" ).after( '<span class="error" id="city">Error<br/></span>' );
				// count_city=0;
			// }

		// });
		
		
		//------------------------------------	
		
		$( "#pocode" ).change(function() {
			var pin_code = $('#pocode').val();
			var check_pin = isValidPincode(pin_code);
			
			if (check_pin == true)
			{
				$( ".error#pocode" ).remove();	
					count_pin++;
			}
			else
			{
				$( ".error#pocode" ).remove();	
				$( "#pocode" ).after( '<span class="error" id="pocode">Error<br/></span>' );
				count_pin=0;
			}

		});
		
		
		//------------------------------------	
		
		$( "#phone" ).change(function() {
			var phone = $('#phone').val();
			var check_phone = isValidNumber(phone);
			
			if (check_phone == true)
			{
				$( ".error#phone" ).remove();	
					count_phone++;
			}
			else
			{
				$( ".error#phone" ).remove();	
				$( "#phone" ).after( '<span class="error" id="phone">Error<br/></span>' );
				count_phone=0;
			}

		});
		
		
		//------------------------------------	
		
		$("#postad_community").submit(function (){
			var count = count_post_title + count_description + count_name + count_email + count_pin + count_phone ;
			if(count<6)
			{
				return false;
			}
		});
});
