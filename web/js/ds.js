$(document).ready(function() {	

	$('.dsLogo, .contactdetails').hide();

//Animate Header Nav Section Footer 	
//jQuery UI Library Functions	
//In the code below the image implodes into view as .show is used
	$('.dsLogo')
	.delay(2500)
	.show('explode', { pieces: 36 }, 3000);

	$('.nav')
	.show('blind', 1000);
	
	$('section .content')
	.show('blind', 3000);

	$('.contactdetails')
	.delay(4000)
	.show('bounce', 1500);	
	
//Hides the Text of the other Divs so only one is shown	
// You use css('visibility', 'hidden') to hide for scroll
	$('.EmpHistory').css('visibility', 'hidden');
	$('.TechSkills').css('visibility', 'hidden');
	$('.Portfolio, .ContactForm, .AboutMe').hide();

//Toggle vs Slide Toggle function, on click event	
	$('#btnEducation').click(function() {
		$('.mainContent, .EmpHistory, .TechSkills, .ContactForm, .AboutMe').slideUp();	
		$('.Portfolio').slideDown(1500);
		
	});

	$('#btnEmpHistory').click(function() {
		$('.mainContent, .Portfolio, .TechSkills, .ContactForm, .AboutMe').slideUp();
		$('.EmpHistory').slideDown(1500);
		$('.EmpHistory').css('visibility', 'visible');
	});

	$('#btnTechSkills').click(function() {
		$('.mainContent, .Portfolio, .EmpHistory, .ContactForm, .AboutMe').slideUp();
		$('.TechSkills').slideDown(1500);
		$('.TechSkills').css('visibility', 'visible');
	});	

	$('#btnContactForm').click(function() {
		$('.mainContent, .Portfolio, .EmpHistory, .TechSkills, .AboutMe').slideUp();
		$('.ContactForm').slideDown(1500);	
	});
//Put focus on About me button on first run
	$('#btnAboutMe').focus();
	$('#btnAboutMe').click(function() {
		$('.mainContent, .Portfolio, .EmpHistory, .TechSkills, .ContactForm').slideUp();
		$('.AboutMe').slideDown(1500);
	});
	
	$('#btnPrint').click(function() {
		window.open('DonSheridanWebDeveloper.pdf');
	});
//Image Rollovers	
	$("#image_rollovers img, .passportphoto img, #btnPrint img, #btnEmail img, #btnAddress img").each(function() {
		// get old and new urls
		var oldURL = $(this).attr("src");
		var newURL = $(this).attr("id");
		
		// preload images		
		var rolloverImage = new Image();
		rolloverImage.src = newURL;
		
		// set up event handlers			
		$(this).hover(
			function() {
				$(this).attr("src", newURL);
			},
			function() {
				$(this).attr("src", oldURL);
			}
		); // end hover
		
	}); // end each

//Embedded Scroller
	$('.scroller').jScrollPane({
		showArrows:true
	});

//Animate Fruitfall 	
//Puts image out of view, 300 pixels of the top of the screen
//	$('.container .fruitFall').css({top: '-300px'});

//Uses default easing method which is swing easing
/*	$('.container .fruitFall').css({top: '-300px'}).animate({top: '240px'}, 500);*/
/*	$('.container .fruitFall').css({top: '-300px'}).animate({top: '240px'}, 500, 'swing');*/

// Uses linear easing (constant easing no decrease in speed towards end)
/*	$('.container .fruitFall').css({top: '-300px'}).animate({top: '240px'}, 500, 'linear');	*/
	
// Uses easing plugins
/*	$('.container .fruitFall').css({top: '-300px'}).animate({top: '240px'}, 500, 'easeOutBounce');*/
/*	$('.container .fruitFall').css({top: '-300px'}).animate({top: '240px'}, 1700, 'easeInOutElastic');*/
	
//Delay	Method
/*	$('.container .fruitFall')
	.css({top: '-300px'})
	.delay(1500) //1.5 seconds
	.animate({top: '240px'}, 500, 'easeOutBounce');*/
	
//Form Validation
		$("#member_form").validate({
		rules: {
			subject: {
				required: true
			},
			message: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			first_name: {
				required: false
			},
			last_name: {
				required: false
			},
			state: {
				required: false,
/*				rangelength: [2, 2]*/
			},
			zip: {
				required: false,
				rangelength: [5, 10]
			},
			phone: {
				required: false,
				phoneUS: true
			}
		}
	}); // end validate
	//scrollTop(50);
	//pageYOffset(50);
});
