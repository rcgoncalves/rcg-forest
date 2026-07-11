<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if (is_single()):
		?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php
		else:
			if (!is_search()):
			?>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'rcg-forest'), the_title_attribute('echo=0'))); ?>" rel="bookmark" class="post-thumbnail"><?php the_post_thumbnail();?></a>
			<?php
			endif;
			?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'rcg-forest'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
		<?php
		endif;
		?>
		<h2 class="entry-date"><?php rcg_forest_entry_date(); ?></h2>
	</header>
	<?php
	if (is_search()):
	?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	<?php
	else:
	?>
		<div class="entry-content">
			<?php
			the_content(esc_html__('Continue reading &rarr;', 'rcg-forest'));
			?>
		</div>
		<?php
		if (is_single()):
			wp_link_pages(array('before' =>'<div class="page-links">' . esc_html__('Pages:', 'rcg-forest'), 'after' => '</div>'));
			?>
		<?php
		endif;
		?>
		<footer class="entry-meta">
			<?php
			rcg_forest_entry_meta();
			edit_post_link(esc_html__('Edit', 'rcg-forest'), ' <span class="edit-link">', '</span>');
			if (comments_open()):
			?>
				<span class="comments-link">
					<?php comments_popup_link('<span class="leave-reply">' . esc_html__('Leave a reply', 'rcg-forest') . '</span>', esc_html__('1 Reply', 'rcg-forest'), esc_html__('% Replies', 'rcg-forest')); ?>
				</span>
			<?php
			endif;
			?>
		</footer>
	<?php
	endif;
	?>
</article>
