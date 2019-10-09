$(document).ready(function() {

	$('.btn-submit').on( "click", function() {
	 
	//validate name
	var name = $('#name');
	if (name.val().length > 3) {
		name.removeClass('error-name').addClass('ok-name');
	}else {
		$('#name').attr('placeholder','more than 3 characters');
		name.addClass('error-name');
	}

	//validate email
	var mail = $('#email');
	var emailReg = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
	 
	 	if(mail.val().search(emailReg) == 0 && mail.val() != '')
	 	{
	 	mail.removeClass('error').addClass('ok');
	 	}
	 	else
	 	{
	 $('#email').attr('placeholder','enter your email');
	 mail.addClass('error');
		}


		//validate phone
	var phone = $('#phone');
	var phoneReg = /^\+[0-9]{2,6}$/i;
	 
	 	if(phone.val().search(phoneReg) == 0 && phone.val() != '')
	 	{
	 	phone.removeClass('error').addClass('ok');
	 	}
	 	else
	 	{
	 $('#phone').attr('placeholder','enter your phone');
	 phone.addClass('error');
		}
		
 	
 
	});
});