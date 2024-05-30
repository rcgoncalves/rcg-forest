<?php
get_header();
?>
<div id="primary" class="site-content">
	<div id="content" role="main">
		<?php
		if (have_posts()):
		?>
			<header class="archive-header">
				<h1 class="archive-title">
					<?php
					if (is_author()): // Author archive
						// Hack to allow the use of get_the_author()
						// We have to use rewind_posts() below
						the_post();
						esc_html_e('Author Archives: ', 'rcg-forest');
						echo get_the_author();
						rewind_posts();
					elseif (is_category()): // Category archive
						esc_html_e('Category Archives: ', 'rcg-forest');
						single_cat_title();
					elseif (is_tag()): // Tag archive
						esc_html_e('Tag Archives: ', 'rcg-forest');
						single_tag_title();
					elseif (is_day()): // Daily archive
						esc_html_e('Daily Archives: ', 'rcg-forest');
						echo get_the_date();
					elseif (is_month()): // Montly archive
						esc_html_e('Monthly Archives: ', 'rcg-forest');
						echo get_the_date('F Y');
					elseif (is_year()): // Yearly archive
						esc_html_e('Yearly Archives: ', 'rcg-forest');
						echo get_the_date('Y');
					else:
						esc_html_e('Archives', 'rcg-forest');
					endif;
					?>
				</h1>
				<?php
				// Additional info
				the_archive_description('<div class="archive-meta">', '</div>');
				?>
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
					<h3 class="assistive-text"><?php esc_html_e('Post navigation', 'rcg-forest'); ?></h3>
					<div class="nav-previous"><?php next_posts_link(esc_html__('&larr; Older posts', 'rcg-forest')); ?></div>
					<div class="nav-next"><?php previous_posts_link(esc_html__('Newer posts &rarr;', 'rcg-forest')); ?></div>
				</nav>
			<?php
			endif;
		else:
		?>
			<article class="no-results">
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e('No Results', 'rcg-forest'); ?></h1>
				</header>
				<div class="entry-content">
					<p><?php esc_html_e('Sorry, but no entries were found for this archive.', 'rcg-forest'); ?></p>
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
