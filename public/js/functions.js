const DELAY = 250;
const DELAY_SLIDE = 7000;

$(document).ready(function() {
	var items = $(".slider_item");
	var bullets = $("#bullets div");
	
	var i = 0;
	var i_minic = 0;
	var block = false;

	var timer = setInterval(nextSlide, DELAY_SLIDE);
    
	$("#bullets div").on("click", function(event) {
		clearInterval(timer);
		old = i;
		i = $(event.target).prevAll("div").length;
		showSlide();
	});
	
	$("#slider").on("mouseleave", function(event) {
		clearInterval(timer);
		timer = setInterval(nextSlide, DELAY_SLIDE);
	});
	
	function showSlide() {
		if ($(bullets.get(i)).hasClass("active")) return;
		$(items.get(old)).fadeOut(DELAY, function() {
			$(items.get(i)).fadeIn(DELAY);
		});
		bullets.removeClass("active");
		$(bullets.get(i)).addClass("active");
	}
	
	function nextSlide() {
		old = i;
		i++;
		if (i == bullets.length) i = 0;
		showSlide();
	}

	$('.menu a').each(function () { 
		var location = window.location.href;
		console.log(location);
		var link = this.href;
		console.log(link);
		if ((location.includes(link))) { 
			$(this).addClass('menuactive');
		}
	});
	
});