<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_calltoaction extends Su_Shortcodes {

    function __construct() {
      parent::__construct();
    }
    public static function calltoaction($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'title'                   => 'This is Call To Action Title',
            'title_color'             => '#ffffff',
            'button_text'             => 'Click Here',
            'align'                   => 'default',
            'button_link'             => '#',
            'target'                  => 'self',
            'color'                   => '#ddd',
            'background'              => '#2D89EF',
            'button_color'            => '#fff',
            'button_background'       => '#165194',
            'button_background_hover' => '',
            'radius'                  => '3px',
            'button_radius'           => '3px',
            'desc'                    => '',
            'scroll_reveal'           => '',
            'class'                   => ''
        ), $atts, 'calltoaction');

        $id = uniqid('suca_');
        $css = array();
        $padding = '';

        $title  = ($atts['title']) ? "<h3>" . $atts['title'] . "</h3>" : '';
        $target = ( $atts['target'] === 'yes' || $atts['target'] === 'blank' ) ? ' target="_blank"' : 'target="_self"';
        $bdt_hbg = ($atts['button_background_hover']) ? $atts['button_background_hover'] : su_color::lighten($atts['button_background'], '5%');

        if (intval($atts['radius']) > 40 && intval($atts['button_radius']) > 40) {
            $padding = "padding: 20px 20px 20px 40px;";
        }

        $css[] = '#'.$id.' {'.$padding.' background-color:' . $atts['background'].'; border-radius:' . $atts['radius'] . '; }';
        $css[] = '#'.$id.' a.cta-dbtn { border-radius:' . $atts['button_radius'] . '; color:' . $atts['button_color'] . '; background:' . $atts['button_background'] . ';}';
        $css[] = '#'.$id.' a.cta-dbtn:hover { background:' . $bdt_hbg . ';}';
        $css[] = '#'.$id.' .cta-content > h3 { color: '.$atts['title_color'].';}';
        $css[] = '#'.$id.' .cta-content div { color:' . $atts['color'].';}';


        suAsset::addFile('css', 'call-to-action.css', 'calltoaction');
        suAsset::addString('css', implode("\n", $css));

        $return  = '<section id="'.$id.'"'.su_scroll_reveal($atts).' class="call-to-action'.su_ecssc($atts).' cta-align-'. $atts['align'] .'">';
        $return .= "<a class='cta-dbtn hidden-phone' " .$target . " href='" . $atts['button_link'] . "'>" . $atts['button_text'] . "</a>";
        $return .= "<div class='cta-content'>" . $title ."<div>". su_do_shortcode($content) . '</div></div>';        
        $return .= "<a class='cta-dbtn visible-phone' " . $target . " href='" . $atts['button_link'] . "'>" . $atts['button_text'] . "</a>";
        $return .= '<div class="clear"></div></section>';

        return $return;
    }
}
