$(function(){

	// Nicescroll
	$('html').niceScroll({
		cursorcolor: "#000",
		cursoropacitymax: 1,
		cursorwidth: "10px",
		cursorborder: "0",
		cursorborderradius: "0",
		mousescrollstep: 50,
		scrollspeed: 40,
	});

	  // owl carousel banner slidshow
	$('#banner').owlCarousel({
		autoPlay: true,
		mouseDrag: false,
		pagination: false,
		navigationText: ["<i class='fa fa-angle-double-left'></i>","<i class='fa fa-angle-double-right'></i>"],
		navigation : false, // Show next and prev buttons
		singleItem: true,
		transitionStyle: "backSlide"
	});

	// News in homepage
  	$('#news-slider').owlCarousel({
		autoPlay: 3000,
	    items: 6,
		navigation: true,
		pagination: false,
		navigationText: ["<i class='fa fa-angle-double-left'></i>","<i class='fa fa-angle-double-right'></i>"],
	});

	// News in page news
  	$('#slider-pagenews').owlCarousel({
		autoPlay: 3000,
	    items: 5,
		navigation: true,
		pagination: false,
		navigationText: ["<i class='fa fa-angle-double-left'></i>","<i class='fa fa-angle-double-right'></i>"],
	});

	// hide #scroll-top
	$('#scroll-top').hide();

	$(window).scroll( function(){
	// Go to Top
	if ($(this).scrollTop() > 400) {
	    $('#scroll-top').fadeIn();
	} else {
	    $('#scroll-top').fadeOut();
	}
	});

	// Speed animate Go to Top
	$('#scroll-top').on('click', function(){
		$('html, body').animate({ scrollTop: 0 }, 1000 );
		return false;
	});

	// -----------------------------------------------------------------------
    $(".btn-modal").on('click', function(){
        var idBtnModal = $(this).attr('id');
        var getVideoId = idBtnModal.substr(8, 11); // myModal-es8lxbExFAQ+a --> get es8lxbExFAQ
        var idModal = idBtnModal.substr(0, 19);
        var url = '//www.youtube.com/embed/'+getVideoId;
       	
		// $('.display-modal').attr("id", idModal);  
		$("#myVideoYoutube").html('<iframe class="iframeVideo" width="570" height="325" src="'+url+'" frameborder="0" allowfullscreen></iframe>');
    });
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $(".display-modal").on('hide.bs.modal', function(){
        $(".iframeVideo").attr('src', '');
        $(".iframeVideo").remove();
    });
	// -----------------------------------------------------------------------

	// pagination
	// $('#data-art').jplist({				
	// 	itemsBox: '.list' 
	// 	,itemPath: '.list-item' 
	// 	,panelPath: '.jplist-panel'
	// 	//animation effects
	// 	,effect: 'fade'
	// 	,duration: 300			
	// 	,fps: 24
	// });

	// Load functions
	$(window).load(function() {

		$("#preloader").fadeOut("slow");

    	// JustifiedGallery ( page gallery )
		$('#my-gallery').justifiedGallery({
			lastRow : 'justify', 
			rowHeight : 120,
			rel : 'gallery2',
			margins : 1
			}).on('jg.complete', function () {
			$('#my-gallery a').swipebox();
		});

		// Gallery homepage
		$('#gallery-homepage').justifiedGallery({
			lastRow : 'justify', 
			rowHeight : 150,
			rel : 'gallery2',
			// margins : 1
			}).on('jg.complete', function () {
			$('#gallery-homepage a').swipebox();
		}); 

		// Masonry
		//    $('#inner-articles').masonry({
		// 	itemSelector: '.my-article1, .my-article2',
		// 	columnWidth: 0,
		// 	animationOptions: {
		// 		duration: 400
		// 	}
		// });
	});

	// dropdown hover navigation
	$('ul.nav li.dropdown').hover(function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(400);
	},function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(400);
	});

	$('#loader_img').hide(); // set loader hide

	// save contact message
	$(document).on('click', '#btn-messages', function(){
		var name = $('#msg-name').val();
		var email = $('#msg-email').val();
		var telp = $('#msg-phone').val();
		var messages = $('#messages').val();

		$('#loader_img').show(); // display loader

		$.ajax({
		    type: "post",
		    url: "save-messages.php",
		    data: "name="+name+"&email="+email+"&phone="+telp+"&messages="+messages,
		   
		    success: function(response) {
		        $('.info-warning').html(response);
		        // $('#contact-messages')[0].reset(); 
		        $('#loader_img').hide();
		    },
		    
		    error: function(jqXHR, status, error) {
		         alert('Gagal dikirim !');   
		    }
		}); // END: ajax  
		return false;       
	});

	// animation
	 var wow = new WOW ({
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       120,          // distance to the element when triggering the animation (default is 0)
        mobile:       false,       // trigger animations on mobile devices (default is true)
        live:         true        // act on asynchronously loaded content (default is true)
      }
    );
    wow.init();

});