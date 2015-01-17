jQuery(window).load(function() {

	if( jQuery('#homepageGallery').length != 0 ){
		jQuery('#homepageGallery').flexslider({
			slideshow:		true,
			autoplay:		true,
			controlNav:		false,
			directionNav:	true
		});
	};

	if( jQuery('#productGallery').length != 0 ){
		jQuery('#productGallery').flexslider({
			slideshow:		false,
			manualControls:	'.flexsliderThumbs ul li',
			controlNav:		true,
			directionNav:	false
		});
	};
	
});

