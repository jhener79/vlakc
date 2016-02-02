<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_spacer extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function spacer($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'size'  => '20',
            'class' => ''
        ), $atts, 'spacer');

        suAsset::addFile('css', 'spacer.css', __FUNCTION__);
        
        return '<div class="su-spacer' . su_ecssc($atts) . '" style="height:' . intval($atts['size']) . 'px"></div>';
    }
}
