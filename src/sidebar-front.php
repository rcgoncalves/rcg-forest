<?php
if (is_active_sidebar('front-footer-l') || is_active_sidebar('front-footer-m') || is_active_sidebar('front-footer-r')):
?>
	<div id="secondary" class="widget-area" role="complementary">
			<?php
			if (is_active_sidebar('front-footer-l')): ?>
				<div class="left-widget front-widgets">
					<?php dynamic_sidebar('front-footer-l'); ?>
				</div>
			<?php
			endif;
			if (is_active_sidebar('front-footer-c')):
			?>
				<div class="center-widget front-widgets">
					<?php dynamic_sidebar('front-footer-c'); ?>
				</div>
			<?php
			endif;
			if (is_active_sidebar('front-footer-r')):
			?>
				<div class="right-widget front-widgets">
					<?php dynamic_sidebar('front-footer-r'); ?>
				</div>
			<?php
			endif;
		?>
	</div>
<?php
endif;
?>
