(function ($) {
	$( document ).ready(function() {
		$('.webshoplocatie-banner .wl-whatsthis').click(function(e){
			e.preventDefault();
			let moseLeft = e.clientX - 36;
			if($(window).width() > 768){
				// only on desktop
				$('.wl-explanation').css({left: moseLeft +'px'});
			}
			$('.webshoplocatie-banner .wl-explanation').toggleClass('show');
		});
		$('.webshoplocatie-banner .wl-close').click(function(e){
			e.preventDefault();
			$('.webshoplocatie-banner .wl-explanation').toggleClass('show');
		});
	});

})(jQuery);