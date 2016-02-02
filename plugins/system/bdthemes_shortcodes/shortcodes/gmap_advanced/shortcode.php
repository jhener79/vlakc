<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_gmap_advanced extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }
    public static function gmap_advanced($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'width'               => 600,
            'height'              => 400,
            'border'              => '0px solid #ccc',
            'lat'                 => '24.824874643579022',
            'lng'                 => '89.38262999446634',
            'zoom'                => '16',  
            'zoom_on_scroll'      => 'false',      
            'responsive'          => 'yes',
            'pan_control'         => 'yes',
            'street_view_control' => 'yes',
            'map_location_marker' => 'yes',
            'address'             => '',
            'custom_marker'       => '',
            'zoom_control'        => '1',
            'zoom_control_style'  => 'SMALL',
            'map_as_background'   => 'no',
            'map_type'            => '',
            'scroll_reveal'       => '',
            'class'               => ''
                ), $atts, 'gmap');


        $atts['zoom_control']        = ($atts['zoom_control']=='yes') ? "true" : 'false';
        $atts['pan_control']         = ($atts['pan_control']=='yes') ? "true" : 'false';
        $atts['street_view_control'] = ($atts['street_view_control']=='yes') ? "true" : 'false';
        $atts['zoom_on_scroll'] = ($atts['zoom_on_scroll']=='yes') ? "true" : 'false';


        if ($atts['address'] && $atts['map_location_marker']) {
            $atts['address'] = 'infoWindow: { content: "'.$atts['address'].'" }';                                           
        }
        else {
            $atts['address'] ='';
        } 
        if($atts['map_location_marker']=='yes') {
            $custom_marker = ($atts['custom_marker']) ? 'icon:"'. image_media($atts['custom_marker']) .'",' : '';
            $atts['map_location_marker'] = 'map.addMarker({ lat: '.$atts['lat'].', lng: '.$atts['lng'].','.$custom_marker.$atts['address'] .'});';
        }
        else {
            $atts['map_location_marker'] = '';                                                                                     
        }

        $atts['width'] = ($atts['responsive']=='yes') ? "auto;" : $atts['width'].'px;' ;                                           

        $unique_id = uniqid('gmap_');

        $atts['zoom_control_style'] = ($atts['zoom_control_style']) ? "zoomControlOpt: {
                    style : '".($atts['zoom_control_style'])."',
                    position: 'TOP_LEFT'  
                },": "";
        $map_as_background=($atts['map_as_background']=='yes')? 'map-as-background' : '';

        if (@$_REQUEST["action"] == 'su_generator_preview') {
            return alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GMAPA_NOT_WORKING'));
        }
        
        suAsset::addFile('css', 'gmap_advanced.css', __FUNCTION__);
        
        // Prepare protocol
        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? "https://" : "http://";
        
        JFactory::getDocument()->addScript($protocol . 'maps.google.com/maps/api/js?sensor=true');

        suAsset::addFile('js', 'gmap-styles.js', __FUNCTION__);
        suAsset::addFile('js', 'gmaps.js', __FUNCTION__);
        suAsset::addFile('js', 'gmap_advanced.js', __FUNCTION__);
        suAsset::addFile('css', 'gmap_advanced.css', __FUNCTION__);

        $script = '
            jQuery(document).ready(function(){
                var map;
                map = new GMaps({
                    el: '.$unique_id.',
                    lat: '. $atts['lat'].',
                    lng: '. $atts['lng'].',
                    zoomControl : '. $atts['zoom_control'].',
                    mapType: "'. $atts['map_type'].'",
                    mapTypeControl: false,
                    zoom: '. $atts['zoom'].',
                    '.$atts['zoom_control_style']. '
                    panControl : '.$atts['pan_control'] .',
                    streetViewControl: '.$atts['street_view_control'].',
                    scrollwheel: '.$atts['zoom_on_scroll'].'
                });

                '.$atts['map_location_marker'].'
            });';
        
        suAsset::addString('js', $script);



        return '<div style="width:'.$atts['width'].'height:'.$atts['height'].'px;border:'.$atts['border'].';" id="'. $unique_id .'"'.su_scroll_reveal($atts).' class="map_advanced '.su_ecssc($atts).$map_as_background.'"></div>';
    }
}
