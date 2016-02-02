<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_faq extends Su_Shortcodes {

    function __construct() { parent::__construct(); }

    public static function faq($atts = null, $content = null) {
        $atts = su_shortcode_atts(array(
            'id'                => uniqid('suf'),
            'source'            => '',
            'limit'             => 20,
            'order'             => 'created',
            'order_by'          => 'desc',
            'loading_animation' => 'default',
            'filter_animation'  => 'sequentially',
            'display_speed'     => 200,
            //'show_search'       => 'no',
            'scroll_reveal'     => '',
            'class'             => ''
                ), $atts, 'faq');

        $slides = (array) Su_Tools::get_slides($atts);
        $intro_text='';
        $title = '';    
        $return = '';

        if ( count($slides) ) {


            $return[] = '
            <div'.su_scroll_reveal($atts).' id="'. $atts['id'] . '" class="su-faq '.su_ecssc($atts). '" 
                data-scid="' . $atts['id'] . '" 
                data-loading_animation="'.$atts['loading_animation'].'" 
                data-filter_animation="'.$atts['filter_animation'].'" data-display_speed="'.$atts['display_speed'].'">

                <div id="' . $atts['id'] . '_filter" class="cbp-l-filters-underline">                   
                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                        '.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOWCASE_ALL').'
                    </div>';
                    $category = array();
                    foreach ((array) $slides as $slide) {
                        if (in_array($slide['category'], $category) ) {
                            continue;
                        }
                        $category[] = $slide['category'];
                        $return[] = '<div class="cbp-filter-item" data-filter=".' . str_replace(' ', '-', strtolower($slide['category'])).'">'.$slide['category'].'</div>';
                    }

                    // if ($atts['show_search'] === 'yes') {
                    //     $return[] ='<div class="cbp-search cbp-l-filters-right">
                    //                     <input id="'.$atts['id']. '_search" type="text" placeholder="'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FAQ_SEARCH').'" data-search="" class="cbp-search-input">
                    //                     <div class="cbp-search-icon"></div>
                    //                 </div>';
                    // } 

                $return[] ='</div>
                    <div id="' . $atts['id'] . '_container" class="cbp cbp-l-grid-faq">';

            $limit = 1;
            foreach ((array) $slides as $slide) {
                
                // Title condition
                $title = $slide['title'];
                $icon = $title ? explode('|| fa-', $title) : array();
                if (count($icon) == 2){
                    $title = trim($icon[0]);
                    $icon = '<i class="fa fa-'.trim($icon[1]).'"></i>';
                } else {
                    $title = $slide['title'];
                    $icon = '<i class="fa fa-question-circle"></i>';
                }
                $isReadmore = $slide['fulltext'] ? '<div class="su-readmore"><a href="'.$slide['link'].'">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_READMORE').'</a></div>' : '';

                $category = str_replace(' ', '-', strtolower($slide['category']));
                $return[] = '
                    <div class="cbp-item '.$category.'">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                '.$icon. $title .'
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    '.su_do_shortcode($slide['introtext']).$isReadmore.'
                                </div>
                            </div>
                        </div>

                    </div>';
                if ($limit++ == $atts['limit']) break;
            }
            $return[] = '<div class="clearfix"></div></div></div>';


            suAsset::addFile('css', 'cubeportfolio.min.css');
            suAsset::addFile('js', 'cubeportfolio.min.js');
            
            suAsset::addFile('css', 'faq.css', __FUNCTION__);
            suAsset::addFile('js', 'faq.js', __FUNCTION__);

            return implode('', $return);

        } else {
            return alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FAQ_ERROR'), 'warning');
        }
            
    }   
}
