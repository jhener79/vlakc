<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_column_inner extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    
    public static function column_inner($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'size'          => '1/1',
            'medium'        => '',
            'small'         => '',
            'visible'       => '', // large, medium, small
            'hidden'        => '', // large, medium, small
            'center'        => 'no',
            'scroll_reveal' => '',
            'class'         => ''
                ), $atts, 'column_inner');

        $id = uniqid('sucol');
        $css = array();
        $classes = array('su-column', su_ecssc($atts));

        if ($atts['small']) {
            $classes[] = 'su-column-size-small-' . str_replace('/', '-', $atts['small']);
        } else {
            $classes[] = 'su-column-size-1-1';
        }
        if ($atts['medium']) {
            $classes[] = 'su-column-size-medium-' . str_replace('/', '-', $atts['medium']);
        }
        if ($atts['size'] and $atts['medium']) {
            $classes[] = 'su-column-size-large-' . str_replace('/', '-', $atts['size']);
        } else {
            $classes[] = 'su-column-size-medium-' . str_replace('/', '-', $atts['size']);
        }


        if ($atts['visible']) {
            $classes[] = 'su-visible-' . $atts['visible'];
        }
        if ($atts['hidden']) {
            $classes[] = 'su-hidden-' . $atts['hidden'];
        }

        if ($atts['center'] === 'yes')
            $classes[] = 'su-column-centered';

        suAsset::addFile('css', 'row-column.css');

        return '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="' . su_acssc($classes) . '"><div class="su-column-inner su-clearfix">' . su_do_shortcode($content) . '</div></div>';
    }

}