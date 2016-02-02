<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_progress_pie extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function progress_pie($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'percent'       => 75,
            'text'          => '',
            'before'        => '',
            'after'         => '',
            'size'          => 200,
            'line_width'    => 10,
            'text_size'     => 22,
            'align'         => 'center',
            'bar_color'     => '#F14B51',
            'fill_color'    => '#f5f5f5',
            'show_scale'    => 'yes',
            'scale_color'   => '#dddddd',
            'text_color'    => '#bbbbbb',
            'line_cap'      => 'round',
            'animation'     => 'easeInOut',
            'duration'      => 1,
            'delay'         => 0.3,
            'scroll_reveal' => '',
            'class'         => ''
                ), $atts, 'progress_pie');

        $id = uniqid('sud');
        $css[] = '';
        $classes = array('su-progress-pie', 'su-pp-align-' . $atts['align'], su_ecssc($atts));
        $scale = ($atts['show_scale'] === 'yes') ? $atts['scale_color'] : 'false'; 

        if (!$atts['text']) {
            $atts['text'] = $atts['percent'];
            $classes[] = 'su-pp-percent';
        }

        $css[] = '#'.$id.' { width:'. intval($atts['size']). 'px; height:'. intval($atts['size']). 'px;' . '}';
        $css[] = '#'.$id.' .su-pp-tc { color:' . $atts['text_color'] . '; line-height:' . $atts['size'] . 'px; font-size:' . $atts['text_size'] . 'px }';

        // Add CSS and JS in head
        suAsset::addString('css', implode("\n", $css));
        suAsset::addFile('css', 'progress-pie.css', __FUNCTION__);
        
        suAsset::addFile('js', 'jquery.easing.js');
        suAsset::addFile('js', 'jquery.appear.js');
        suAsset::addFile('js', 'easypiechart.js', __FUNCTION__);
        suAsset::addFile('js', 'progress-pie.js', __FUNCTION__);

        $return = '<div'.su_scroll_reveal($atts).' id="'.$id.'" class="'.su_acssc($classes).'" data-percent="' . intval($atts['percent']) . '" data-size="' . intval($atts['size']) . '" data-line_width="' . intval($atts['line_width']) . '" data-line_cap="' . $atts['line_cap'] . '" data-bar_color="' . $atts['bar_color'] . '" data-fill_color="' . $atts['fill_color'] . '" data-scale_color="' . $scale . '" data-animation="' . $atts['animation'] . '" data-delay="' . $atts['delay'] . '" data-duration="' . floatval($atts['duration']) . '">';
            $return .= '<div class="su-pp-tc">';
                $return .= '<span class="su-pp-before">' . $atts['before'] . '</span>';
                $return .= '<span class="su-pp-text">' . $atts['text'] . '</span>';
                $return .= '<span class="su-pp-after">' . $atts['after'] . '</span>';
            $return .= '</div>';
        $return .= '</div>';
        return $return;
    }
}
