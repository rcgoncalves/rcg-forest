<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<div class="entry-content">
		<?php 
		the_content();
		wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'rcg-forest'), 'after' => '</div>'));
		?>
	</div>
	<footer class="entry-meta">
		<?php
		edit_post_link(esc_html__('Edit', 'rcg-forest'), '<span class="edit-link">', '</span>');
		?>
	</footer>
</article>
