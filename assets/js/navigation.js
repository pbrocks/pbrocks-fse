/**
 * Add toggle state.
 *
 * @package: pbrocks_fse
 */

jQuery( document ).ready(
	function( $ ) {
		var toggleButton = '<button class="toggle-group dashicons dashicons-menu-alt"></button>';

		$( '.wp-site-blocks .wp-block-group[class*="is-style-toggle-"]' ).prepend( toggleButton );
		$( '.wp-site-blocks .wp-block-group[class*="is-style-toggle-"]' ).addClass( 'is-not-toggled' );

		$( '.toggle-group' ).click(
			function() {
				var groupToggleThis = $( this ).parent( '.wp-block-group' );
				$( groupToggleThis ).toggleClass( 'is-open' );
				$( groupToggleThis ).toggleClass( 'is-not-toggled' );
			}
		);
	}
);
