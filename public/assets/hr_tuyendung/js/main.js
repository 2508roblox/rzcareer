$(document).ready(function($){"use strict";var loader=function(){setTimeout(function(){if($('#ftco-loader').length>0){$('#ftco-loader').removeClass('show');}},1);};loader();var carousel=function(){$('.ftco-owl-partner').owlCarousel({loop:true,margin:30,stagePadding:5,nav:false,navText:['<span class="icon-chevron-left">','<span class="icon-chevron-right">'],responsive:{0:{items:1},768:{items:2},1000:{items:2}}});};carousel();var carousel=function(){$('.from-news-slide').owlCarousel({loop:true,margin:30,stagePadding:5,nav:false,dot:true,autoplay:true,autoplayTimeout:5000,navText:['<span class="icon-chevron-left">','<span class="icon-chevron-right">'],responsive:{0:{items:1},768:{items:2},1000:{items:3}}});};carousel();var carousel=function(){$('.ftco-owl-about').owlCarousel({loop:true,margin:0,stagePadding:0,nav:false,navText:['<span class="icon-chevron-left">','<span class="icon-chevron-right">'],responsive:{0:{items:1},768:{items:1},1000:{items:1}}});};carousel();var scrollWindow=function(){$(window).scroll(function(){var $w=$(this),st=$w.scrollTop(),navbar=$('.ftco_navbar'),sd=$('.js-scroll-wrap');if(st>150){if(!navbar.hasClass('scrolled')){navbar.addClass('scrolled');}}
if(st<150){if(navbar.hasClass('scrolled')){navbar.removeClass('scrolled sleep');}}
if(st>350){if(!navbar.hasClass('awake')){navbar.addClass('awake');}
if(sd.length>0){sd.addClass('sleep');}}
if(st<350){if(navbar.hasClass('awake')){navbar.removeClass('awake');navbar.addClass('sleep');}
if(sd.length>0){sd.removeClass('sleep');}}});};scrollWindow();var counter=function(){$('#section-counter').waypoint(function(direction){if(direction==='down'&&!$(this.element).hasClass('ftco-animated')){var comma_separator_number_step=$.animateNumber.numberStepFactories.separator(',')
$('.ftco-number').each(function(){var $this=$(this),num=$this.data('number');$this.animateNumber({number:num,numberStep:comma_separator_number_step},7000);});}},{offset:'95%'});}
counter();var contentWayPoint=function(){var i=0;$('.ftco-animate').waypoint(function(direction){if(direction==='down'&&!$(this.element).hasClass('ftco-animated')){i++;$(this.element).addClass('item-animate');setTimeout(function(){$('body .ftco-animate.item-animate').each(function(k){var el=$(this);setTimeout(function(){var effect=el.data('animate-effect');if(effect==='fadeIn'){el.addClass('fadeIn ftco-animated');}else if(effect==='fadeInLeft'){el.addClass('fadeInLeft ftco-animated');}else if(effect==='fadeInRight'){el.addClass('fadeInRight ftco-animated');}else{el.addClass('fadeInUp ftco-animated');}
el.removeClass('item-animate');},k*50,'easeInOutExpo');});},100);}},{offset:'95%'});};contentWayPoint();var OnePageNav=function(){$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click',function(e){e.preventDefault();var hash=this.hash,navToggler=$('.navbar-toggler');$('html, body').animate({scrollTop:$(hash).offset().top},700,'easeInOutExpo',function(){window.location.hash=hash;});if(navToggler.is(':visible')){navToggler.click();}});$('body').on('activate.bs.scrollspy',function(){})};OnePageNav();$('.collapse.in').prev('.panel-heading').addClass('active');$('#accordion, #bs-collapse').on('show.bs.collapse',function(a){$(a.target).prev('.panel-heading').addClass('active');}).on('hide.bs.collapse',function(a){$(a.target).prev('.panel-heading').removeClass('active');});});