/* From the group, find the tallest .banner_frame,
 * and return its height (in px, but without the 'px')
*/
var cb_get_tallest_frame = function (group)
{
	var tallest = 0;
	jQuery(group).find('.banner_frame').each(function () {
		if ( jQuery(this).height() > tallest ) {
			tallest = jQuery(this).height();
		}
	});
	return tallest;
};

var cb_determine_height_for_banners = function(img, sentinel)
{
	// if the sentinel exists, use its height
	// otherwise use the image's height + width attrs
	var img_height;
	if ( sentinel.length > 0 ) {
		img_height = sentinel.height();
	} else {
		img_height = img.attr('height');	
	}
	return img_height;
};

var cb_determine_width_for_banners = function(img, sentinel)
{
	// if the sentinel exists, use its height
	// otherwise use the image's height + width attrs
	var img_width;
	if ( sentinel.length > 0 ) {
		img_width = sentinel.width();
	} else {
		img_width = img.attr('width');	
	}
	return img_width;
};

// apply a full_height or full_width class (whichever is the shorter)
var cb_set_banner_class_for_fullsize = function(img, sentinel)
{
	var my_frame = jQuery(img).parents('.banner_frame:first');
	var img = jQuery(img);
	var uniform_height = cb_determine_height_for_banners(img, sentinel);
	var uniform_width = cb_determine_width_for_banners(img, sentinel);
	if ( img.height() < 1 || img.width() < 1 ) {		
		return;
	}
	
	ratio_h = ( my_frame.height() / img.height() );
	ratio_w = ( my_frame.width() / img.width() );
	
	if (ratio_w < ratio_h ) {
		img.removeClass('custom_banners_slide_full_width');
		img.addClass('custom_banners_slide_full_height');
		img.height( uniform_height );
	}
	else {
		img.removeClass('custom_banners_slide_full_height');
		img.addClass('custom_banners_slide_full_width');
		img.width( uniform_width );
	}
};

var cb_fix_slideshows_after_init = function()
{
	jQuery('.custom-banners-cycle-slideshow').each(function () {
		if ( jQuery(this).find('.banner_frame').length == 0 ) {
			return;
		}
		if ( jQuery(this).hasClass('cb_frame_fixed') ) {
			return;
		}
		jQuery(this).addClass('cb_frame_fixed');
		//jQuery(this).gp_cycle('reinit');
		setTimeout(function () {
			cb_fix_frame_dimensions();
		}, 100);
	});
};

/* Sets CSS properties and classes needed to make an individual banner play well 
 * with cycle2 slideshows and its transitions. Should be called for each banner.
 *
 * @param img The banner image to setup
 * @param sentinel The sentinel object for the slideshow (can be an empty group)
 */
var cb_setup_slideshow_banner = function(img, sentinel)
{	
	// fix a couple of CSS properties to make the transitions look right
	// (esp. scrollHoriz). Else the slides sort of stretch out as resize
	var banner_wrapper = img.parents('.banner_wrapper:first');
	cb_fix_frame_dimensions();
	banner_wrapper.css('right', 'auto');		
	
	// setup a callback to apply some needed classes to the banner images
	// if the image is loaded, then we can run the callback now. 
	// else, we'll run the callback when the image finishes loading
	if (img.complete) {
		cb_set_banner_class_for_fullsize.call(img, sentinel);
	} else { 
		jQuery(window).on('load', function () {
			cb_set_banner_class_for_fullsize(img, sentinel);
		});
	}
}

/* Upon initialization and before each slide is shown, update the image
 * sizes and CSS classes to make the transitions run smoothly. (width:100% 
 * causes all kinds of problems with transitions.)
 */
var cb_update_slideshow_image_sizes = function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag){
	var slideshow =  jQuery(this);
	var sentinel = jQuery(this).find('.cycle-sentinel');

	// find the height of the tallest frame, and set all images to this height
	var tallest = cb_get_tallest_frame(this);	
	if (tallest == 0) {
		return;
	}
	slideshow.find('.banner_frame').height(tallest);
	
	slideshow.find('.banner_frame img').each( function () {	
		cb_setup_slideshow_banner( jQuery(this), sentinel );		
		return true;
	} );
	
	slideshow.on('cycle-prev, cycle-next', function () {
		jQuery(this).find('.banner_frame img').each( function () {
			cb_set_banner_class_for_fullsize(jQuery(this), sentinel);
			cb_fix_slideshows_after_init();			
			return true;
		});
	});
	
	cb_fix_slideshows_after_init();
	
};

/* Sets up a series of callbacks to update various image sizes as needed */
var cb_setup_banner_size_callbacks = function ()
{
	jQuery('.custom-banners-cycle-slideshow').each(function () {
		jQuery.call(this, cb_update_slideshow_image_sizes);
		jQuery(this).on('cycle-initialized', cb_update_slideshow_image_sizes);
		jQuery(this).on('cycle-before', cb_update_slideshow_image_sizes);
	});
};

var cb_get_banner_padding = function (banner) {
	return {
		'top' : parseInt( banner.css('padding-top'), 10 ),
		'bottom' : parseInt( banner.css('padding-bottom'), 10 ),
		'left' : parseInt( banner.css('padding-left'), 10 ),
		'right' : parseInt( banner.css('padding-right'), 10 ),
	};
};

var cb_get_banner_margin = function (banner) {
	return {
		'top' : parseInt( banner.css('margin-top'), 10 ),
		'bottom' : parseInt( banner.css('margin-bottom'), 10 ),
		'left' : parseInt( banner.css('margin-left'), 10 ),
		'right' : parseInt( banner.css('margin-right'), 10 ),
	};
};

var cb_get_banner_border = function (banner) {
	return {
		'top' : parseInt( banner.css('border-top'), 10 ),
		'bottom' : parseInt( banner.css('border-bottom'), 10 ),
		'left' : parseInt( banner.css('border-left'), 10 ),
		'right' : parseInt( banner.css('border-right'), 10 ),
	};
};


/* In each slideshow, explicitly set the height& width of the .banner_frame's
 * to the height of the sentinel div 
 */
var cb_fix_frame_dimensions = function ()
{
	jQuery('.custom-banners-cycle-slideshow').each(function () 
	{		
		var sentinel = jQuery(this).find('.cycle-sentinel');
		var first_banner = jQuery(this).find('.banner:first');
		var first_banner_img = jQuery(this).find('.banner:first img');
		var padding = cb_get_banner_padding(first_banner);
		var margin = cb_get_banner_margin(first_banner);
		var total_w_offset = (padding.left + padding.right + margin.left + margin.right);
		var total_h_offset = (padding.top + padding.bottom + margin.top + margin.bottom);
		
		var w = jQuery(this).attr('data-w');
		var h = jQuery(this).attr('data-h');		
		
		if ( typeof( w ) == 'undefined' || typeof( h ) == 'undefined') {
			h = first_banner_img.attr('height') - total_h_offset;
			w = jQuery(this).width() - total_w_offset;
			jQuery(this).attr('data-w', w);
			jQuery(this).attr('data-h', h);
		}
		if ( w > 0 && h > 0 ) {
			jQuery(this).find('.banner_frame')
						.height(h)
						.width(w);
		}
	});
}

/* Updates some CSS properties and sets the dimensions of several
 * banner elements esplicitly, so that our banners play nicely with
 * Cycle2 and its transitions.
 */
var cb_fix_slideshow_banner_css = function () {
	// the ordering of these functions is, sadly, important
	cb_fix_frame_dimensions();
	cb_update_slideshow_image_sizes();
	cb_setup_banner_size_callbacks();
};

jQuery( function () {
	setTimeout(cb_fix_slideshow_banner_css, 100);	
});