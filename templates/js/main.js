function show_signup_popup(){
	$('.popup').fadeOut(400, function(){
		$('.popupWrapper, #signupPopup, .overlay').fadeIn();
		$('html, body').css('overflow','hidden');
	});
	return false;
}
function show_signup2_popup(){
	$('.popup').fadeOut(400, function(){
		$('.popupWrapper, #signupPopup2, .overlay').fadeIn(400, function(){
			$(function(){
				$('#date').combodate({
					firstItem: 'none',
					minYear: 2006,
					maxYear: 2016
				});  
				$("select").selectOrDie({
					size: 8,
					customClass: 'popupDropdown'
				});
			});
		});
		$('html, body').css('overflow','hidden');
	});
	return false;
}

function show_value(){
		$('#abc').val('false');
		$('#a').val('false');
}

function show_share_popup(){
	$('.popup').fadeOut(400, function(){
		$('.popupWrapper, #sharePopup, .overlay').fadeIn();
		$('html, body').css('overflow','hidden');
	});
	return false;
}
function hide_popup(){
	$('.popupWrapper, .popup, .overlay').fadeOut();
	$('html, body').css('overflow','visible');
	return false;
}
function footer(){
	if(parseInt($('.content').height()) + parseInt($('.content').css('padding-bottom')) > $(window).height()){
		$('footer').css('position','absolute')
	}
	else {
		$('footer').css('position','fixed')
	}
	return false;
}
function contentHeight(){
	if($('.content').height() > ($(window).height()-$('footer').height())){
		$('.content').css('padding-bottom', 240);
	}
}

function reinit_image(){
	$(".previewBox .image img").each(function(){
		screenImg = $(this);
		theImg = new Image();
		theImg.src = screenImg.attr('src');
		var imgH = theImg.height;
		var imgW = theImg.width;

		if(imgW < imgH){
			//portrait
			$(this).css({
				"width": "100%",
				height: "auto"
			});
		}
		else{
			//landscape
			$(this).css({
				height: "auto",
				"width": "100%",
			});
		}
	});
}

var degrees = 0;

function rotateLeft() {
	degrees -= 90;
	if (degrees == -90) {
		degrees = 270;
	}
	$('.dz-image img').css({'transform' : 'rotate('+ degrees +'deg)'});
	$('#rotDegree').val(degrees);
}
function rotateRight() {
	degrees += 90;
	if (degrees == 360) {
		degrees = 0;
	}
	$('.dz-image img').css({'transform' : 'rotate('+ degrees +'deg)'});
	$('#rotDegree').val(degrees);
}

var documentHeight;
var cw;
var mw;

$(document).ready(function(){
	degrees = 0;
	$('#rotDegree').val(degrees);
	var cw = $('.circle').width();
	$('.circle').css({'height':cw+'px'});
	var mw = $('.measurement').width();
	$('.measurement').css({'height':mw+'px'});
	
	contentHeight();
	footer();
	
	$('.burgerIcon').click(function(){
		$('nav').animate({right:0},700);
	})
	$('.mobilecloseBtn').click(function(){
		$('nav').animate({right:-70+'%'},700);
	})
	$('a.disclaimer').click(function(){
		$('.disclaimerContent').slideToggle();
		return false;
	});
});

$(window).bind('resize', function(){
	var cw = $('.circle').width();
	$('.circle').css({'height':cw+'px'});
	var mw = $('.measurement').width();
	$('.measurement').css({'height':mw+'px'});
	
	contentHeight();
	footer();
	
	/*$('.burgerIcon').click(function(){
		$('nav').animate({right:0},700);
	})
	$('.mobilecloseBtn').click(function(){
		$('nav').animate({right:-70+'%'},700);
	})*/
	
	if($(window).width() >= 768){
		$('nav').show();
		$('nav').css('right', '0');
	}
	else{
		$('nav').css('right', '-70%');
		$('.burgerIcon').show();
	}
});

$(window).load(function(){
	reinit_image();
	contentHeight();
	footer();
});
