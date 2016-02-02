<?php
/**
* @package   yoo_master2
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

/*
 * Theme params
 */

foreach (array('suffix', 'panel', 'class', 'badge', 'icon', 'display') as $var) {
	$$var = isset($params[$var]) ? $params[$var] : null;
}

// Set default panel
if ($panel == '' && in_array($widget->position, array('features','top-a', 'top-b', 'extended-top','fullwidth-top','fullwidth-bottom', 'extended-bottom', 'bottom-a', 'bottom-b', 'main-top', 'main-bottom', 'sidebar-a', 'sidebar-b'))) {
    $panel = $this['config']->get("panel_default.{$widget->position}.panel", '');
}
// Set panel for specific positions
else if (in_array($widget->position, array('headerbar', 'toolbar-r' ,'toolbar-l', 'footer', 'offcanvas'))) {
	$panel = 'uk-panel';
}

// Set badge
$badge = ($badge && $badge['text']) ? '<div class="'.$badge['type'].'">'.$badge['text'].'</div>': '';

// Set icon
$icon  = ($icon && preg_match('/\.(gif|png|jpg|jpeg|svg)$/', $icon)) ? '<img src="'.$this['path']->url('site:').'/'.$icon.'" alt="'.$widget->title.'"> ' : ($icon ? '<i class="'.$icon.'"></i> ':'');

/*
 * Widget params
 */

$content = $widget->content;
$title   = ($widget->showtitle and $content) ? $widget->title : '';

// Set title
if (in_array($widget->position, array('drawer', 'headerbar', 'toolbar-r' ,'toolbar-l', 'footer', 'footer-r', 'features', 'slider', 'heading'))) {
	$title = '';
} elseif ($title && !($widget->position == 'menu')) {
	$title_pos = mb_strpos($title, ' ');
	if ($title_pos !== false) {
		$title = '<span class="tfw">'.mb_substr($title, 0, $title_pos).'</span>'.mb_substr($title, $title_pos);
	} else {
		$title = '<span class="tfw">'.$title.'</span>';
	}
	$title = '<h3 class="uk-panel-title"><span class="uk-title-text">'.$icon.$title.'</span></h3>';
}

// Render menu
if ($widget->menu) {

	// Set menu renderer
	if (isset($params['menu'])) {
		$renderer = $params['menu'];
	} else if (in_array($widget->position, array('menu'))) {
		$renderer = 'navbar';
		$widget->nav_settings["modifier"] = "uk-hidden-small";
	} else if (in_array($widget->position, array('toolbar-l', 'toolbar-r', 'footer'))) {
		$renderer = 'subnav';
		$widget->nav_settings["modifier"] = "uk-subnav-line";
	} else if (in_array($widget->position, array('offcanvas'))) {
		$renderer = 'nav';
		$widget->nav_settings["modifier"] = "uk-nav-offcanvas";
	} else {
		$renderer = 'nav';
		$widget->nav_settings["accordion"] = true;
	}

	$content = $this['menu']->process($widget, array('pre', 'subnav', $renderer, 'post'));
}

// Render widget
if (in_array($widget->position, array('breadcrumbs', 'logo', 'logo-small', 'search', 'debug', 'fixed-l', 'fixed-r')) || (($widget->position == 'offcanvas') && $widget->menu)) {
	echo $content;
} elseif ($widget->position == 'menu') {
	if ($widget->menu) {
		echo $content;
	} else {
		echo '
		<ul class="uk-navbar-nav uk-hidden-small">
			<li class="uk-parent" data-uk-dropdown>
				<a href="#">'.$title.'</a>
				<div class="uk-dropdown uk-dropdown-navbar uk-dropdown-center">'.$content.'</div>
			</li>
		</ul>';
	}
} else {

	$classes = array($panel);

    // Set display
    if ($display) {
        foreach ($display as $device => $visible) {
            if (!$visible) {
                $classes[] = 'uk-hidden-'.$device;
            }
        }
    }

	if ($class)  $classes[] = $class;
	if ($suffix) $classes[] = $suffix;

	echo '<div class="'.implode(' ', $classes).'">'.$badge.$title.'<div class="panel-content">'.$content.'</div></div>';
}