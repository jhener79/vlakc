<?php
/**
 * @package	HikaShop for Joomla!
 * @version	2.3.5
 * @author	hikashop.com
 * @copyright	(C) 2010-2015 HIKARI SOFTWARE. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
?><?php
$js = "window.hikashop.ready( function() {window.focus();if(document.all){document.execCommand('print', false, null);}else{window.print();}setTimeout(function(){window.top.hikashop.closeBox();}, 2000);});";
$doc = JFactory::getDocument();
$doc->addScriptDeclaration("\n<!--\n".$js."\n//-->\n");

JRequest::setVar('cart_id',JRequest::getInt('cart_id',0));
JRequest::setVar('cart_type',JRequest::getString('cart_type','cart'));
JRequest::setVar('tmpl','component');

$this->setLayout('showcart');
echo $this->loadTemplate();

