<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$doc = JFactory::getDocument();
$doc->addStyleSheet('modules/mod_bdthemes_logo/css/style.css');

require JModuleHelper::getLayoutPath('mod_bdthemes_logo', $params->get('layout', 'default'));

?>