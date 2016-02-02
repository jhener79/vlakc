<?php
/**
* @package   holax
* @author    bdthemes http://www.bdthemes.com
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));
include($this['path']->path('layouts:header.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
<?php echo $this['template']->render('head'); ?>
</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">
	
	<div class="layout-<?php echo $this['config']->get('layout_width');?>-wrapper">
	
		<?php if ($this['widgets']->count('drawer')) : ?>
			<div class="<?php echo $wrapper_classes['drawer']; ?>">
				<div id="tm-drawer">
					<div class="uk-container uk-container-center">
						<section class="<?php echo $grid_classes['drawer']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('drawer', array('layout'=>$this['config']->get('grid.drawer.layout'))); ?></section>
					</div>
				</div>
				<a href="javascript:void(0);" class="drawer_toggle"><span class="uk-icon-chevron-down"></span></a>
			</div>
		<?php endif; ?>

		<div class="header-top-wrapper">
			<?php echo bdt_headerStyle($this); ?>

		</div>

		<?php if ($this['widgets']->count('heading')) : ?>
			<div class="<?php echo $wrapper_classes['heading']; ?>" id="tmHeading">
				<section class="<?php echo $grid_classes['heading']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
					<?php echo $this['widgets']->render('heading', array('layout'=>$this['config']->get('grid.heading.layout'))); ?>

					<?php if ($this['widgets']->count('breadcrumbs')) : ?>
						<div class="breadcrumbs-wrapper" id="tmBreadcrumbs">
								<?php echo $this['widgets']->render('breadcrumbs'); ?>
						</div>
					<?php endif; ?>

				</section>
			</div>
		<?php endif; ?>


		<?php if ($this['widgets']->count('slider')) : ?>
			<div class="<?php echo $wrapper_classes['slider']; ?>" id="tmSlider">
				<div class="<?php echo ($this['config']->get('layout_width') == 'boxed-space') ? 'uk-container ' : ''; ?>uk-container-center">
					<section class="<?php echo $grid_classes['slider']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('slider', array('layout'=>$this['config']->get('grid.slider.layout'))); ?></section>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('features')) : ?>
			<div class="<?php echo $wrapper_classes['features']; ?>" id="tmFeatures">
				<div class="uk-container uk-container-center">
					<section class="<?php echo $grid_classes['features']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('features', array('layout'=>$this['config']->get('grid.features.layout'))); ?></section>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('top-a')) : ?>
			<div class="<?php echo $wrapper_classes['top-a']; ?>" id="tmTopA">
				<div class="uk-container uk-container-center">
					<section class="<?php echo $grid_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?></section>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('top-b')) : ?>
			<div class="<?php echo $wrapper_classes['top-b']; ?>" id="tmTopB">
				<div class="uk-container uk-container-center">
					<section class="<?php echo $grid_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?></section>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('top-c')) : ?>
			<div class="<?php echo $wrapper_classes['top-c']; ?>" id="tmTopC">
				<div class="uk-container uk-container-center">
					<section class="<?php echo $grid_classes['top-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-c', array('layout'=>$this['config']->get('grid.top-c.layout'))); ?></section>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('top-d')) : ?>
			<div class="<?php echo $wrapper_classes['top-d']; ?>" id="tmTopD">
				<div class="uk-container uk-container-center">
					<section class="<?php echo $grid_classes['top-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-d', array('layout'=>$this['config']->get('grid.top-d.layout'))); ?></section>
				</div>
			</div>
		<?php endif; ?>
		
		<?php if ($this['widgets']->count('fullwidth-top')) : ?>
			<div class="<?php echo $wrapper_classes['fullwidth-top']; ?>" id="tmFullWidthTop">
				<div class="<?php echo ($this['config']->get('layout_width') == 'boxed-space') ? 'uk-container ' : ''; ?>uk-container-center">
					<section class="<?php echo $grid_classes['fullwidth-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('fullwidth-top', array('layout'=>$this['config']->get('grid.fullwidth-top.layout'))); ?></section>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('expanded-top')) : ?>
			<div class="<?php echo $wrapper_classes['expanded-top']; ?>" id="tmExpandedTop">
				<div class="uk-container uk-container-center">
					<section class="<?php echo $grid_classes['expanded-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('expanded-top', array('layout'=>$this['config']->get('grid.expanded-top.layout'))); ?></section>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
			<div class="mainbody-wrapper" id="tmMainBody">
				<div class="uk-container uk-container-center">
					<div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

						<?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
						<div class="<?php echo $columns['main']['class'] ?>">

							<?php if ($this['widgets']->count('main-top')) : ?>
							<section class="<?php echo $grid_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
							<?php endif; ?>

							<?php if ($this['config']->get('system_output', true)) : ?>
							<main class="tm-content">
								<?php echo $this['template']->render('content'); ?>
							</main>
							<?php endif; ?>

							<?php if ($this['widgets']->count('main-bottom')) : ?>
							<section class="<?php echo $grid_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
							<?php endif; ?>

						</div>
						<?php endif; ?>

			            <?php foreach($columns as $name => &$column) : ?>
			            <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
			            <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
			            <?php endif ?>
			            <?php endforeach ?>

					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('expanded-bottom')) : ?>
			<div class="<?php echo $wrapper_classes['expanded-bottom']; ?>" id="tmExpandedBottom">
				<div class="uk-container uk-container-center">
					<section class="<?php echo $grid_classes['expanded-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('expanded-bottom', array('layout'=>$this['config']->get('grid.expanded-bottom.layout'))); ?></section>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('fullwidth-bottom')) : ?>
			<div class="<?php echo $wrapper_classes['fullwidth-bottom']; ?>" id="tmFullWidthBottom">
				<div class="<?php echo ($this['config']->get('layout_width') == 'boxed-space') ? 'uk-container ' : ''; ?>uk-container-center">
					<section class="<?php echo $grid_classes['fullwidth-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('fullwidth-bottom', array('layout'=>$this['config']->get('grid.fullwidth-bottom.layout'))); ?></section>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('bottom-a')) : ?>
			<div class="<?php echo $wrapper_classes['bottom-a']; ?>" id="tmBottomA">
				<div class="uk-container uk-container-center">
					<section class="<?php echo $grid_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?></section>
				</div>
			</div>
		<?php endif; ?>
			
		<?php if ($this['widgets']->count('bottom-b')) : ?>
			<div class="<?php echo $wrapper_classes['bottom-b']; ?>" id="tmBottomB">
				<div class="uk-container uk-container-center">
					<section class="<?php echo $grid_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
						<?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?>
					</section>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('footer + footer-r + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
			<div class="footer-wrapper">
				<div class="uk-container uk-container-center">
					<footer class="tm-footer uk-text-center">
						<?php echo $this['widgets']->render('footer'); ?>

						<?php if ($this['config']->get('warp_branding', true)) : ?>
							<div class="warp-branding">
								<?php $this->output('warp_branding'); ?>
							</div>
						<?php endif; ?>					
						
						<?php echo $this['widgets']->render('debug'); ?>

					</footer>

				</div>
			</div>
		<?php endif; ?>

		<?php echo $this->render('footer'); ?>

		<?php if ($this['config']->get('totop_scroller', true)) : ?>
			<a class="tm-totop-scroller totop-hidden" data-uk-smooth-scroll href="#"></a>
		<?php endif; ?>

		<?php if ($this['widgets']->count('offcanvas')) : ?>
			<div id="offcanvas" class="uk-offcanvas">
				<div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('fixed-l')) : ?>
			<div id="tmFixedLeft" class="uk-fixed-l">
				<div class="uk-fixed-l-wrapper"><?php echo $this['widgets']->render('fixed-l'); ?></div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('fixed-r')) : ?>
			<div id="tmFixedRight" class="uk-fixed-r">
				<div class="uk-fixed-r-wrapper"><?php echo $this['widgets']->render('fixed-r'); ?></div>
			</div>
		<?php endif; ?>
	</div>

</body>
</html>