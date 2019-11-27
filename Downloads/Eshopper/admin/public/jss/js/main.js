/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});
// Wait for the DOM to be ready
/*$().ready(function(){
	// Initialize form validation on the registration form.
	// It has the name attribute "registration"
	$("#register").validate({
	  // Specify validation rules
	  rules: {
		// The key name on the left side is the name attribute
		// of an input field. Validation rules are defined
		// on the right side
		name: "required",
		
		email: {
		  required: true,
		  // Specify that email should be validated
		  // by the built-in "email" rule
		  email: true
		},
		password: {
		  required: true,
		  minlength: 5
		}
	  },
	  // Specify validation error messages
	  messages: {
		name: "Please enter your firstname",
		password: {
		  required: "Please provide a password",
		  minlength: "Your password must be at least 5 characters long"
		},
		email: "Please enter a valid email address"
	  // Make sure the form is submitted to the destination defined
	  // in the "action" attribute of the form when valid
	 
	  }
	});
});
  */
 $().ready(function(){
  $('#current_pwd').keyup(function(){
	 var current_pwd=$(this).val();
	  $.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		         },
			 type:'post',
			 url:'/check-user-pwd',
			 data:{current_pwd:current_pwd},
			 success:function(resp){
				if(resp=="false")
				{
					$('#chkPwd').html("<font color='red'>Current Password is incorrect</font>");
				}
				else if(resp=="true")
				{
					$('#chkPwd').html("<font color='green'>Current Password is correct</font>");
				}
			 },error:function()
			 {
				 alert("Error");
			 }
			 
	  });

  });
  $('#registerForm').validate({
	// Specify validation rules
	rules: {
	 
	  name: "required",
	  
	  email: {
		required: true,
		// Specify that email should be validated
		// by the built-in "email" rule
		email: true
	  },
	  password: {
		required: true,
		minlength: 8
	  }
	},
	/*errorClass:"help-inline",
	  errorElement:"span",
	  highlight:function(element,errorClass,validClass)
	  {
             $(element).parents('.control-group').addClass('error');
	  }, */
	// Specify validation error messages
	messages: {
	  name: "Please enter your firstname",
	  password: {
		required: "Please provide a password",
		minlength: "Your password must be at least 8 characters long"
	  },
	  email: "Please enter a valid email address",
	// Make sure the form is submitted to the destination defined
	// in the "action" attribute of the form when valid
   
	}
  });
  $('#login').validate({
	// Specify validation rules
	rules: {
	 
	  
	  email: {
		required: true,
		// Specify that email should be validated
		// by the built-in "email" rule
		email: true
	  },
	  password: {
		required: true,
		minlength: 8
	  }
	},
	/*errorClass:"help-inline",
	  errorElement:"span",
	  highlight:function(element,errorClass,validClass)
	  {
             $(element).parents('.control-group').addClass('error');
	  }, */
	// Specify validation error messages
	messages: {
	  password: {
		required: "Please provide a password",
		minlength: "Your password must be at least 8 characters long"
	  },
	  email: "Please enter a valid email address",
	// Make sure the form is submitted to the destination defined
	// in the "action" attribute of the form when valid
   
	}
  });
  $('#passwordForm').validate({
	rules: {
		
		current_pwd: {
		  required: true,
		  minlength: 8,
		  maxlength:20
		},
		new_pwd: {
			required: true,
			minlength: 8,
			maxlength:20
		  },
		  confirm_pwd: {
			required: true,
			minlength: 8,
			maxlength:20,
			equalTo:"#new_pwd"
		  }
	  },
	  /*errorClass:"help-inline",
	  errorElement:"span",
	  highlight:function(element,errorClass,validClass)
	  {
             $(element).parents('.control-group').addClass('error');
	  }, */
	  messages: {
	
		current_pwd: {
		  required: "Please provide a password",
		  minlength: "Your password must be at least 8 characters long"
		},
		new_pwd: {
			required: "Please provide a password",
			minlength: "Your password must be at least 8 characters long"
		  },
		  confirm_pwd: {
			required: "Please provide a password",
			equalTo: "your passwod should match"
		  },
	 
	  }
  });
  

 });