<article class="uk-article" <?php if ($permalink) echo 'data-permalink="'.$permalink.'"'; ?>>

	<?php if ($image && $image_alignment == 'none') : ?>
		<?php if ($url) : ?>
			<a href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
		<?php else : ?>
			<img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($title) : ?>
	<h1 class="uk-article-title">
		<?php if ($url && $title_link) : ?>
			<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
		<?php else : ?>
			<?php echo $title; ?>
		<?php endif; ?>
	</h1>
	<?php endif; ?>

	<?php echo $hook_aftertitle; ?>

	<?php if ($author || $date || $category) : ?>
	<p class="uk-article-meta">

		<?php

			$author   = ($author && $author_url) ? '<a href="'.$author_url.'">'.$author.'</a>' : $author;
			$date     = ($date) ? ($datetime ? '<time datetime="'.$datetime.'">'.JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3')).'</time>' : JHtml::_('date', $date, JText::_('DATE_FORMAT_LC3'))) : '';
			$category = ($category && $category_url) ? '<a href="'.$category_url.'">'.$category.'</a>' : $category;

			if($author && $date) {
				echo '<span class="uk-meta-author-date">';
				printf(JText::_('TPL_WARP_META_AUTHOR_DATE'), $author, $date);
				echo '</span>';

			} elseif ($author) {
				echo '<span class="uk-meta-author">';
				printf(JText::_('TPL_WARP_META_AUTHOR'), $author);
				echo '</span>';
			} elseif ($date) {
				echo '<span class="uk-meta-date">';
				printf(JText::_('TPL_WARP_META_DATE'), $date);
				echo '</span>';
			}

			if ($category) {
				echo '<span class="uk-meta-category">';
				printf(JText::_('TPL_WARP_META_CATEGORY'), $category);
				echo '</span>';
			}

		?>

		<?php if ($tags) : ?>
			<span class="uk-meta-tags"><?php echo JText::_('TPL_WARP_TAGS').': '.$tags; ?></span>
		<?php endif; ?>

		<?php if ($edit) : ?>
			<?php echo $edit; ?>
		<?php endif; ?>

	</p>
	<?php endif; ?>


	<?php if ($image && $image_alignment != 'none') : ?>
		<?php if ($url) : ?>
			<a class="uk-align-<?php echo $image_alignment; ?>" href="<?php echo $url; ?>" title="<?php echo $image_caption; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a>
		<?php else : ?>
			<img class="uk-align-<?php echo $image_alignment; ?>" src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>">
		<?php endif; ?>
	<?php endif; ?>

	<?php echo $hook_beforearticle; ?>
	
	<?php if ($article) : ?>
	<div>
		<?php echo $article; ?>
	</div>
	<?php endif; ?>
	
	<?php if ($previous || $next) : ?>
	<ul class="uk-pagination">
		<?php if ($previous) : ?>
		<li class="uk-pagination-previous">
			<?php echo $previous; ?>
		</li>
		<?php endif; ?>

		<?php if ($next) : ?>
		<li class="uk-pagination-next">
			<?php echo $next; ?>
		</li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>

	<?php if ($more) : ?>
	<p>
		<a href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $more; ?></a>
	</p>
	<?php endif; ?>

	<?php echo $hook_afterarticle; ?>

</article>