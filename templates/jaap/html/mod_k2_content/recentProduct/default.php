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

<div id="k2ModuleBox<?php echo $module->id; ?>" class="K2ProductBlock">

	<?php if($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>

	<?php if(count($items)): ?>
    <div class="project-container uk-grid" data-uk-grid>
        <?php foreach ($items as $key=>$item):	?>
        <div class="projectItem <?php if(count($items)==$key+1) echo ' lastItem'; ?> uk-width-medium-1-2">

            <?php if($params->get('itemImage')): ?>
                <?php if($params->get('itemImage') && isset($item->image)): ?>
                <a class="moduleItemImage hoverAni" href="<?php echo $item->link; ?>" title="<?php echo JText::_('K2_CONTINUE_READING'); ?> &quot;<?php echo K2HelperUtilities::cleanHtml($item->title); ?>&quot;">
                    <img src="<?php echo $item->image; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>"/>
                </a>
                <?php endif; ?>
            <?php endif; ?>

            <!-- K2 Plugins: K2BeforeDisplay -->
            <?php echo $item->event->K2BeforeDisplay; ?>

            <?php if($params->get('itemTitle')): ?>
            <?php $title = $item->title; ?>
                <h3 class="product_title"><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h3>
            <?php endif; ?>

            <!-- K2 Plugins: K2BeforeDisplay -->
            <?php echo $item->event->K2BeforeDisplay; ?>
            <div class="product-toolbar">
                <?php if($params->get('itemDateCreated')): ?>
                <span class="moduleItemDateCreated"><i class="uk-icon-clock-o"></i> <?php echo JHTML::_('date', $item->created, JText::_('DATE_FORMAT_LC3')); ?></span>
                <?php endif; ?>

                <?php if($params->get('itemCategory')): ?>
                    <i class="uk-icon-gear"></i> <a class="moduleItemCategory" href="<?php echo $item->categoryLink; ?>"><?php echo $item->categoryname; ?></a>
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
            </div>
            <!-- K2 Plugins: K2BeforeDisplayContent -->
            <?php echo $item->event->K2BeforeDisplayContent; ?>
            <?php if($params->get('itemIntroText')): ?>
            <div class="moduleItemIntrotext">
            	<?php if($params->get('itemIntroText')): ?>
            	<p><?php echo $item->introtext; ?></p>
            	<?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- K2 Plugins: K2AfterDisplayContent -->
            <?php echo $item->event->K2AfterDisplayContent; ?>

        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

</div>
