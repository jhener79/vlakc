<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_row extends Su_Shortcodes {

    static $match_height = '';

    function __construct() {
        parent::__construct();
    }   
    public static function row($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'gutter'        => '',
            'divider'       => 'no',
            'divider_color' => '',
            'margin_bottom' => 'yes',
            'margin_top'    => 'no',
            'equal_height'  => 'no',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts);

        $id = uniqid('surow');


        $divider = ($atts['divider'] === 'yes') ? 'has-divider' : '' ;
        $margin_top = ($atts['margin_top'] === 'yes') ? 'margin-top-yes' : '' ;
        $margin_bottom = ($atts['margin_bottom'] === 'yes') ? 'margin-bottom-yes' : '' ;
        $gutter = ($atts['gutter']) ? 'su-gutter-'.$atts['gutter'] : '' ;
        $classes = array('su-row', $margin_top, $margin_bottom, $divider, $gutter, su_ecssc($atts));

        $classes[] = ($atts['equal_height'] === 'yes') ? 'su-row-match' : '';      



        return '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="'.su_acssc($classes).'">' . su_do_shortcode($content) . '</div>';
    }
}
