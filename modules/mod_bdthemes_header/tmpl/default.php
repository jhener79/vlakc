<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::root().'modules/mod_bdthemes_header/css/header-style.css');
$heading='';
$sub_heading='';
$subtitle='';
$grab_title = JFactory::getApplication()->getMenu()->getActive();
$header_background = ($params->get('header_background')) ? 'background: url('.$params->get('header_background').');' : '';


 	if ($params->get('heading_type')=='built_in') {
 		$heading = @$grab_title->title;
 	}
 	elseif ($params->get('heading_type')=='page') {
	 	$heading = $document->getTitle();
		$subtitle = $heading ? explode('||', $heading) : array();
		if (count($subtitle) == 2) {
			$heading = trim($subtitle[0]);
		}
		else {
			$heading = $document->getTitle();
		}

	}
 	elseif ($params->get('custom_header') && $params->get('heading_type')=='custom') {
 		$heading = $params->get('custom_header');
 	}

 	//heading style here
 	$heading_font_size = 'font-size: '.$params->get("header_font_size").'; ';
 	$heading_color = ($params->get("heading_color")) ? 'color: '.$params->get("heading_color").'; ' : '';
 	$heading_font_weight = ($params->get("heading_font_weight")!='0') ? 'font-weight: '.$params->get("heading_font_weight").'; ' : '';
 	$heading_text_transform = ($params->get("heading_text_transform")!='0') ? 'text-transform: '.$params->get("heading_text_transform").'; ' : '';

 	$heading_style = 'style="'.$heading_font_size.$heading_color.$heading_font_weight.$heading_text_transform.'"';

 	$heading = "<h1 {$heading_style}>".$heading."</h1>";
 	
 	//sub heading style 
 	$sub_heading_font_size = 'font-size: '.$params->get("sub_header_font_size").'; ';
 	$sub_heading_color = ($params->get("sub_heading_color")) ? ' color: '.$params->get("sub_heading_color").'; ' : '';
 	$sub_heading_font_weight = ($params->get("sub_heading_font_weight")!='0') ? ' font-weight: '.$params->get("sub_heading_font_weight").'; ' : '';

 	$sub_heading_style = 'style="'.$sub_heading_font_size.$sub_heading_color.$sub_heading_font_weight.'"';

 	if (count($subtitle) == 2 && !$params->get('custom_sub_header')) {
 		$sub_heading = "<h4 {$sub_heading_style}>". trim($subtitle[1]) ."</h4>";
 	}

	
 	if ($params->get('custom_sub_header')) {
	 	$sub_heading =  $params->get('custom_sub_header');
	 	

	 	$sub_heading = "<h4 {$sub_heading_style}>".$sub_heading."</h4>";

	}
	if ($params->get('heading_padding')) {
		$heading_padding = ' padding-top: '.$params->get('heading_padding').'; padding-bottom: '.$params->get('heading_padding').';';
	}

	
?>

<div class="mainheading-wrapper"  style="<?php echo $header_background; ?>">
	<div class="heading-content heading-align-<?php echo $params->get('heading_text_align'); ?>" style="<?php echo $heading_padding; ?>">
		<div class="heading-text-wrapper">
			<div class="header_text uk-panel">
				<?php echo $heading; ?>
				<?php echo $sub_heading; ?>
				<div class="clearfix"></div>
			</div>
		</div>
		<?php if($params->get('back_button')) : ?>
			<div class="heading-back-button-wrapper">
				<div class="heading-back-button uk-panel">
					<a class="readon" onclick="history.back()"><i class="fa fa-arrow-left"></i> <?php echo JText::_('MOD_BDTHEMES_HEADER_BACK'); ?></a>
				</div>
			</div>
		<?php endif; ?>
		<div class="clearfix"></div>
	</div>
</div>
