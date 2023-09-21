<?php
/**
 * @package Nexgen
 */

$GLOBALS['custom_style'] = false;

function nxg_get_theme_style() {

  $main = get_field( 'nxg_global_style_main', 'option' );

	if ( $main ) {

    $style = ':root{';

		$primary_color = $main['primary_color'];

		if ( $primary_color ) {
			$style .= '--nxg-primary-color:'.$primary_color.';';
		}

		$secondary_color = $main['secondary_color'];

		if ( $secondary_color ) {
			$style .= '--nxg-secondary-color:'.$secondary_color.';';
		}

		$tertiary_color = $main['tertiary_color'];

		if ( $tertiary_color ) {
			$style .= '--nxg-tertiary-color:'.$tertiary_color.';';
			$style .= '--nxg-quaternary-color:'.$tertiary_color.'f7;';
		}

		$background = get_field( 'nxg_global_style_background', 'option' );

		if ( $background ) {

			$white_color = $background['white_color'];

			if ( $white_color ) {
				$style .= '--white-bg-color:'.$white_color.';';
			}

			$light_color = $background['light_color'];

			if ( $light_color ) {
				$style .= '--light-bg-color:'.$light_color.';';
			}

			$dark_color = $background['dark_color'];

			if ( $dark_color ) {
				$style .= '--dark-bg-color:'.$dark_color.';';
			}
		}
    
    $text = get_field( 'nxg_global_style_text', 'option' );
    
    if ( $text ) {
    
      $white_color = $text['white_color'];
    
      if ( $white_color ) {
        $style .= '--white-text-color:'.$white_color.';';
      }
    
      $light_color = $text['light_color'];
    
      if ( $light_color ) {
        $style .= '--light-text-color:'.$light_color.';';
      }
    
    	$dark_color = $text['dark_color'];
    
      if ( $dark_color ) {
        $style .= '--dark-text-color:'.$dark_color.';';
      }
    }
    
		$alert = get_field( 'nxg_global_style_alert', 'option' );

		if ( $alert ) {

			$success_color = $alert['success_color'];

			if ( $success_color ) {
				$style .= '--success-color:'.$success_color.';';
			}

			$warning_color = $alert['warning_color'];

			if ( $warning_color ) {
				$style .= '--warning-color:'.$warning_color.';';
			}

			$danger_color = $alert['danger_color'];

			if ( $danger_color ) {
				$style .= '--danger-color:'.$danger_color.';';
			}
		}
		
		$GLOBALS['custom_style'] .= $style.'}';
  }
}

function nxg_get_section_style( $field, $elem, $container = null ) {

	if ( $field ) {

		if ( $container ) {

			$style = $container.'{';

			// Layout
			$max_width  = $field['max_width'] ?? null;
			$min_height = $field['min_height'] ?? null;

			if ( $max_width ) {
				$style .= 'max-width:'.$max_width.'px;';
			}

			if ( $min_height ) {
				$style .= 'min-height:'.$min_height.'vh;';
			}

			$GLOBALS['custom_style'] .= $style.'}';
		}

		$style = $elem.'{';

		// Layout
		$vertical_padding = $field['vertical_padding'] ?? null;

		if ( $vertical_padding ) {
			$style .= 'padding:'.$vertical_padding.'px 0;';
		}

		// Design
		$background_image = $field['background_image'] ?? null;

		if ( $background_image ) {
			$style .= 'background-image:url('.$background_image.');';
		}

		// Color
		$background_color = $field['background_color'] ?? null;

		if ( $background_color ) {
			$style .= 'background-color:'.$background_color.';';
		}

		// Gradient Color
		$primary_color   = $field['primary_color'] ?? null;
		$secondary_color = $field['secondary_color'] ?? null;
		$gradient_angle  = $field['gradient_angle'] ?? null;

		if ( $primary_color && $secondary_color ) {
			$style .= 'background-color:transparent;';
			$style .= 'background-image: linear-gradient('.$gradient_angle.'deg, '.$primary_color.' 0%, '.$secondary_color.' 100%);';
		}
	
		$GLOBALS['custom_style'] .= $style.'}';

		// Holder
		if ( isset( $field['background_color_holder'] ) ) {

			$style = '.navbar-holder{';

			// Color
			$background_color = $field['background_color_holder'];
	
			if ( $background_color ) {
				$style .= 'background-color:'.$background_color.';';
			}
		
			$GLOBALS['custom_style'] .= $style.'}';
		}

		// Sticky
		if ( isset( $field['background_color_sticky'] ) ) {

			$style = $elem.'.navbar-sticky{';

			// Color
			$background_color = $field['background_color_sticky'];
	
			if ( $background_color ) {
				$style .= 'background-color:'.$background_color.';';
			}
		
			$GLOBALS['custom_style'] .= $style.'}';
		}

		// Dropdown
		if ( isset( $field['background_color_dropdown'] ) ) {

			$style = $elem.' .dropdown .dropdown-menu{';

			// Color
			$background_color = $field['background_color_dropdown'];
	
			if ( $background_color ) {
				$style .= 'background-color:'.$background_color.';';
			}
		
			$GLOBALS['custom_style'] .= $style.'}';
		}
	}
}

function nxg_get_block_style( $field, $elem, $image = null, $item = null ) {

	if ( $field ) {

		// Image
		if ( $image ) {

			$style = $image.'{';

			// Layout
			$min_height = $field['min_height'] ?? null;

			if ( $min_height ) {
				$style .= 'min-height:'.$min_height.'px;';
			}

			$GLOBALS['custom_style'] .= $style.'}';
		}

		// Item
		if ( $item ) {

			$style = $item.'{';

			// Layout
			$space_between = $field['space_between'] ?? null;

			if ( $space_between ) {
				$style .= 'padding-right:'.$space_between.'px;padding-left:'.$space_between.'px;';
			}

			$GLOBALS['custom_style'] .= $style.'}';
		}

		$style = $elem.'{';

		// Color
		$background_color = $field['background_color'];

		if ( $background_color ) {
			$style .= 'background-color:'.$background_color.';';
		}
	
		$GLOBALS['custom_style'] .= $style.'}';
	}
}

function nxg_get_image_style( $field, $elem ) {

	if ( $field ) {

		$style = $elem.'{';

		// Layout
		$width_type = $field['width_type'];
		$width      = $field['width'];
		$height     = $field['height'];

		if ( $width_type && $width_type  === 'custom' && $width ) {
			$style .= 'width:'.$width.'px;';
		}

		if ( $height ) {
			$style .= 'height:'.$height.'px;';
		}

		$GLOBALS['custom_style'] .= $style.'}';

		// Mobile
		$width_type = $field['width_type_mobile'];
		$width      = $field['width_mobile'];
		$height     = $field['height_mobile'];

		$style = '@media(max-width:768px){';
		$style .= $elem.'{';

		if ( $width_type && $width_type  === 'custom' && $width ) {
			$style .= 'width:'.$width.'px;';
		}

		if ( $height ) {
			$style .= 'height:'.$height.'px;';
		}

		$GLOBALS['custom_style'] .= $style.'}}';
	}
}

function nxg_get_text_style( $field, $elem, $name ) {

	if ( $field ) {

		$style = $elem.'{';

		// Color
		$color = $field['text_color'];

		if ( $color ) {
			$style .= 'color:'.$color.';';
		}

		// Typography
		$font_type   = $field['font_type'];
		$font_family = $field['font_family'];
		$custom_font = $field['custom_font'];
		$font_style  = $field['font_style'];
		$font_size   = $field['font_size'];
		$font_weight = $field['font_weight'];
		$line_height = $field['line_height'];

		if ( $font_type === 'google' ) {
			wp_enqueue_style( sanitize_title( $font_family ), nxg_google_fonts_url( $font_family ), array(), wp_get_theme('nexgen')->get( 'Version' ) );
			$style .= 'font-family:'.$font_family.',sans-serif;';
		
		} elseif ( $font_type === 'custom' && isset( $custom_font ) ) {
			$GLOBALS['custom_style'] .= '@font-face{font-family:"'.$name.'-custom-font";src:url("'.$custom_font.'")format("woff");}';
			$style .= 'font-family:'.$name.'-custom-font;';
		}

		$style .= 'font-style:'.$font_style.';';
		$style .= 'font-size:'.$font_size.'rem;';
		$style .= 'font-weight:'.$font_weight.';';
		$style .= 'line-height:'.$line_height.';';

		$GLOBALS['custom_style'] .= $style.'}';

		// Mobile
		$font_size   = $field['font_size_mobile'];
		$font_weight = $field['font_weight_mobile'];
		$line_height = $field['line_height_mobile'];

		$style = '@media(max-width:768px){';
		$style .= $elem.'{';

		$style .= 'font-style:'.$font_style.';';
		$style .= 'font-size:'.$font_size.'rem!important;';
		$style .= 'font-weight:'.$font_weight.';';

		$GLOBALS['custom_style'] .= $style.'}}';
	}
}

function nxg_get_link_style( $field, $elem, $elem_hover, $name, $elem_custom = null ) {

	if ( $field ) {

		$style = $elem.'{';
	
		// Layout
		$space_between = $field['space_between'] ?? null;

		if ( $space_between ) {
			$style .= 'padding-right:'.$space_between.'px;padding-left:'.$space_between.'px;';
		}

		// Color
		$text_color = $field['text_color'];

		if ( $text_color ) {
			$style .= 'color:'.$text_color.';';
		}

		// Typography
		$font_type   = $field['font_type'];
		$font_family = $field['font_family'];
		$custom_font = $field['custom_font'];
		$font_style  = $field['font_style'];
		$font_size   = $field['font_size'];
		$font_weight = $field['font_weight'];
		$line_height = $field['line_height'];

		if ( $font_type === 'google' ) {
			wp_enqueue_style( sanitize_title( $font_family ), nxg_google_fonts_url( $font_family ), array(), wp_get_theme('nexgen')->get( 'Version' ) );
			$style .= 'font-family:'.$font_family.',sans-serif;';
		
		} elseif ( $font_type === 'custom' && isset( $custom_font ) ) {
			$GLOBALS['custom_style'] .= '@font-face{font-family:"'.$name.'-custom-font";src:url("'.$custom_font.'")format("woff");}';
			$style .= 'font-family:'.$name.'-custom-font;';
		}

		$style .= 'font-style:'.$font_style.';';
		$style .= 'font-size:'.$font_size.'rem;';
		$style .= 'font-weight:'.$font_weight.';';
		$style .= 'line-height:'.$line_height.';';

		$GLOBALS['custom_style'] .= $style.'}';

		$style = $elem_hover.'{';

		// Hover
		$text_hover_color = $field['text_hover_color'];

		if ( $text_hover_color ) {
			$style .= 'color:'.$text_hover_color.';';
		}

		$GLOBALS['custom_style'] .= $style.'}';		

		// Button
		if ( $space_between ) {

			$style = $elem_custom.'{';
			$style .= 'margin-right:'.$space_between.'px;margin-left:'.$space_between.'px;';

			$GLOBALS['custom_style'] .= $style.'}';
		}
	}
}

function nxg_get_button_style( $field, $elem, $elem_hover, $name ) {

	if ( $field ) {

		$style = $elem.'{';

		// Color
		$background_color = $field['background_color'];
		$text_color       = $field['text_color'];
        
		if ( $background_color ) {
			$style .= 'background-color:'.$background_color.';';
			$style .= 'border-color:'.$background_color.';';
		}

		if ( $text_color ) {
			$style .= 'color:'.$text_color.';';
		}

		// Typography
		$font_type   = $field['font_type'];
		$font_family = $field['font_family'];
		$custom_font = $field['custom_font'];
		$font_style  = $field['font_style'];
		$font_size   = $field['font_size'];
		$font_weight = $field['font_weight'];
		$line_height = $field['line_height'];

		if ( $font_type === 'google' ) {
			wp_enqueue_style( sanitize_title( $font_family ), nxg_google_fonts_url( $font_family ), array(), wp_get_theme('nexgen')->get( 'Version' ) );
			$style .= 'font-family:'.$font_family.',sans-serif;';
		
		} elseif ( $font_type === 'custom' && isset( $custom_font ) ) {
			$GLOBALS['custom_style'] .= '@font-face{font-family:"'.$name.'-custom-font";src:url("'.$custom_font.'")format("woff");}';
			$style .= 'font-family:'.$name.'-custom-font;';
		}

		$style .= 'font-style:'.$font_style.';';
		$style .= 'font-size:'.$font_size.'rem;';
		$style .= 'font-weight:'.$font_weight.';';
		$style .= 'line-height:'.$line_height.';';

		$GLOBALS['custom_style'] .= $style.'}';

		$style = $elem_hover.'{';

		// Hover
		$background_hover_color = $field['background_hover_color'];

		if ( $background_hover_color ) {
			$style .= 'background-color:'.$background_hover_color.';';
			$style .= 'border-color:'.$background_hover_color.';';
			$style .= 'color:'.$text_color.';';
		}

		$GLOBALS['custom_style'] .= $style.'}';
	}
}

function nxg_get_field_style( $field, $elem, $elem_hover, $elem_placeholder, $name ) {

	if ( $field ) {

		$style = $elem.'{';

		// Color
		$background_color = $field['background_color'];
		$text_color       = $field['text_color'];
        
		if ( $background_color ) {
			$style .= 'background-color:'.$background_color.';';
		}

		if ( $text_color ) {
			$style .= 'color:'.$text_color.';';
		}

		// Typography
		$font_type   = $field['font_type'];
		$font_family = $field['font_family'];
		$custom_font = $field['custom_font'];
		$font_style  = $field['font_style'];
		$font_size   = $field['font_size'];
		$font_weight = $field['font_weight'];
		$line_height = $field['line_height'];

		if ( $font_type === 'google' ) {
			wp_enqueue_style( sanitize_title( $font_family ), nxg_google_fonts_url( $font_family ), array(), wp_get_theme('nexgen')->get( 'Version' ) );
			$style .= 'font-family:'.$font_family.',sans-serif;';
		
		} elseif ( $font_type === 'custom' && isset( $custom_font ) ) {
			$GLOBALS['custom_style'] .= '@font-face{font-family:"'.$name.'-custom-font";src:url("'.$custom_font.'")format("woff");}';
			$style .= 'font-family:'.$name.'-custom-font;';
		}

		$style .= 'font-style:'.$font_style.';';
		$style .= 'font-size:'.$font_size.'rem;';
		$style .= 'font-weight:'.$font_weight.';';
		$style .= 'line-height:'.$line_height.';';

		$GLOBALS['custom_style'] .= $style.'}';

		$style = $elem_hover.'{';

		// Hover
		$background_focus_color = $field['background_focus_color'];

		if ( $background_focus_color ) {
			$style .= 'background-color:'.$background_focus_color.';';
		}

		$GLOBALS['custom_style'] .= $style.'}';
		
		$style = $elem_placeholder.'{';
        
		// Placeholder
		if ( $text_color ) {
			$style .= 'color:'.$text_color.';';
		}
		
		$GLOBALS['custom_style'] .= $style.'}';
	}
}

function nxg_get_icon_style( $field, $elem, $elem_hover = null ) {

	if ( $field ) {

		$style = $elem.'{';
	
		// Color
    $background_color = $field['background_color'] ?? null;
		$icon_color = $field['icon_color'];

		if ( $background_color ) {
			$style .= 'background-color:'.$background_color.';';
			$style .= 'border-color:'.$background_color.';';
		}

		if ( $icon_color ) {
			$style .= 'color:'.$icon_color.';';
		}

		$GLOBALS['custom_style'] .= $style.'}';

		$style = $elem_hover.'{';

		// Hover
		$icon_hover_color = $field['icon_hover_color'] ?? null;

		if ( $icon_hover_color ) {
			$style .= 'color:'.$icon_hover_color.';';
		}

		$GLOBALS['custom_style'] .= $style.'}';
	}
}

function nxg_get_pagination_style( $field, $elem, $elem_background, $elem_hover ) {

	if ( $field ) {

		$style = $elem.'{';
	
		// Color
		$text_color = $field['text_color'];

		if ( $text_color ) {
			$style .= 'color:'.$text_color.';';
		}

		$GLOBALS['custom_style'] .= $style.'}';

		$style = $elem_background.'{';

		// Current
		$accent_color = $field['accent_color'];

		if ( $accent_color ) {
			$style .= 'background-color:'.$accent_color.';';
		}

		$GLOBALS['custom_style'] .= $style.'}';

		$style = $elem_hover.'{';

		// Hover
		$accent_color = $field['accent_color'];

		if ( $accent_color ) {
			$style .= 'color:'.$accent_color.';';
		}

		$GLOBALS['custom_style'] .= $style.'}';
	}
}

function nxg_get_divider_style( $field, $elem ) {

	if ( $field ) {

		$style = $elem.'{';
	
		// Color
		$divider_color = $field['divider_color'];

		if ( $divider_color ) {
			$style .= 'fill:'.$divider_color.';';
		}

		$GLOBALS['custom_style'] .= $style.'}';
	}
}