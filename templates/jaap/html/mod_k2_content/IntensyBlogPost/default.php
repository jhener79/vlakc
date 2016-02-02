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
 $sec_desc = 0;
?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="IntensyBPost<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">

    <?php if(count($items)): ?>
    <div class="blog-post">

        <?php if($params->get('itemPreText')) : ?>
        <div class="module-desc-holder uk-hidden-large">
            <div class="module-desc">
                <h3 class="module-title">
                    <?php echo $module->title; ?>
                </h3>
                <p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
            </div>
        </div>
        <?php endif; ?>

        <?php foreach ($items as $key=>$item):  ?>
            <?php $sec_desc++; ?>
        <div class="<?php echo ($key%2) ? "odd" : "even"; if(count($items)==$key+1) echo ' lastItem'; ?>">
            <?php if($params->get('itemReadMore') && $item->fulltext): ?>
            <a class="moduleItemReadMore" href="<?php echo $item->link; ?>">
                <i class="uk-icon-plus"></i>
            </a>
            <?php endif; ?>
            
            <?php if($params->get('itemImage') && isset($item->image)): ?>
                <a class="moduleItemImage" style="background-image: url('<?php echo $item->image; ?>');" href="<?php echo $item->link; ?>" title="<?php echo JText::_('K2_CONTINUE_READING'); ?> &quot;<?php echo K2HelperUtilities::cleanHtml($item->title); ?>&quot;">
                    <span class="image-over-style"></span>
                </a>
            <?php endif; ?>

            <?php if($params->get('itemIntroText') or $params->get('itemTitle')): ?>
                <div class="detailHolder">
                    <?php if($params->get('itemTitle')): ?>
                        <h3 class="moduleItemTitle">
                            <a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
                        </h3>
                    <?php endif; ?>

                    <?php if($params->get('itemIntroText')): ?>
                        <p>
                            <?php echo $item->introtext; ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if($params->get('itemPreText') && $sec_desc== 2) : ?>
        <div class="module-desc-holder uk-visible-large">
            <div class="module-desc">
                <h3 class="module-title">
                    <?php echo $module->title; ?>
                </h3>
                <p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
            </div>
        </div>
        <?php endif; ?>

        <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
