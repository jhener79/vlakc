<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_testimonial extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function testimonial($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'style'         => '1',
            'name'          => '',
            'title'         => '',
            'photo'         => '',
            'company'       => '',
            'url'           => '',
            'target'        => 'blank',
            'italic'        => 'no',
            'background'    => '',
            'color'         => '',
            'border_color'  => '',
            'radius'        => '0px',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'testimonial');

        $id = uniqid('sutm');
        $cite = '';
        $title = '';
        $name = '';
        $company = '';
        $photo = '';
        $css = array();


        if (!$atts['title'] && !$atts['name'] && !$atts['photo'] && !$atts['company']) {
          $atts['class'] .= ' su-testimonial-no-cite';  
        }
        else {
            if ($atts['photo']) {
                $atts['class'] .= ' su-testimonial-has-photo';
                $photo = '<div class="su-testimonial-photo"> <img src="' . image_media($atts['photo']) . '" alt="' . esc_attr($atts['name']) . '" /></div>';
            }

            if ($atts['title']) {
                $title = '<span class="su-testimonial-title">' . $atts['title'] . '</span>';
            }
            if ($atts['name']) {
                $name = '<span class="su-testimonial-name">' . $atts['name'] . '</span>';
            }
            if ($atts['company']) {
                $company = ( $atts['url'] ) ? '<a href="' . $atts['url'] . '" class="su-testimonial-company" target="_' . $atts['target'] . '">' . $atts['company'] . '</a>' : '<span class="su-testimonial-company">' . $atts['company'] . '</span>';
                if ($atts['title'])
                    $company = ' - ' . $company;
            } 
            
            $cite = "<div class='su-testimonial-cite'>{$name}{$title}{$company}</div>"; 
        }

        $italic = ($atts['italic'] == 'yes') ? 'su-testimonial-italic' : '';

        if ($atts['radius'] != '0px') {
            $css[] = '#'.$id.' .su-content-wrap { border-radius:' .$atts['radius']. '}'; 
        }
        if ($atts['background'] or $atts['color']) {
    		$css[] = '#'.$id.' .su-content-wrap {background-color:' .$atts['background']. ';color:' .$atts['color']. ';}';
        }

		if ($atts['style'] == 1) {
			$css[] = '#'.$id.'.su-testimonial-style-1 .su-testimonial-text {border-color:'.$atts['border_color'].';}';
			$css[] = '#'.$id.'.su-testimonial-style-1 .su-testimonial-text:before {border-top-color:'.$atts['border_color'].';}';
			$css[] = '#'.$id.'.su-testimonial-style-1 .su-testimonial-text:after {border-top-color:' .$atts['background']. ';}';
        }

        if ($atts['style'] == 2) {
            $css[] = '#'.$id.'.su-testimonial-style-2 .su-testimonial-text:before {border-top-color:'.$atts['border_color'].';}';
            $css[] = '#'.$id.'.su-testimonial-style-2 .su-testimonial-text:after {border-top-color:' .$atts['background']. ';}';
            if ($atts['border_color'] != '' )
                $css[] = '#'.$id.'.su-testimonial-style-2 .su-testimonial-text {box-shadow: -4px 0px 0 '.$atts['border_color'].';}';
        }

        if ($atts['style'] == 4) {
            if ($atts['background']) {
                $css[] = '#'.$id.'.su-testimonial-style-4 .su-testimonial-text:after {border-top-color:'.$atts['background'].';}';
            }
            if ($atts['border_color']) {
                $css[] = '#'.$id.'.su-testimonial-style-4 .su-testimonial-text {border-bottom-color:'.$atts['border_color'].';}';
    			$css[] = '#'.$id.'.su-testimonial-style-4 .su-testimonial-text:before {border-top-color:'.$atts['border_color'].';}';
            }
        }
		
        suAsset::addString('css', implode("\n", $css));            
        suAsset::addFile('css', 'testimonial.css', __FUNCTION__);

        $return = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="su-testimonial' . su_ecssc($atts) . ' su-testimonial-style-'.$atts['style']. ' '.$italic.'">';
            $return .= '<div class="su-testimonial-text su-content-wrap">';
                if ($atts['style'] == 4) {
                    $return .= $photo;
                }
                $return .= '<span class="quote"></span>' . su_do_shortcode($content);
            $return .= '</div>';
                if ($atts['style'] != 4) {
                    $return .= $photo;
                }
            $return .= $cite;
        $return .= '</div>';
                
        return $return;
    }
}
