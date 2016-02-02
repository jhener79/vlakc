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
$link = hikashop_contentLink('product&task=show&cid='.$this->row->product_id.'&name='.$this->row->alias.$this->itemid.$this->category_pathway,$this->row);

if(!empty($this->row->extraData->top)) { echo implode("\r\n",$this->row->extraData->top); }

if($this->config->get('thumbnail',1)){ ?>
<!-- PRODUCT IMG -->
<div class="hikashop_product_image">
	<div class="hikashop_product_image_subdiv">
		<?php if($this->params->get('link_to_product_page',1)){ ?>
			<a href="<?php echo $link;?>" title="<?php echo $this->escape($this->row->product_name); ?>">
		<?php }
			$image_options = array('default' => true,'forcesize'=>$this->config->get('image_force_size',true),'scale'=>$this->config->get('image_scale_mode','inside'));
			$img = $this->image->getThumbnail(@$this->row->file_path, array('width' => $this->image->main_thumbnail_x, 'height' => $this->image->main_thumbnail_y), $image_options);
			if($img->success) {
				echo '<img class="hikashop_product_listing_image" title="'.$this->escape(@$this->row->file_description).'" alt="'.$this->escape(@$this->row->file_name).'" src="'.$img->url.'"/>';
			}
			$main_thumb_x = $this->image->main_thumbnail_x;
			$main_thumb_y = $this->image->main_thumbnail_y;
			if($this->params->get('display_badges',1)){
				$this->classbadge->placeBadges($this->image, $this->row->badges, -10, 0);
			}
			$this->image->main_thumbnail_x = $main_thumb_x;
			$this->image->main_thumbnail_y = $main_thumb_y;

		if($this->params->get('link_to_product_page',1)){ ?>
			</a>
		<?php } ?>
	</div>

	<?php

		$config =& hikashop_config();

		$wishlistEnabled = $config->get('enable_wishlist', 1);
		$hideForGuest = 1;
		if(($config->get('hide_wishlist_guest', 1) && hikashop_loadUser() != null) || !$config->get('hide_wishlist_guest', 1)){
			$hideForGuest = 0;
		}


		$button_class = 'tm-btn';
		if($this->params->get('add_to_cart') && empty($this->row->has_options)) {
			$button_class .= '-cbtn';
		}
		elseif (!empty($this->row->has_options)) {
			$button_class .= '-obtn';
		}
		if(hikashop_level(1) && $this->params->get('add_to_wishlist')  && $wishlistEnabled && !$hideForGuest && $this->config->get('display_add_to_wishlist_for_free_products','1') && empty($this->row->has_options)) {
			$button_class .= '-wbtn';
		}
		if(JRequest::getVar('hikashop_front_end_main',0) && JRequest::getVar('task')=='listing' && $this->params->get('show_compare')) {
			$button_class .= '-cmbtn';
		}
	?>

	<div class="tm-hp-product-buttons <?php echo $button_class;  ?>">

		<!-- COMPARISON AREA -->
		<?php
		if(JRequest::getVar('hikashop_front_end_main',0) && JRequest::getVar('task')=='listing' && $this->params->get('show_compare')) { ?>
			<?php

				$js = 'setToCompareList('.$this->row->product_id.',\''.$this->escape($this->row->product_name).'\',this); return false;'; ?>

				<a href="#" onclick="<?php echo $js; ?>" class="tm-hs-compare"><span class='tm-hs-acompare'><?php echo JText::_('ADD_TO_COMPARE_LIST'); ?></span></a>

		<?php } ?>

		<!-- ADD TO CART BUTTON AREA -->
		<?php
		if($this->params->get('add_to_cart') || $this->params->get('add_to_wishlist')){
			$this->setLayout('add_to_cart_listing');
			echo $this->loadTemplate();
		}?>
		<!-- EO ADD TO CART BUTTON AREA -->
	</div>

	<!-- EO COMPARISON AREA -->
	<?php if(!empty($this->row->extraData->bottom)) { echo implode("\r\n",$this->row->extraData->bottom); } ?>

	
</div>
<!-- EO PRODUCT IMG -->
<?php } ?>

<div class="tm-hs-product-details">

	<!-- PRODUCT NAME -->
	<div class="hikashop_product_name">
		<?php if($this->params->get('link_to_product_page',1)){ ?>
			<a href="<?php echo $link;?>">
		<?php }
			echo $this->row->product_name;
		if($this->params->get('link_to_product_page',1)){ ?>
			</a>
		<?php } ?>
	</div>
	<!-- EO PRODUCT NAME -->

	<!-- PRODUCT CODE -->
		<span class='hikashop_product_code_list'>
			<?php if ($this->config->get('show_code')) { ?>
				<?php if($this->params->get('link_to_product_page',1)){ ?>
					<a href="<?php echo $link;?>">
				<?php }
				echo $this->row->product_code;
				if($this->params->get('link_to_product_page',1)){ ?>
					</a>
				<?php } ?>
			<?php } ?>
		</span>
	<!-- EO PRODUCT CODE -->

	<!-- PRODUCT PRICE -->
	<?php
	if($this->params->get('show_price','-1')=='-1'){
		$config =& hikashop_config();
		$this->params->set('show_price',$config->get('show_price'));
	}
	if($this->params->get('show_price')){
		$this->setLayout('listing_price');
		echo $this->loadTemplate();
	}
	?>
	<!-- EO PRODUCT PRICE -->

	<?php if(!empty($this->row->extraData->afterProductName)) { echo implode("\r\n",$this->row->extraData->afterProductName); } ?>

	<!-- PRODUCT VOTE -->
	<?php
	if($this->params->get('show_vote_product')){
		$this->setLayout('listing_vote');
		echo $this->loadTemplate();
	}
	?>
	<!-- EO PRODUCT VOTE -->
</div>
