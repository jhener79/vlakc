<?php
/**
* @package   intensy
* @author    bdthemes http://www.bdthemes.com
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/



function bdt_headerStyle ($this) {
?>
<div class="tm-header-wrapper">


	<?php if ($this['widgets']->count('toolbar-l + toolbar-r')) : ?>
		<div class="toolbar-wrapper">
			<div class="uk-container uk-container-center">
				<div class="tm-toolbar uk-clearfix">
					<?php if ($this['widgets']->count('toolbar-l')) : ?>
					<div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
					<?php endif; ?>

					<?php if ($this['widgets']->count('toolbar-r')) : ?>
					<div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php // Start default header style ?>
	<?php if ($this['config']->get('header') == 'default') : ?>
		<?php if ($this['widgets']->count('logo + search + headerbar')) : ?>
			<div class="tm-headerbar uk-clearfix uk-visible-large">
				<div class="uk-container uk-container-center">
					<?php if ($this['widgets']->count('logo')) : ?>
						<?php echo $this['widgets']->render('logo'); ?>
					<?php endif; ?>

					<?php if ($this['widgets']->count('search')) : ?>
					<div class="tm-search uk-float-right">
						<?php echo $this['widgets']->render('search'); ?>
					</div>
					<?php endif; ?>
					<?php echo $this['widgets']->render('headerbar'); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('menu')) : ?>
			<div class="tm-navigation-wrapper" <?php echo ($this['config']->get('headertype') === 'sticky') ? 'data-uk-sticky' : ''; ?>>
				<div class="uk-container uk-container-center">
					<?php if ($this['widgets']->count('menu')) : ?>
						<nav class="tm-navbar uk-navbar" id="tmMainMenu">
							
							<?php if ($this['widgets']->count('logo') and $this['config']->get('headertype') != 'default') : ?>
								<div class="tm-sticky-logo uk-visible-large">
									<?php echo $this['widgets']->render('logo'); ?>
								</div>
							<?php endif; ?>

							<?php if ($this['widgets']->count('menu')) : ?>
								<div class="uk-visible-large">
									<?php echo $this['widgets']->render('menu'); ?>
								</div>
							<?php endif; ?>

							<?php if ($this['widgets']->count('offcanvas')) : ?>
								<div class="uk-hidden-large">
									<a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
								</div>
							<?php endif; ?>

							<?php if ($this['widgets']->count('logo-small')) : ?>
								<div class="uk-navbar-content uk-navbar-center uk-hidden-large tm-logo-small">
									<?php echo $this['widgets']->render('logo-small'); ?>
								</div>
							<?php else : ?>
								<div class="uk-navbar-content uk-navbar-center uk-hidden-large tm-logo-small">
									<a href="<?php echo JURI::root(); ?>" title="<?php echo JFactory::getConfig()->get('sitename'); ?>">
										<h1><?php echo JFactory::getConfig()->get('sitename'); ?></h1>
									</a>
								</div>
							<?php endif; ?>

						</nav>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		
	<?php // Header Style default ?>

	<?php // Start style2 header style ?>
	<?php elseif ($this['config']->get('header') == 'style2') : ?>
		<?php if ($this['widgets']->count('menu + search + logo')) : ?>
			<div class="tm-headerbar uk-clearfix" <?php echo ($this['config']->get('headertype') === 'sticky') ? 'data-uk-sticky="{top: -100}"' : ''; ?>>
				<div class="<?php echo ($this['config']->get('fullWidthHeader')) ? 'tm-header-fullwidth' : 'uk-container' ?> uk-container-center">
					<nav class="tm-navbar">
						<div class="uk-navbar">

							<?php if ($this['widgets']->count('logo')) : ?>
								<div class="uk-visible-large tm-logo-large">
									<?php echo $this['widgets']->render('logo'); ?>
								</div>
							<?php else : ?>
								<div class="uk-visible-large tm-logo-large">
									<a class="tm-logo" href="<?php echo JURI::root(); ?>" title="<?php echo JFactory::getConfig()->get('sitename'); ?>">
										<h1><?php echo JFactory::getConfig()->get('sitename'); ?></h1>
									</a>
								</div>
							<?php endif; ?>

							<?php if ($this['widgets']->count('search')) : ?>
							<div class="uk-navbar-flip">
								<div class="uk-navbar-content uk-visible-large"><?php echo $this['widgets']->render('search'); ?></div>
							</div>
							<?php endif; ?>

							<?php if ($this['widgets']->count('menu')) : ?>
							<div class="uk-visible-large uk-navbar-flip">
								<?php echo $this['widgets']->render('menu'); ?>
							</div>
							<?php endif; ?>

							<?php if ($this['widgets']->count('offcanvas')) : ?>
							<div class="uk-hidden-large">
								<a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
							</div>
							<?php endif; ?>

							<?php if ($this['widgets']->count('logo-small')) : ?>
								<div class="uk-navbar-content uk-navbar-center uk-hidden-large tm-logo-small">
									<?php echo $this['widgets']->render('logo-small'); ?>
								</div>
							<?php else : ?>
								<div class="uk-navbar-content uk-navbar-center uk-hidden-large tm-logo-small">
									<a href="<?php echo JURI::root(); ?>" title="<?php echo JFactory::getConfig()->get('sitename'); ?>">
										<h1><?php echo JFactory::getConfig()->get('sitename'); ?></h1>
									</a>
								</div>
							<?php endif; ?>

						</div>
					</nav>
				</div>
			</div>
		<?php endif; ?>
	<?php // End style2 header style ?>	

	<?php // Start style3 header style ?>
	<?php elseif ($this['config']->get('header') == 'style3') : ?>
		<?php if ($this['widgets']->count('menu + logo')) : ?>
			<div class="tm-headerbar" <?php echo ($this['config']->get('headertype') === 'sticky') ? 'data-uk-sticky="{top: -100}"' : ''; ?>>
					<?php if ($this['widgets']->count('menu + logo + search')) : ?>
						<nav class="tm-navbar">
						    <div class="uk-container uk-container-center">
						        <div class="tm-navbar-center">

						            <?php if ($this['widgets']->count('logo')) : ?>
										<div class="tm-logo-large uk-visible-large">
											<?php echo $this['widgets']->render('logo'); ?>
										</div>
									<?php else : ?>
										<div class="tm-logo-large uk-visible-large">
											<a class="tm-logo" href="<?php echo JURI::root(); ?>" title="<?php echo JFactory::getConfig()->get('sitename'); ?>">
												<h1><?php echo JFactory::getConfig()->get('sitename'); ?></h1>
											</a>
										</div>
									<?php endif; ?>


						            <?php if ($this['widgets']->count('menu')) : ?>
						            <div class="tm-nav uk-visible-large">
						                <div class="tm-nav-wrapper"><?php echo $this['widgets']->render('menu'); ?></div>
						            </div>
						            <?php endif; ?>

						            <?php if ($this['widgets']->count('offcanvas')) : ?>
						                <a href="#offcanvas" class="uk-navbar-toggle uk-hidden-large" data-uk-offcanvas></a>
						            <?php endif; ?>

						            <?php if ($this['widgets']->count('logo-small')) : ?>
        								<div class="uk-navbar-content uk-navbar-center uk-hidden-large tm-logo-small">
        									<?php echo $this['widgets']->render('logo-small'); ?>
        								</div>
        							<?php else : ?>
        								<div class="uk-navbar-content uk-navbar-center uk-hidden-large tm-logo-small">
        									<a href="<?php echo JURI::root(); ?>" title="<?php echo JFactory::getConfig()->get('sitename'); ?>">
        										<h1><?php echo JFactory::getConfig()->get('sitename'); ?></h1>
        									</a>
        								</div>
        							<?php endif; ?>

						        </div>
						    </div>

							<?php if ($this['widgets']->count('search')) : ?>
					            <div class="tm-search">
					                <div class="uk-visible-large"><?php echo $this['widgets']->render('search'); ?></div>
				            	</div>
				            <?php endif; ?>

						</nav>
					<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php // End style3 header style ?>			
	<?php endif; ?>
</div>


<?php
}
