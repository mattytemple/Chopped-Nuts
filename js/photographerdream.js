$(function() {
	var left;
	var top;
	var bgimage;
	$("div.photo").hover(
		function () {
			var offset = $(this).offset();
			left = offset.left-18;
			if (jQuery.browser.msie) {
				top = offset.top-17;
			} else {
				top = offset.top-18;
			}
			bgimage = $(this).css('background-image');
			$('#hack').css({'display' : 'block', 'position' : 'absolute', 'background-image' : bgimage, top : top+'px', left : left+'px'});
			$('#hack a#hacklink').attr({ 
				href: $(this).children('a').attr('href'),
				title: $(this).children('a').attr('title'),
				alt: $(this).children('a').attr('alt')
			});

		},
		function () {
			//out
		}
	);
		
	
	/*****/
	$("div.photo").each(function (i) {
		$(this).animate({ 
			opacity: 0
		}, 0 )
	});
	
	function fisherYates ( myArray ) {
	  var i = myArray.length;
	  if ( i == 0 ) return false;
	  while ( --i ) {
		 var j = Math.floor( Math.random() * ( i + 1 ) );
		 var tempi = myArray[i];
		 var tempj = myArray[j];
		 myArray[i] = tempj;
		 myArray[j] = tempi;
	   }
	}
	
	var photoDivs = $('div.photo').length;
	var indexArray = [];
	for (i=1; i<=photoDivs; i++) {
		indexArray.push(i);
	}
	fisherYates(indexArray);

	function asd() {
		current_index = indexArray.pop();
	
		if (current_index) {
			$('div.photo:eq('+current_index+')').animate({ 
				opacity: 1
			}, 1200 );
		} else {
			$('div.photo:eq(0)').animate({ 
				opacity: 1
			}, 1200 );
			clearInterval(intervalId);
		}
	}
	
	var intervalId = setInterval(asd, 100);

	
	$(".colorsquare").hover(
		function () {
			//over
			var newcolor;
			newcolor = $(this).css('background-color');
			$('.imagepan').css({'position' : 'relative'});
			$('#colorselection').css({'position' : 'relative'});
			
			if (window.innerWidth || window.innerHeight){ 
				docwidth = window.innerWidth; 
				docheight = window.innerHeight; 
			} 
			//IE Mozilla 
			if (document.body.clientWidth || document.body.clientHeight){ 
				docwidth = document.body.clientWidth; 
				docheight = document.body.clientHeight; 
			} 
			
			$('#padding').css({'display' : 'block', 'background-color': newcolor, 'width' : docwidth+'px', 'height' : docheight+'px'});
		},
		function () {
			 $('.imagepan').css({'position' : 'relative'});
			 $('#colorselection').css({'position' : 'relative'});
			 $('#padding').css({'background-color' : '', 'width' : '1px', 'height' : '1px'});
		}
	);
	
	$("#opencomments").click(function () { 
    	$("#comments").slideToggle("medium");
		$.scrollTo( $('#comments'), 800 )

		return false;
    });
	
	/** Comment form **/
	
	$('#respond input, #respond textarea').each(function () {
		if ($(this).val() == '') {
			$(this).val($(this).attr('defaultvalue'));
		}
	}).focus(function () {
		if ($(this).val() == $(this).attr('defaultvalue')) {
			$(this).val('');
		}
	}).blur(function () {
		if ($(this).val() == '') {
			$(this).val($(this).attr('defaultvalue'));
		}
	});
	
	
	$("#respond #submit").click(function(){
		$(".error").hide();
		
		var hasError = false;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		
		var emailToVal = $("#email").val();
		if (emailToVal) {
			if (emailToVal == '') {
				$(this).before('<span class="error">You forgot to enter email address.</span>');
				hasError = true;
			} else if (!emailReg.test(emailToVal)) {	
				$(this).before('<span class="error">Enter a valid email address.</span>');
				hasError = true;
			}
		}
		
		var nameVal = $("#author").val();
		if (nameVal == '' || nameVal == 'Name' ) {
			$(this).before('<span class="error">Enter your name.</span>');
			hasError = true;
		}
		
		var messageVal = $("#comment").val();
		if (messageVal == '' || messageVal == 'Your Message ...') {
			$(this).before('<span class="error">You forgot to enter the message.</span>');
			hasError = true;
		}
		
		if (hasError == false) {
			var urlVal = $("#url").val();
			if (urlVal == '' || urlVal == 'Website' ) {
				$("#url").val('');
			}
			document.commentform.submit();
		}
		
		return false;
	});

	
});