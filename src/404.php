<?php
get_header();
?>
<div id="primary" class="site-content">
	<div id="content" role="main">
		<article class="error404">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Error 404: Page Not Found', 'rcg-forest' ); ?></h1>
			</header>
			<div class="entry-content">
				<p><?php _e( 'We can not find what you are looking for.', 'rcg-forest' ); ?></p>
				<p><?php printf( __( 'Return <a href="%s">home</a>, or try search.', 'rcg-forest'), esc_url( get_home_url() ) ); ?></p>
			</div>
		</article>
	</div>
</div>
<?php
get_footer();
?>
