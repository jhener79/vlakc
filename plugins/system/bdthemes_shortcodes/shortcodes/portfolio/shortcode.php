<?php

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_portfolio extends Su_Shortcodes {

    function __construct() {
        parent::__construct();
    }

    public static function portfolio($atts = null, $content = null) {
        $return = '';
        $atts = su_shortcode_atts(array(
            'style'            => 1,
            'source'           => '',
            'limit'            => 15,
            'order'            => 'created',
            'order_by'         => 'desc',
            'color'            => '#cccccc',
            'intro_text_limit' => 50,
            'filter'           => 'yes',
            'filter_align'     => '',
            'grid_type'        => 0,
            'animation'        => 'fade',
            'speed'            => 600,
            'rotate'           => 99,
            'delay'            => 20,
            'border'           => 0,
            'padding'          => 10,
            'thumb_width'      => 640,
            'thumb_height'     => 480,
            'thumb_resize'     => 'yes',
            'scroll_reveal'    => '',
            'class'            => ''
                ), $atts, 'portfolio');

        $slides = (array) Su_Tools::get_slides($atts);
        
        $thumb_resize_check = ($atts['thumb_resize'] === 'yes') ? true : false;

        $filter_align = ($atts['filter_align']) ? ' su-portfolio-filter-align-'.$atts['filter_align'] : '';

        $intro_text='';
        $title = '';    

        if ( count($slides) ) {

            $id = uniqid('susc_');

            $return .= '<div id="' . $id . '"'.su_scroll_reveal($atts).' class="su-portfolio sup-style'.$atts['style'].$filter_align.' '. su_ecssc($atts). '" >';

            if ($atts['filter'] !== 'no') {
                $return .= '
                <div class="filter_padder" >
                    <div class="filter_wrapper">
                        <div class="filter selected" data-category="cat-all">'.JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_ALL').'</div>';
            
                            $category = array();
                            foreach ((array) $slides as $slide) {
                                if (in_array($slide['category'], $category) ) {
                                    continue;
                                }
                                $category[] = $slide['category'];
                                $return .= '<div class="filter" data-category="' . strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $slide['category'])) .'">'.$slide['category'].'</div>';
                            } 

                            $return .= '
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>';
            }
            $return .= '
            <div class="megafolio-container" 
                data-grid_types="'.$atts['grid_type'].'"
                data-speed="'.$atts['speed'].'"
                data-delay="'.$atts['delay'].'"
                data-rotate="'.$atts['rotate'].'"
                data-padding="'.intval($atts['padding']).'"
                data-animation="'.$atts['animation'].'" >';


            $limit = 1;
            foreach ((array) $slides as $slide) {

                $thumb_url = su_image_resize($slide['image'], $atts['thumb_width'], $atts['thumb_height'], $thumb_resize_check, 95);   

                // Title condition 
                if($slide['title'] )
                    $title = stripslashes($slide['title']);                

                if (isset($slide['introtext'])) {
                    if ($atts['intro_text_limit'] != 0) {
                        $intro_text = su_char_limit($slide['introtext'], $atts['intro_text_limit']);
                    }
                }

                $category = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $slide['category']));

                if ($atts['style'] == 2) { 
                    $return .= '
                            <div class="mega-entry cat-all '.$category.'" data-src="'. image_media($thumb_url['url']) .'" data-width="500" data-height="500">
                                <div class="links-container">
                                    <a class="hoverlink project-link" href="'.$slide['link'].'" title="'. strip_tags($title ).'">
                                        <i class=" fa fa-link"></i>
                                        <span></span>
                                    </a>
                                    <a class="hoverlink su-lightbox-item" href="'. image_media($slide['image']) .'" title="'. strip_tags($title ).'">
                                        <i class=" fa fa-search"></i>
                                        <span></span>
                                    </a>
                                </div>
                                <div class="rollover-content mega-covercaption mega-square-bottom mega-portrait-bottom">

                                    <div class="rollover-content-container">    
                                        <h3 class="entry-title">'. $title .'</h3>
                                        
                                        <div class="entry-meta">
                                            <div class="su-portfolio-date">
                                                <span class="su-pdate">'.JHTML::_('date', $slide['created'], JText::_('DATE_FORMAT_LC3')).'</span>
                                            </div>
                                            <div class="portfolio-categories">
                                                <span class="category">'.$category.'</span>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>';              
                } elseif ($atts['style'] == 3) { 
                    $return .= '
                        <div class="mega-entry cat-all '.$category.'" data-src="'. image_media($thumb_url['url']) .'" data-width="500" data-height="500">
                            <div class="mega-hover notitle">
                                <a class="su-lightbox-item" href="'. image_media($slide['image']) .'" title="'. strip_tags($title ).'">
                                    <div class="mega-hoverview fa fa-search"></div>
                                </a>
                                <a class="hoverlink project-link" href="'.$slide['link'].'" title="'. strip_tags($title ).'">
                                    <i class="mega-hoverlink fa fa-link"></i>
                                </a>
                            </div>
                            
                            <div class="gallerycaption-bottom">
                                '. $title .'
                                <div class="gallerysubline">'.$category.'</div>
                            </div>
                        </div>';   
                } elseif ($atts['style'] == 4) { 
                    $return .= '
                        <div class="mega-entry portfolio-style4 cat-all '.$category.'" data-src="'. image_media($thumb_url['url']) .'" data-width="500" data-height="500">
                            
                            <div class="portfolio-links">
                                <a class="su-lightbox-item" href="'. image_media($slide['image']) .'" title="'. strip_tags($title ).'">
                                    <i class="fa fa-search"></i>
                                </a>
                                <a class="portfolio-link" href="'.$slide['link'].'" title="'. strip_tags($title ).'">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-title">'. $title .'</div>
                                <div class="portfolio-desc">'.$intro_text.'</div>
                            </div>
                        </div>';
                }
                else {                
                    $return .= '
                        <div class="mega-entry cat-all '.$category.'" data-src="'. image_media($thumb_url['url']) .'" data-width="500" data-height="500">
                            <div class="mega-hover">
                                <div class="mega-hovertitle">'. $title .'
                                    <div class="mega-hoversubtitle">'.$intro_text.'</div>
                                </div>
                                <a href="'.$slide['link'].'" title="'. strip_tags($title ).'">
                                    <i class="mega-hoverlink fa fa-link"></i>
                                </a>
                                <a class="su-lightbox-item" href="'. image_media($slide['image']) .'" title="'. strip_tags($title ).'">
                                    <i class="mega-hoverview fa fa-search"></i>
                                </a>                                
                            </div>
                        </div>';
                } 

                if ($limit++ == $atts['limit']) break;
            }
            $return .= '</div></div>';


            $css = '
              #'.$id.' .mega-hoversubtitle { color: '.$atts['color'].';} 
              #'.$id.' .mega-entry .mega-entry-innerwrap { border: '.$atts['border'].';} 
            ';

            suAsset::addString('css', $css);
            suAsset::addFile('css', 'portfolio.css', __FUNCTION__);

            suAsset::addFile('css', 'magnific-popup.css');
            suAsset::addFile('js', 'magnific-popup.js');
            
            suAsset::addFile('js', 'themepunch_tools.js', __FUNCTION__);
            suAsset::addFile('js', 'themepunch_megafoliopro.js', __FUNCTION__);
            suAsset::addFile('js', 'portfolio.js', __FUNCTION__);
        }
        else
            $return = alert_box(JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_INF'), 'warning');
        return $return;
    }   
}
