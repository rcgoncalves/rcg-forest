<?php
get_header();
?>
<div id="primary" class="site-content">
	<div id="content" role="main">
	<?php
	while(have_posts()) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('image-attachment'); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<h2 class="entry-date"><?php rcg_entry_date(); ?></h2>
			</header>
			<div class="entry-content">
				<div class="entry-attachment">
					<div class="attachment">
						<a href="<?php echo wp_get_attachment_url(); ?>" rel="attachment">
							<?php
							echo wp_get_attachment_image($post->ID, 'full');
							?>
							</a>
						<?php
						if(!empty($post->post_excerpt)) : // caption
						?>
							<div class="entry-caption">
								<?php
								the_excerpt();
								?>
							</div>
							<?php
							endif;
							?>
						</div>
					</div>
					<div class="entry-description">
						<?php
						the_content();
						?>
					</div>
				</div>
				<footer class="entry-meta">
					<?php
					rcg_entry_meta();
					edit_post_link(__('Edit', 'rcg-forest'), ' <span class="edit-link">', '</span>');
					if(comments_open()) :
					?>
						<span class="comments-link">
							<?php comments_popup_link('<span class="leave-reply">' . __('Leave a reply', 'rcg-forest') . '</span>', __('1 Reply', 'rcg-forest'), __('% Replies', 'rcg-forest')); ?>
						</span>
					<?php
					endif;
					?>
				</footer>
			</article>
			<nav id="image-navigation" class="navigation" role="navigation">
				<span class="nav-previous"><?php previous_image_link(false, __('&larr; Previous', 'rcg-forest')); ?></span>
				<span class="nav-next"><?php next_image_link(false, __('Next &rarr;', 'rcg-forest')); ?></span>
			</nav>
			<?php
			comments_template();
		endwhile;
		?>
	</div>
</div>
<?php
get_footer();
?>
