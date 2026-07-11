<?php
/**
 * Template Name: Front Page Template
 */
get_header();
?>
<div id="primary" class="site-content">
	<div id="content" role="main">
		<?php
		while (have_posts()):
			the_post();
			get_template_part('content', 'page');
		endwhile;
		?>
	</div>
</div>
<?php 
get_sidebar('front');
get_footer();
?>
