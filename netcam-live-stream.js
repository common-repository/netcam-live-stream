/**
 * Plugin Name: Netcam Live Stream
 * Author: Mattia Roccoberton
 * Author URI: http://blocknot.es
 * License: GPL3
 */
jQuery(document).ready( function() {
	var netcams = [];

	function live1( id )
	{
		if( netcams[id].loaded )
		{
			netcams[id].loaded = false;
			netcams[id].cnt++;
			var elem = jQuery('.netcam_live').eq( id );
			var img_id = 'img' + id + '_' + netcams[id].cnt;
			elem.append( '<img id="' + img_id + '" src="' + netcams[id].url + Math.random() + '" style="display:none;' + netcams[id].style + '" alt="Netcam" />' );
			//jQuery('#'+img_id).load( function() {
			imagesLoaded( '#' + img_id, function() {
				netcams[id].loaded = true;
				elem.children(':first').remove();
				jQuery('#'+img_id).show();
			});
		}
	}

	jQuery('.netcam_live').each( function( i ) {
		var img = jQuery(this).children(':first');
		var u = img.attr( 'src' );
		var t = ( u.indexOf( '?' ) > 0 ) ? t = '&t=' : '?t=';
		var m = jQuery(this).attr( 'data-mode' );
		var r = jQuery(this).attr( 'data-refresh' );
		if( r < 100 ) r = 1000;
		jQuery(this).attr( 'data-id', i );
		netcams[i] = { url: u + t, timer: null, style: img.attr( 'style' ), refresh: r, mode: m, loaded: true, cnt: 0 };
		netcams[i].timer = setInterval( function() {
			live1( i );
		}, netcams[i].refresh );
		if( jQuery(this).hasClass( 'click' ) )
		{	// click to freeze
			jQuery(this).click( function( e ) {
				e.preventDefault();
				var id = jQuery(this).attr( 'data-id' );
				if( netcams[id].timer != null )
				{
					clearInterval( netcams[id].timer );
					netcams[id].timer = null;
					jQuery(this).addClass( 'freeze' );
				}
				else
				{
					netcams[id].timer = setInterval( function() {
						live1( id );
					}, netcams[i].refresh );
					jQuery(this).removeClass( 'freeze' );
				}
			});
		}
	});
});
