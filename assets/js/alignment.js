/**
 * Resize elements on change of window size.
 *
 * @package: pbrocks_fse
 */

jQuery( document ).ready(
	function( $ ) {
		function screenResize() {
			if ( $( 'header > .wp-block-group.site-header.is-style-fixed' ).length ) {
				var adminbarHeight = parseInt( $( '#wpadminbar' ).outerHeight() );
				if ( adminbarHeight > 0 ) {
					  $( 'header > .wp-block-group.site-header.is-style-fixed' ).css( { 'top' : adminbarHeight + 'px' } );
				}
				var stickyHeaderHeight = parseInt( $( 'header > .wp-block-group.site-header.is-style-fixed' ).outerHeight() );
				if ( stickyHeaderHeight > 0 ) {
					$( '.wp-site-blocks' ).css( { 'margin-top' : stickyHeaderHeight + 'px' } );
				}
			}
		}
		screenResize();
		jQuery( window ).resize(
			function() {
				screenResize();
			}
		);
	}
);
