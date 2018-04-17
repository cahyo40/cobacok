// perpage

$('.page-scroll').on('click', function(e) {

 var tujuan = $(this).attr('href');

 var elemenTujuan = $(tujuan);

 $('html,body').animate({
  scrollTop: elemenTujuan.offset().top - 30
 }, 1250, 'easeInOutExpo');

 e.preventDefault();
});﻿

// navbar
$(document).ready(function() {
	$(window).scroll(function() {
  	if($(document).scrollTop() > 50) {
    	$('#nav').addClass('shrink');
    }
    else {
    $('#nav').removeClass('shrink');
    }
  });
});
