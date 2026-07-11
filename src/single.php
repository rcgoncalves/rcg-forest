<?php
get_header();
?>
<div id="primary" class="site-content">
	<div id="content" role="main">
		<?php
		while (have_posts()):
			the_post();
			get_template_part('content', get_post_format());
			?>
			<nav class="nav-single">
				<h3 class="assistive-text"><?php esc_html_e('Post navigation', 'rcg-forest'); ?></h3>
				<span class="nav-previous"><?php previous_post_link('%link', esc_html_x('&larr;', 'Previous post link', 'rcg-forest') . ' %title'); ?></span>
				<span class="nav-next"><?php next_post_link('%link', '%title ' . esc_html_x('&rarr;', 'Next post link', 'rcg-forest')); ?></span>
			</nav>
			<?php
			comments_template('', true);
		endwhile;
		?>
	</div>
</div>
<?php
get_sidebar();
get_footer();
?>
