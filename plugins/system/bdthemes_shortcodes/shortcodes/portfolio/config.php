<?php 

/**
* @package   Shortcode Ultimate
* @author    BdThemes http://www.bdthemes.com
* @copyright Copyright (C) BdThemes Ltd
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

class Su_Shortcode_portfolio_config extends Su_Data {

    function __construct() {
        parent::__construct();
    }
    static function get_config() {

        return array(
            'name'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO'),
            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_DESC'),
            'icon' => 'briefcase',
            'type'  => 'single',
            'group' => 'gallery',
            'atts'  => array(
                'source' => array(
                    'type'    => 'article_source',
                    'default' => 'none',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SOURCE_DESC'),
                    'child'   => array(
                        'style' => array(
                            'type' => 'select',
                            'values' => array(
                                1 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE1'),
                                2 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE2'),
                                3 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE3'),
                                4 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE4')
                            ),
                            'default' => 1,
                            'name' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE'),
                            'desc' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_STYLE_DESC')
                        )
                    )
                ),
                'limit' => array(
                    'type'    => 'slider',
                    'min'     => 5,
                    'max'     => 100,
                    'step'    => 1,
                    'default' => 15,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ITEM_LIMIT'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LIMIT_DESC'),
                    'child'   => array(
                        'intro_text_limit' => array(
                            'type'    => 'slider',
                            'min'     => 0,
                            'max'     => 500,
                            'step'    => 5,
                            'default' => 50,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TEXT_LIMIT'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_TEXT_LIMIT_DESC')
                        )
                    )
                ),
                'order' => array(
                    'type'     => 'select',
                    'values'   => array(
                        'created'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CREATED_DATE'),
                        'title'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_TITLE'),
                        'hits'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_HITS'),
                        'ordering' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDERING')
                    ),
                    'default' => 'created',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_DESCR'),
                    'child'   => array(
                        'order_by' => array(
                            'type'   => 'select',
                            'values' => array(
                                'asc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ASC'),
                                'desc'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DESC')
                            ),
                        'default' => 'desc',
                        'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE'),
                        'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ORDER_TYPE_DESC')
                        )
                    )
                ),
                'filter' => array(
                    'type'    => 'bool',
                    'default' => 'yes',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILTER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SHOW_FILTER_DESC'),
                    'child' => array(                                
                        'filter_align' => array(
                            'type'    => 'select',
                            'default' => 'left',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ALIGN'),
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FILTER_ALIGN_DESC'),
                            'values'  => array(
                                'center'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_CENTER'),
                                'left'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_LEFT'),
                                'right'   => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RIGHT')
                            )
                        )
                    )
                ),
                'grid_type' => array(
                    'type'       => 'select',
                    'values'     => array(
                        0  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_RANDOM'),
                        1  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_1'),
                        2  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_2'),
                        3  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_3'),
                        4  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_4'),
                        5  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_5'),
                        6  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_6'),
                        7  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_7'),
                        8  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_8'),
                        9  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_9'),
                        10 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_10'),
                        11 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_11'),
                        12 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_12'),
                        13 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_13'),
                        14 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_14'),
                        15 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_15'),
                        16 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_16'),
                        17 => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_17')
                    ),
                    'default' => 0,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GRID_TYPES'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_GRID_TYPES_DESC'),
                    'child'   => array(
                        'animation' => array(
                            'type' => 'select',
                            'values' => array(
                                'fade'        => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_FADE'),
                                'rotate'      => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROTATE'),
                                'scale'       => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SCALE'),
                                'rotatescale' => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_ROTATESCALE'),
                                'pagetop'     => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGETOP'),
                                'pagebottom'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGEBOTTOM'),
                                'pagemiddle'  => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PAGEMIDDLE')
                            ),
                            'default' => 'default',
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_ANIMATION'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_ANIMATION_DESC')
                        )
                    )
                ),
                'speed' => array(
                    'type'    => 'slider',
                    'min'     => 300,
                    'max'     => 1500,
                    'step'    => 1,
                    'default' => 850,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_SPEED_DESC'),
                    'child'   => array(
                        'rotate' => array(
                            'type'    => 'slider',
                            'min'     => 0,
                            'max'     => 99,
                            'step'    => 1,
                            'default' => 99,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_ROTATE'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_ROTATE_DESC')
                        ),
                        'delay' => array(
                            'type'    => 'slider',
                            'min'     => 0,
                            'max'     => 500,
                            'step'    => 1,
                            'default' => 20,
                            'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY'), 
                            'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_DELAY_DESC')
                        )
                    )
                ),
                'border' => array(
                    'type'    => 'border',
                    'default' => '0px solid #000',
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER'),
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_BORDER_DESC')
                ),
                'padding' => array(
                    'default' => 10,
                    'name'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_PADDING'), 
                    'desc'    => JText::_('PLG_SYSTEM_BDTHEMES_SHORTCODES_PORTFOLIO_PADDING_DESC')
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
