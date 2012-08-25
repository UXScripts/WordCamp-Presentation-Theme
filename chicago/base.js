jQuery(document).ready(function($){

	/**
	 * Make a couple of adjustments to height of things.
	 */
	var window_height = $(window).height() - 164;
	$('#slide').css({ 'height' : window_height });
	
	/**
	 * Target the keydown event to shift to the next or previous slide.
	 */
	$(document).on('keydown', function(e){
		var hasScrollBar = $(document).outerHeight() > $(window).height();
		if ( 37 == e.keyCode || 38 == e.keyCode ) {
			var previous_slide = $(this).find('#previous-slide a').attr('href');
			if ( previous_slide ) {
				if ( hasScrollBar )
					$('#presentation .wrap').css({ 'height' : $(document).outerHeight() });
				$('#slide-link a').attr('href', previous_slide);
				$('#loading').show();
				$('#slide').fadeOut('fast', function(){
					$(this).load(previous_slide + ' #slide', function(){
						$('#slide-count .current').text(parseInt($('#slide-count .current').text()) - 1);
						$('#slide').fadeIn('fast', function(){
							if ( hasScrollBar )
								$('#presentation .wrap').removeAttr('style');
							if ( 0 !== $(window).scrollTop() )
								$('html, body').animate({ scrollTop : 0 }, 'normal');
							$('#loading').hide();
						});
					});
				});
			}
			return false;
		}
		if ( 39 == e.keyCode || 40 == e.keyCode ) {
			var next_slide = $(this).find('#next-slide a').attr('href');
			if ( next_slide ) {
				if ( hasScrollBar )
					$('#presentation .wrap').css({ 'height' : $(document).outerHeight() });
				$('#slide-link a').attr('href', next_slide);
				$('#loading').show();
				$('#slide').fadeOut('fast', function(){
					$(this).load(next_slide + ' #slide', function(){
						$('#slide-count .current').text(parseInt($('#slide-count .current').text()) + 1);
						$('#slide').fadeIn('fast', function(){
							if ( hasScrollBar )
								$('#presentation .wrap').removeAttr('style');
							if ( 0 !== $(window).scrollTop() )
								$('html, body').animate({ scrollTop : 0 }, 'normal');
							$('#loading').hide();
						});
					});
				});
			}
			return false;
		}
	});
	
	/**
	 * Show copy notice when users hovers over a link.
	 */
	$('body').on('mouseenter mouseleave', '#slide-link a', function(e){
		if ( 'mouseenter' == e.type )
			$(this).parent().next().stop().animate({ left : '65px', opacity: '1' });
		else
			$(this).parent().next().stop().animate({ left : '0', opacity : '0' });
	});
	
	/**
	 * Show copy notice when users hovers over a link.
	 */
	$('#slide-link a').zclip({
		path: tgmch.url + '/ZeroClipboard.swf',
		copy: function(){
			return $(this).attr('href');
		},
		afterCopy: function(){
			$('#copy-notice').text('Link copied successfully!');
			setTimeout(function(){
				$('#copy-notice').animate({ left : '0', opacity : '0' }, 400, function(){
					$(this).text('Click to copy a link of this slide to your clipboard.');
				})
			}, 1000);
		}
	});

});