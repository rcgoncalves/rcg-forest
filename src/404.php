<?php
get_header();
?>
<div id="primary" class="site-content">
	<div id="content" role="main">
		<article class="error404">
			<header class="entry-header">
				<h1 class="entry-title"><?php esc_html_e('Error 404: Page Not Found', 'rcg-forest'); ?></h1>
			</header>
			<div class="entry-content">
				<p><?php esc_html_e('We can not find what you are looking for.', 'rcg-forest'); ?></p>
				<p>
					<?php
					printf(
						wp_kses(
							__('Return <a href="%s">home</a>, or try search.', 'rcg-forest'),
							array('a' => array('href' => array()))
						),
						esc_url(get_home_url())
					);
					?>
				</p>
			</div>
		</article>
	</div>
</div>
<?php
get_footer();
?>
