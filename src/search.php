<?php
get_header();
?>
<div id="primary" class="site-content">
	<div id="content" role="main">
		<?php
		if (have_posts()):
		?>
			<header class="page-header">
				<h1 class="page-title"><?php printf(esc_html__('Search Results for: %s', 'rcg-forest'), '<span>' . get_search_query() . '</span>'); ?></h1>
			</header>
			<?php
			while (have_posts()):
				the_post();
				get_template_part('content', get_post_format());
			endwhile;
			// Navigation
			if ($wp_query->max_num_pages > 1):
			?>
				<nav id="nav-below" class="navigation" role="navigation">
					<h3 class="assistive-text"><?php _e('Post navigation', 'rcg-forest'); ?></h3>
					<div class="nav-previous"><?php next_posts_link(esc_html__('&larr; Older posts', 'rcg-forest')); ?></div>
					<div class="nav-next"><?php previous_posts_link(esc_html__('Newer posts &rarr;', 'rcg-forest')); ?></div>
				</nav>
			<?php
			endif;
		else:
		?>
			<article class="no-results">
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e('Nothing Found', 'rcg-forest'); ?></h1>
				</header>
				<div class="entry-content">
					<p><?php esc_html_e('Sorry, but no entries matched your search criteria. Please try again with different keywords.', 'rcg-forest'); ?></p>
				</div>
			</article>
		<?php
		endif;
		?>
	</div>
</div>
<?php
get_sidebar();
get_footer();
?>
