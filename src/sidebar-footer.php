<?php
if(is_active_sidebar('footer-l') || is_active_sidebar('footer-m') || is_active_sidebar('footer-r')) :
?>
	<div id="footer-widgets-block">
		<div id="secondary-footer" class="widget-area" role="complementary">
			<?php
			if(is_active_sidebar('footer-l')) : ?>
				<div class="left-widget footer-widgets">
					<?php dynamic_sidebar('footer-l'); ?>
				</div>
			<?php
			endif;
			if(is_active_sidebar('footer-c')) :
			?>
				<div class="center-widget footer-widgets">
					<?php dynamic_sidebar('footer-c'); ?>
				</div>
			<?php
			endif;
			if(is_active_sidebar('footer-r')) :
			?>
				<div class="right-widget footer-widgets">
					<?php dynamic_sidebar('footer-r'); ?>
				</div>
			<?php
			endif;
		?>
		</div>
	</div>
<?php
endif;
?>
