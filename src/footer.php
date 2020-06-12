				</div>
			</div>
			<?php
			if(!is_page_template('page-templates/front-page.php')) {
				get_sidebar('footer');
			}
			?>
			<footer id="colophon" role="contentinfo">
				<div class="site-info">
				<?php
					if (function_exists('the_privacy_policy_link')) {
						the_privacy_policy_link( '', ' |' );
					}
					?>
					<a href="https://wordpress.org/" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'rcg-forest'); ?>"><?php _e('Proudly powered by WordPress', 'rcg-forest' ); ?></a>
					|
					<a href="https://rcgoncalves.pt/project/rcg-forest/"><?php _e('Theme RCG Forest', 'rcg-forest'); ?></a>
				</div>
			</footer>
		</div>
		<?php
		wp_footer();
		?>
	</body>
</html>

