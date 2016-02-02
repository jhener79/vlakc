<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_calltoaction_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {
        return array(
            'name'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CALLTOACTION'),
            'type'     => 'wrap',
            'group'    => 'content',
            'desc'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CALLTOACTION_DESC'),
            'icon'     => 'pencil',
            'content'  => 'Lorem ipsum dolor sit amet consectetuer adipiscing elit.',
            'atts' => array(                        
                'align' => array(
                    'type' => 'select',
                    'values' => array(
                        'left' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                        'right' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT'),
                        'center' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER')
                    ),
                    'default' => 'left',
                    'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN'),
                    'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ALIGN_DESC')
                ),
                'title' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DEFAULT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_DESC'),
                    'child'   => array(
                        'title_color' => array(
                            'type'    => 'color',
                            'default' => '#ffffff',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE_COLOR_DESC')
                        ),
                    )
                ),          
                
                'button_text' => array(
                    'default' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT_DEFAULT'),
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_TEXT_DESC')
                ),
                'button_link' => array(
                    'default' => '#',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_LINK'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_LINK_DESC'),
                    'child'   => array(
                        'target' => array(
                            'type' => 'select',
                            'values' => array(
                                'self'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SELF'),
                                'blank' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BLANK')
                            ),
                            'default' => 'self',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TARGET_DESC')
                        ) 
                    )
                ),
                         
                'button_color' => array(
                    'type'    => 'color',
                    'default' => '#ffffff',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_COLOR_DESC'),
                    'child'  => array(
                        'button_background' => array(
                            'type'    => 'color',
                            'values'  => array( ),
                            'default' => '#165194',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_BACKGROUND_DESC')
                        )
                    )
                ),                          
                'color' => array(
                    'type'    => 'color',
                    'default' => '#dddddd',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_COLOR_DESC'),
                    'child'  => array(
                        'background' => array(
                            'type'    => 'color',
                            'values'  => array( ),
                            'default' => '#2D89EF',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BACKGROUND_DESC')
                        )
                    )
                ),                              
                'button_radius' => array(
                    'default' => '3px',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_RADIUS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BUTTON_RADIUS_DESC'),
                    'child'     => array(
                        'radius' => array(
                            'default' => '3px',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RADIUS_DESC')
                        ),
                    )
                ),
                'scroll_reveal' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCROLL_REVEAL'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCROLL_REVEAL_DESC')
                ),           
                'class' => array(
                    'default' => '',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CLASS_DESC')
                )
            )
        );
    }

}
