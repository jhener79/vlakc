<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$logo_margin = ($params->get('logo_margin')) ? 'margin:'.$params->get('logo_margin').';' : '';
$logo_padding = ($params->get('logo_padding')) ? ' padding:'.$params->get('logo_padding').';' : '';
$logo_height = ($params->get('logo_height')) ? ' height:'.$params->get('logo_height').';' : '';
$logo_auto_width = ($params->get('logo_auto_width')) ? ' class="auto-hw-logo" ': '';

$logo_custom_url = ($params->get('logo_custom_url')) ? $params->get('logo_custom_url') : JURI::root();

$logo_alt_text = ($params->get('logo_alt_text')) ? $params->get('logo_alt_text') : JFactory::getConfig()->get('sitename');

$logo_custom_css = ($params->get('logo_custom_css')) ? $params->get('logo_custom_css'): '';

$has_infocard = ($params->get('has_infocard')) ? ' has-infocard': '';
$card_margin = ($params->get('card_margin')) ? 'margin-top:'.$params->get('card_margin').';' : '';

if (strpos($params->get('logo'), 'http://') === false && strpos($params->get('logo'), 'https://') === false) {
    $logo_src = JUri::root() . $params->get('logo');
} else {
    $logo_src = $params->get('logo');
}

?>

<div class="logo-container<?php echo $has_infocard; ?>">
	<?php if($params->get('logo')) : ?>
		<a class="tm-logo" href="<?php echo $logo_custom_url; ?>" title="<?php echo $logo_alt_text; ?>" style="<?php echo $logo_height . $logo_margin . $logo_padding . $logo_custom_css;?>">
			<img <?php echo $logo_auto_width; ?> style="<?php echo $logo_height;  ?>" src="<?php echo $logo_src ; ?>" alt="<?php echo $logo_alt_text; ?>" >
		</a>
	<?php endif; ?>

	<?php if($params->get('has_infocard')) : ?>
		<div id="infocard" class="uk-hidden-small" style="<?php echo $card_margin; ?>">
			<?php echo $params->get('infocard_text'); ?>
		</div>
	<?php endif; ?>
</div>