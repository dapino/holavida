;(function($){
	$(function(){
		$(document).ready(function(){


            $(".button-collapse").sideNav({
                menuWidth: 200
            });
            $('.modal-trigger').leanModal({
                  dismissible: true, // Modal can be dismissed by clicking outside of the modal
                  opacity: .5, // Opacity of modal background
                  in_duration: 300, // Transition in duration
                  out_duration: 200, // Transition out duration
                  ready: function() { console.log('Ready'); }, // Callback for Modal open
                  complete: function() { console.log('Closed'); } // Callback for Modal close
                }
              );
			$("#main-slider").owlCarousel({
                navigation : true, 
                loop:true,
                margin:10,
                nav:true,
                autoplay:true,
                autoplayTimeout:5000,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
            $("#comments-carousel").owlCarousel({
                navigation : true, 
                loop:true,
                margin:10,
                nav:true,
                autoplay:false,
                autoplayTimeout:10000,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });


            $("#navbar-search-button").click(function(event) {
               $(this).toggleClass('close');
               $('#navbar-search').toggleClass('show-search');
            });

            $("#signin-button").click(function(event) {
               $(this).addClass('active');
               $("#signup-button").removeClass('active')
               $("#signup-form").css('display', 'none');
               $("#signin-form").css('display', 'block');
            });
            $("#signup-button").click(function(event) {
               $(this).addClass('active');
               $("#signin-button").removeClass('active')
               $("#signin-form").css('display', 'none');
               $("#signup-form").css('display', 'block');
            });
            
            $('input[type="number"]').css({
                width: 50,
                left: 40,
                position: 'relative'
            }).after(function() {
                return $('<div />', {
                    'class': 'spinner',
                    css : {
                        height: $(this).outerHeight(),
                        top: $(this).position().top,
                        left: $(this).position().left - 40,
                    },
                    text: '-'
                }).on('click', {input : this}, function(e) {
                    e.data.input.value = (+e.data.input.value) - 1;
                });
            }).before(function() {
                return $('<div />', {
                    'class': 'spinner',
                    css : {
                        height: $(this).outerHeight(),
                        top: $(this).position().top,
                        left: $(this).position().left + $(this).width(),
                    },
                    text: '+'
                }).on('click', {input : this}, function(e) {
                    e.data.input.value = (+e.data.input.value) + 1;
                });
            });

            
            $(window).on('scroll', function(event) {
                var $first        = $('.first-section'),
                heightWindow = $( window ).height();
                scrollPos      = $(window).scrollTop(),
                $navbar = $('.navbar-fixed');
                if ($first.length) {
                    var margin = heightWindow,
                    margin2 = margin/1.1,
                    triggerHeight = margin - 100,
                    decOpacity = (1/margin),
                    opacity  = (decOpacity * scrollPos),
                    opacity2  = ((margin2 - scrollPos ) /  (margin2)).toFixed(2);
                    $first.css({opacity: opacity2}); 
                    if ( scrollPos >= triggerHeight) {
                        $navbar.removeClass('up').addClass('down');     
                    }  else {
                        $navbar.removeClass('down').addClass('up');
                    }
                }   
            })
		}); 		
	});
}(jQuery));