<?php
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class netcam_shortcodes
{
	function __construct()
	{
		add_shortcode( 'netcam-live', array( &$this, 'netcam_live' ) );
	}

	function netcam_live( $atts )
	{
		$output = '';
		$url = isset( $atts['url'] ) ? trim( $atts['url'] ) : '';
		if( !empty( $url ) )
		{
		// --- Params ---
			$click   = isset( $atts['click'] ) ? !empty( $atts['click'] ) : TRUE;
			$refresh = isset( $atts['refresh'] ) ? intval( $atts['refresh'] ) : 0;
			$width   = isset( $atts['width'] ) ? esc_attr( $atts['width'] ) : '';
			$height  = isset( $atts['height'] ) ? esc_attr( $atts['height'] ) : '';
			$mode    = isset( $atts['mode'] ) ? intval( $atts['mode'] ) : 0;		// Not currently supported
		// ---
			$class = '';
			$style = '';
			if( $click ) $class .= ' click';
			if( !empty( $width  ) )
			{
				if( is_numeric( $width ) ) $width = $width . 'px';
				$style .= "width:$width;";
			}
			if( !empty( $height ) )
			{
				if( is_numeric( $height ) ) $height = $height . 'px';
				$style .= "height:$height;";
			}
			$output  = '<span class="netcam_live' . $class . '" data-mode="' . $mode . '" data-refresh="' . $refresh . '">';
			$output .= '<img style="' . $style . '" src="' . $url . '" alt="Netcam"/>';
			$output .= '</span>';
		}
		return $output;
	}
}

new netcam_shortcodes();
