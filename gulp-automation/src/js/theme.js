;(function($){
	$(function(){
		$(document).ready(function(){


            
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
                singleItem:true
            });

            $("#comments-carousel").owlCarousel({
                navigation : true, // Show next and prev buttons
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem:true
            });

            
            $("#showBills").click(function(event) {
               $(this).toggleClass('close');
               $('#billList').toggleClass('show');
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
                width: 30,
                left: 40,
                position: 'relative'
            }).after(function() {
                return $('<div />', {
                    'class': 'spinner',
                    css : {
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
                        top: $(this).position().top,
                        left: $(this).position().left + 40,
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

            $('.remove_img').on('click', function( event ){
                event.preventDefault()

                var placeholder = $('#mc_placeholder_meta').val()

                $(this).parent().fadeOut('fast', function(){
                  $(this).remove()
                  $('.mc-current-img').addClass('placeholder').attr('src', placeholder)
                })
                $('#mc_upload_meta, #mc_upload_edit_meta, #mc_meta').val('')
              })

            var upd_cart_btn = $(".update-cart-button");
            upd_cart_btn.hide();
            $(".spinner").on("click", function(){
                upd_cart_btn.trigger("click");
            });




            var $stepOne = $('#step-1');
            var $stepTwo = $('#step-2');
            var $stepThree = $('#step-3');
            var $stepFour = $('#step-4');
            var $btn2One = $('#button-to-1');
            var $btn2Two = $('#button-to-2');
            var $btn2Two2 = $('#button-to-2-2');
            var $btn2Three = $('#button-to-3');
            var $btn2Four = $('#button-to-4');
            
            $btn2One.click(function() {
              $btn2Two.css('display', 'none');
              $stepOne.css('display', 'block');
            });

            $btn2Two.click(function() {
              $stepThree.css('display', 'none');
              $stepOne.css('display', 'none');
              $stepTwo.css('display', 'block');
            });
            $btn2Two2.click(function() {
              $stepThree.css('display', 'none');
              $stepOne.css('display', 'none');
              $stepTwo.css('display', 'block');
            });

            $btn2Three.click(function() {
              $stepTwo.css('display', 'none');
              $stepFour.css('display', 'none');
              $stepThree.css('display', 'block');
            });

            $btn2Four.click(function() {
              $stepThree.css('display', 'none');
              $stepFour.css('display', 'block');
            });

            if ( $stepTwo.length == 0) {
              //$('.div').data("") 
              $btn2Two.click(function() {
                $stepThree.css('display', 'block');
                $stepOne.css('display', 'none');
              });
              $btn2Two2.click(function() {
                $stepThree.css('display', 'none');
                $stepOne.css('display', 'block');
              });
            }



              var $fields = $(".validate-required input");
              var $emptyFields = $fields.filter(function() {
                  return $.trim(this.value) === "";
              });

              $fields.blur(function(){
                if( !$(this).val() ) {
                  $(this).before('<p class="warn">Este campo es obligatorio</p>')
                  $(this).addClass('warning');
                  $btn2Four.css('display', 'none');
                } else {
                  $('.warn').fadeOut();
                  $(this).removeClass('warning');
                }
              });

              $fields.keyup(function() {
                if (!$emptyFields.length) {
                    $btn2Four.css('display', 'inline-block');
                } else {
                    $btn2Four.css('display', 'none');
                }

              });
              

              

            
            $('#showMenu').click(function() {
              $('#mobileMenu').toggleClass('show');
            }); 

            

            


		}); 		
	});
}(jQuery));