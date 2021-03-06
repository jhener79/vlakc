<?php
/**
 * @version		$Id: category_item.php 1812 2013-01-14 18:45:06Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<!-- Start K2 Item Layout -->
<div class="catItemView catItemBlog  group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' catItemIsFeatured' : ''; ?><?php if($this->item->params->get('pageclass_sfx')) echo ' '.$this->item->params->get('pageclass_sfx'); ?>">
	
	<div class="blog-content-block">
		<?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
	  	<!-- Item Image -->
	  	<div class="catItemImageBlock">
		  	<div class="catItemImage">
		   		<a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
			    	<span class="catItemLink"></span>
			    	<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
		    	</a>
		  		<div class="blog-info-block">
					<?php if($this->item->params->get('catItemDateCreated')): ?>
					<!-- Date created -->
						<?php 
							$createDay = date('d', strtotime( $this->item->created ));
							$createMonth = JText::_(strtoupper(date('F', strtotime( $this->item->created )))."_SHORT");
							$createYear = date('Y', strtotime( $this->item->created ));
						?>
						<span class="catItemDateCreated">				
							<span class="blog-date"><?php echo $createDay; ?></span>
							<span class="blog-month"><?php echo $createMonth ."  ". $createYear;?></span>
						</span>
					<?php endif; ?>

					<?php if($this->item->params->get('catItemRating')): ?>
					<!-- Item Rating -->
					<div class="catItemRatingBlock">

						<div id="itemRatingLog<?php echo $this->item->id; ?>" class="itemRatingLog">
							<i class="uk-icon-heart"></i> 
							<?php  preg_match('/([0-9]\d*)/',  $this->item->numOfvotes, $votes); ?>
							<?php echo $votes[1]; ?></div>
						<div class="clr"></div>
					</div>
					<?php endif; ?>

					<div class="catItemShareBlock" data-uk-dropdown>
					    <!-- This is the element toggling the dropdown -->
					    <div class="caTshare">
					    	<i class="uk-icon-share"></i>
					    	<span>Share</span>
					    </div>

					    <!-- This is the dropdown -->
					    <div class="uk-dropdown uk-dropdown-small uk-dropdown-flip">
			    	    	<ul class="uk-nav uk-nav-dropdown">
			    	    		<li class="share_title"><span>Share on</span></li>
			    		    	<li class="facebook_share">
			    		    		<a class="prettySocial" href="#" data-type="facebook" data-title="<?php echo $this->item->title; ?>" data-description="<?php echo strip_tags($this->item->introtext); ?>" data-url="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$this->item->link; ?>" data-media="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$this->item->image; ?>">
			    		    			<i class="uk-icon-facebook"></i>
			    		    			<span class="share_text">Share</span>
			    		    		</a>
			    		    	</li>
			    		    	<li class="twitter_share">
			    		    		<a class="prettySocial" href="#" data-type="twitter" data-title="<?php echo $this->item->title; ?>" data-description="<?php echo strip_tags($this->item->introtext); ?>" data-url="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$this->item->link; ?>" data-media="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$this->item->image; ?>">
				    		    		<i class="uk-icon-twitter"></i>
				    		    		<span class="share_text">Tweet</span>
			    		    		</a>
			    		    	</li>
			    		    	<li class="google_share">
			    		    		<a class="prettySocial" href="#" data-type="googleplus" data-title="<?php echo $this->item->title; ?>" data-description="<?php echo strip_tags($this->item->introtext); ?>" data-url="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$this->item->link; ?>" data-media="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$this->item->image; ?>">
			    		    			<i class="uk-icon-google-plus"></i>
			    		    			<span class="share_text">Share</span>
			    		    		</a>
			    		    	</li>
			    		    </ul>
					    </div>
					</div>
				</div>
		  	</div>
	  	</div>
	  	<?php endif; ?>

	  	<?php if($this->item->params->get('catItemTitle')): ?>
	  	<!-- Item title -->
	  	<h3 class="catItemTitle">
			<?php if(isset($this->item->editLink)): ?>
			<!-- Item edit link -->
			<span class="catItemEditLink">
				<a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>">
					<?php echo JText::_('K2_EDIT_ITEM'); ?>
				</a>
			</span>
			<?php endif; ?>

		  	<?php if ($this->item->params->get('catItemTitleLinked')): ?>
				<a href="<?php echo $this->item->link; ?>">
		  		<?php echo $this->item->title; ?>
		  	</a>
		  	<?php else: ?>
		  	<?php echo $this->item->title; ?>
		  	<?php endif; ?>

		  	<?php if($this->item->params->get('catItemFeaturedNotice') && $this->item->featured): ?>
		  	<!-- Featured flag -->
		  	<span>
			  	<sup>
			  		<?php echo JText::_('K2_FEATURED'); ?>
			  	</sup>
		  	</span>
		  	<?php endif; ?>
	  	</h3>
	  	<?php endif; ?>

	  	<!-- K2 Plugins: K2BeforeDisplay -->
		<?php echo $this->item->event->K2BeforeDisplay; ?>

		<div class="catItemToolbar">
		  

			<?php if($this->item->params->get('catItemAuthor')): ?>
			<!-- Item Author -->
			<span class="catItemAuthor">
				<i class="uk-icon-user"></i>
				<?php echo K2HelperUtilities::writtenBy($this->item->author->profile->gender); ?> 
				<?php if(isset($this->item->author->link) && $this->item->author->link): ?>
				<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
				<?php else: ?>
				<?php echo $this->item->author->name; ?>
				<?php endif; ?>
			</span>
			<?php endif; ?>
			<!-- Item tags -->
		 <?php if(
		  $this->item->params->get('catItemHits') ||
		  $this->item->params->get('catItemTags') ||
		  $this->item->params->get('catItemAttachments')
		  ): ?>
		  	<div class="catItemLinks">

				<?php if($this->item->params->get('catItemHits')): ?>
				<!-- Item Hits -->
				<div class="catItemHitsBlock">
					<span class="catItemHits">
						<?php echo JText::_('K2_READ'); ?> <b><?php echo $this->item->hits; ?></b> <?php echo JText::_('K2_TIMES'); ?>
					</span>
				</div>
				<?php endif; ?>

			  <?php if($this->item->params->get('catItemTags') && count($this->item->tags)): ?>
			  <!-- Item tags -->
			  <div class="catItemTagsBlock">
				  <span><span class="uk-icon-tag"></span> <?php echo JText::_('K2_TAGGED_UNDER'); ?></span>
				  <ul class="catItemTags">
				    <?php foreach ($this->item->tags as $tag): ?>
				    <li><a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a></li>
				    <?php endforeach; ?>
				  </ul>
				  <div class="clr"></div>
			  </div>
			  <?php endif; ?>

			  <?php if($this->item->params->get('catItemAttachments') && count($this->item->attachments)): ?>
			  <!-- Item attachments -->
			  <div class="catItemAttachmentsBlock">
				  <span><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></span>
				  <ul class="catItemAttachments">
				    <?php foreach ($this->item->attachments as $attachment): ?>
				    <li>
					    <a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>">
					    	<?php echo $attachment->title ; ?>
					    </a>
					    <?php if($this->item->params->get('catItemAttachmentsCounter')): ?>
					    <span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)</span>
					    <?php endif; ?>
				    </li>
				    <?php endforeach; ?>
				  </ul>
			  </div>
			  <?php endif; ?>

				<div class="clr"></div>
			</div>
			<?php endif; ?>

			<?php if($this->item->params->get('catItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
			<!-- Anchor link to comments below -->
			<div class="catItemCommentsLink">
				<i class="uk-icon-comment"></i>
				<?php if(!empty($this->item->event->K2CommentsCounter)): ?>
					<!-- K2 Plugins: K2CommentsCounter -->
					<?php echo $this->item->event->K2CommentsCounter; ?>
				<?php else: ?>
					<?php if($this->item->numOfComments > 0): ?>
					<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
						<?php echo $this->item->numOfComments; ?> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
					</a>
					<?php else: ?>
					<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
						<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
					</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="clr"></div>
		</div>

		<div class="catItemText">
		  <!-- Plugins: BeforeDisplayContent -->
		  <?php echo $this->item->event->BeforeDisplayContent; ?>

		  <?php if($this->item->params->get('catItemIntroText')): ?>
		  <!-- Item introtext -->
		  <div class="catItemIntroText">
		  	<?php echo $this->item->introtext; ?>
		  </div>
		  <?php endif; ?>

			<div class="clr"></div>

		  <?php if($this->item->params->get('catItemExtraFields') && count($this->item->extra_fields)): ?>
		  <!-- Item extra fields -->
		  <div class="catItemExtraFields">
		  	<h4><?php echo JText::_('K2_ADDITIONAL_INFO'); ?></h4>
		  	<ul>
				<?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
				<?php if($extraField->value != ''): ?>
				<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
					<?php if($extraField->type == 'header'): ?>
					<h4 class="catItemExtraFieldsHeader"><?php echo $extraField->name; ?></h4>
					<?php else: ?>
					<span class="catItemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
					<span class="catItemExtraFieldsValue"><?php echo $extraField->value; ?></span>
					<?php endif; ?>
				</li>
				<?php endif; ?>
				<?php endforeach; ?>
				</ul>
		    <div class="clr"></div>
		  </div>
		  <?php endif; ?>
		  <!-- Plugins: AfterDisplayContent -->
		  <?php echo $this->item->event->AfterDisplayContent; ?>
		  <div class="clr"></div>
	  	</div>

	  	<?php if ($this->item->params->get('catItemReadMore')): ?>
		<!-- Item "read more..." link -->
		<div class="catItemReadMore">
			<a class="k2ReadMore readon" href="<?php echo $this->item->link; ?>">
				<?php echo JText::_('K2_READ_MORE'); ?>
			</a>
		</div>
		<?php endif; ?>

		<?php if($this->item->params->get('catItemVideo') && !empty($this->item->video)): ?>
		<!-- Item video -->
		<div class="catItemVideoBlock">
			<h3><?php echo JText::_('K2_RELATED_VIDEO'); ?></h3>
			<?php if($this->item->videoType=='embedded'): ?>
			<div class="catItemVideoEmbedded">
				<?php echo $this->item->video; ?>
			</div>
			<?php else: ?>
			<span class="catItemVideo"><?php echo $this->item->video; ?></span>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if($this->item->params->get('catItemImageGallery') && !empty($this->item->gallery)): ?>
		<!-- Item image gallery -->
		<div class="catItemImageGallery">
		  <h4><?php echo JText::_('K2_IMAGE_GALLERY'); ?></h4>
		  <?php echo $this->item->gallery; ?>
		</div>
		<?php endif; ?>
		<div class="clr"></div>
	</div>
</div>
<!-- End K2 Item Layout -->
