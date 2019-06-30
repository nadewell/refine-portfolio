(function ($) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	jQuery(document).ready(function () {
		jQuery('.archive .port-item').each(function () {
			var image = jQuery(this).find('div.port-image');
			image.width(jQuery(this).width()).height(jQuery(this).width());
			image.css('background-image', 'url(' + image.data('image') + ')');
		});
		jQuery('.port-filter > .filter').on('click', function () {
			jQuery('.filter.active').removeClass('active');
			jQuery(this).addClass('active');
			var port_wrapper = jQuery('.refine-portfolio > .portfolio-wrapper');
			var filter = jQuery(this).data('filter');
			if (filter == '*') {
				port_wrapper.isotope({ filter: filter });
			} else {
				port_wrapper.isotope({ filter: '.' + filter });
			}
		});

	});

})(jQuery);
