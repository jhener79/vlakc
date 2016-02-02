<?php
/**
 * @version		$Id: default.php 1618 2012-09-21 11:23:08Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;
?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock">

	<?php if($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>

	<?php if(count($items)): ?>
  <div class="project-container">
    <?php foreach ($items as $key=>$item):	?>
    <div class="projectItem <?php if(count($items)==$key+1) echo ' lastItem'; ?>">

      <!-- Plugins: BeforeDisplay -->
      <?php echo $item->event->BeforeDisplay; ?>

      <!-- K2 Plugins: K2BeforeDisplay -->
      <?php echo $item->event->K2BeforeDisplay; ?>

      <?php if($params->get('itemTitle')): ?>
      <?php $title = $item->title; ?>
      <a class="moduleItemTitle" href="<?php echo $item->link; ?>"><?php echo substr($title, 0, 20) ?></a>
      <?php endif; ?>

      <!-- Plugins: BeforeDisplayContent -->
      <?php echo $item->event->BeforeDisplayContent; ?>

      <!-- K2 Plugins: K2BeforeDisplayContent -->
      <?php echo $item->event->K2BeforeDisplayContent; ?>

      <?php if($params->get('itemImage') || $params->get('itemIntroText')): ?>
      <div class="moduleItemIntrotext">
	      <?php if($params->get('itemImage') && isset($item->image)): ?>
	      <a class="moduleItemImage hoverAni" href="<?php echo $item->link; ?>" title="<?php echo JText::_('K2_CONTINUE_READING'); ?> &quot;<?php echo K2HelperUtilities::cleanHtml($item->title); ?>&quot;">
	      	<img src="<?php echo $item->image; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>"/>
            <span class="link-hover"></span>
	      </a>
	      <?php endif; ?>

      	<?php if($params->get('itemIntroText')): ?>
      	<p><?php echo $item->introtext; ?></p>
      	<?php endif; ?>
      </div>
      <?php endif; ?>

      


      <!-- Plugins: AfterDisplayContent -->
      <?php echo $item->event->AfterDisplayContent; ?>

      <!-- K2 Plugins: K2AfterDisplayContent -->
      <?php echo $item->event->K2AfterDisplayContent; ?>

      <?php if($params->get('itemDateCreated')): ?>
      <span class="moduleItemDateCreated"><?php echo JText::_('K2_WRITTEN_ON') ; ?> <?php echo JHTML::_('date', $item->created, JText::_('K2_DATE_FORMAT_LC2')); ?></span>
      <?php endif; ?>

      <?php if($params->get('itemCategory')): ?>
      <?php echo JText::_('K2_IN') ; ?> <a class="moduleItemCategory" href="<?php echo $item->categoryLink; ?>"><?php echo $item->categoryname; ?></a>
      <?php endif; ?>

      <?php if($params->get('itemTags') && count($item->tags)>0): ?>
      <div class="moduleItemTags">
      	<b><?php echo JText::_('K2_TAGS'); ?>:</b>
        <?php foreach ($item->tags as $tag): ?>
        <a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <?php if($params->get('itemAttachments') && count($item->attachments)): ?>
			<div class="moduleAttachments">
				<?php foreach ($item->attachments as $attachment): ?>
				<a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><?php echo $attachment->title; ?></a>
				<?php endforeach; ?>
			</div>
      <?php endif; ?>

			
			

			<?php if($params->get('itemReadMore') && $item->fulltext): ?>
			<a class="moduleItemReadMore" href="<?php echo $item->link; ?>">
				<?php echo JText::_('K2_READ_MORE'); ?>
			</a>
			<?php endif; ?>

      <!-- Plugins: AfterDisplay -->
      <?php echo $item->event->AfterDisplay; ?>

      <!-- K2 Plugins: K2AfterDisplay -->
      <?php echo $item->event->K2AfterDisplay; ?>

      <div class="clr"></div>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

	

	

</div>
