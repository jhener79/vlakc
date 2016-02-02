<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_panel extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }   
    public static function panel($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'background'    => '',
            'color'         => '',
            'shadow'        => '',
            'padding'       => '',
            'margin'        => '',
            'border'        => '',
            'radius'        => '',
            'text_align'    => 'left',
            'url'           => '',
            'scroll_reveal' => '',
            'class'         => ''
        ), $atts, 'panel');

        $id = uniqid('supnl');
        $padding = '';
        $margin = '';
        $css = array();
        $classes = array('su-panel', su_ecssc($atts));
        
        if ($atts['url']) {
            $classes[] = 'su-panel-clickable';
            suAsset::addFile('js', 'panel.js', __FUNCTION__);
        }
        if ($atts['padding'] != '' and !intval($atts['padding'])) {
            $padding = 'padding:'.$atts['padding'].'px;';
        } elseif ($atts['padding'] != '') {
            $padding = 'padding:'.$atts['padding'].';';
        }
        if ($atts['margin'] != '') {
            $margin = 'margin:'.$atts['margin'].';';
        }

        $radius     = ($atts['radius']) ? '-webkit-border-radius:' . $atts['radius'] . ';border-radius:' . $atts['radius'] . ';' : '';
        $border     = ($atts['border'] != '') ? 'border:' . $atts['border'] . ';' : '';
        $shadow     = ($atts['shadow'] != '') ? '-webkit-box-shadow:' . $atts['shadow'] . ';box-shadow:' . $atts['shadow'] . ';' : '';
        $background = ($atts['background'] != '') ? 'background-color:' . $atts['background'] . ';' : '';
        $color      = ($atts['color'] != '') ? 'color:' . $atts['color'] . ';' : '';
        $classes[]  = ($atts['text_align']) ? 'sup-align-' . $atts['text_align'] : '';

        if ($radius or $border or $shadow or $background or $color) 
            $css[] = '#'.$id.'.su-panel { '.$background. $color. $border . $shadow . $radius. $margin. '}';

        if ($atts['text_align'] or $atts['padding'] != '')
            $css[] = '#'.$id.'.su-panel .su-panel-content { '.$padding.'}';

        suAsset::addFile('css', 'panel.css', __FUNCTION__);
        suAsset::addString('css', implode("\n", $css));
        
        $return = '<div id="'.$id.'"'.su_scroll_reveal($atts).' class="' . su_acssc($classes) . '" data-url="' . $atts['url'] . '"><div class="su-panel-content su-content-wrap">' . su_do_shortcode($content) . '</div></div>';
        return $return;
    }
}
