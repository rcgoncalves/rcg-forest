<?php
// Content width
if (!isset($content_width)) {
	$content_width = 625;
}
function rcg_forest_content_width() {
	if(is_page_template('page-templates/full-width.php') || is_attachment() || !is_active_sidebar('sidebar')) {
		global $content_width;
		$content_width = 960;
	}
}
add_action('template_redirect', 'rcg_forest_content_width');

// Basic setup
function rcg_forest_setup() {
	load_theme_textdomain('rcg-forest', get_template_directory() . '/languages');
	add_editor_style();
	add_theme_support('automatic-feed-links');
	register_nav_menu('primary', __('Primary Menu', 'rcg-forest'));
	add_theme_support('custom-background', array('default-color' => 'e6e6e6'));
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(200, 200);
}
add_action('after_setup_theme', 'rcg_forest_setup');

// Scripts and styles
function rcg_forest_scripts_styles() {
	global $wp_styles, $wp_scripts;
	if(is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	wp_enqueue_script('rcg-forest-navigation', get_template_directory_uri() . '/inc/navigation.js', array(), '20130708', true);
	wp_enqueue_style('rcg-forest-style', get_stylesheet_uri());
	wp_enqueue_style('rcg-forest-ie', get_template_directory_uri() . '/inc/ie.css', array('rcg-forest-style'), '20130708');
	$wp_styles->add_data('rcg-forest-ie', 'conditional', 'lt IE 9');
}
add_action('wp_enqueue_scripts', 'rcg_forest_scripts_styles');

// Title
function rcg_forest_wp_title($title, $sep) {
	global $paged, $page;
	$title = get_bloginfo('name') . " $sep " . $title;
	if($paged >= 2 || $page >= 2) {
		$title .= sprintf(__('Page %s', 'rcg-forest'), max($paged, $page));
	}
	else {
		$title = preg_replace('#\\s\\|\\s$#', '', $title);
	}
	return $title;
}
add_filter('wp_title', 'rcg_forest_wp_title', 10, 2);

// Body classes
function rcg_forest_body_class($classes) {
	if(!is_active_sidebar('sidebar') || is_page_template('page-templates/full-width.php')) {
		$classes[] = 'full-width';
	}
	if(is_page_template('page-templates/front-page.php')) {
		$classes[] = 'template-front-page';
	}
	return $classes;
}
add_filter('body_class', 'rcg_forest_body_class');


// Widgets
// Global sidebar
// Global footer (x3)
// Front page footer (x3)
function rcg_forest_widgets_init() {
	register_sidebar(array(
		'name' => __('Sidebar', 'rcg-forest'),
		'id' => 'sidebar',
		'description' => __('Appears on posts and pages sidebar, except when using a custom page template.', 'rcg-forest'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('First Footer Widget', 'rcg-forest'),
		'id' => 'footer-l',
		'description' => __('Appears on posts and pages footer (left), except when using Front Page template.', 'rcg-forest'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Second Footer Widget', 'rcg-forest'),
		'id' => 'footer-c',
		'description' => __('Appears on posts and pages footer (center), except when using Front Page template.', 'rcg-forest'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Third Footer Widget', 'rcg-forest'),
		'id' => 'footer-r',
		'description' => __('Appears on posts and pages footer (right), except when using Front Page template.', 'rcg-forest'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('First Front Page Footer Widget', 'rcg-forest'),
		'id' => 'front-footer-l',
		'description' => __('Appears when using Front Page template on footer (left).', 'rcg-forest'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Second Front Page Footer Widget', 'rcg-forest'),
		'id' => 'front-footer-c',
		'description' => __('Appears when using Front Page template on footer (center).', 'rcg-forest'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => __('Third Front Page Footer Widget', 'rcg-forest'),
		'id' => 'front-footer-r',
		'description' => __('Appears when using Front Page template on footer (right).', 'rcg-forest'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action('widgets_init', 'rcg_forest_widgets_init');


// Custom header
function rcg_forest_custom_header_setup() {
	$args = array(
		'default-text-color'     => 'ddd',
		'default-image'          => get_template_directory_uri() . '/inc/forest.png',
		'height'                 => 150,
		'width'                  => 1040,
		'max-width'              => 1040,
		'flex-height'            => true,
		'flex-width'             => true,
		'random-default'         => false,
		'wp-head-callback'       => 'rcg_forest_header_style',
		'admin-head-callback'    => 'rcg_forest_admin_style',
		'admin-preview-callback' => 'rcg_forest_admin_html',
	);

	add_theme_support('custom-header', $args);
}
add_action('after_setup_theme', 'rcg_forest_custom_header_setup');

// Frontend style
function rcg_forest_header_style() {
	$text_color = get_header_textcolor();

	if($text_color == get_theme_support('custom-header', 'default-text-color')) {
		return;
	}

	?>
	<style type="text/css">
		<?php
		if(!display_header_text()) :
		?>
			.site-top1 {
				position: absolute !important;
				clip: rect(1px 1px 1px 1px);
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		else :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo $text_color; ?>!important;
			}
		<?php
		endif;
		?>
	</style>
	<?php
}

// Backend style
function rcg_forest_admin_style() {
	$text_color = get_header_textcolor();
	?>
	<style type="text/css">
	#top {
		border: 1px dashed #666;
	}
	#top1 {
		<?php
		if(!display_header_text()) :
		?>
			display: none;
		<?php
			endif;
		?>
		background-color: #222;
		border-bottom: 3px solid #999;
		width: 1040px;
	}
	#top1 h1,
	#top1 h2 {
		display: inline-block;
		font-family: Helvetica,sans-serif;
		line-height:2;
		padding: 0 0 0 1rem;
	}
	#top1 h1 {
		font-size: 2rem;
	}
	#top1 h2 {
		font-size:1.3rem;
		font-weight:normal;
		text-shadow:none;
		color:#<?php echo $text_color; ?>;
	}
	#top1 h1 a {
		color:#<?php echo $text_color; ?>;
		text-decoration:none;
	}
	#top1 h1 a:hover {
		color:#21759b;
	}
	#top2 {
		width: 1040px;
	}
	#top2 img {
		display: block;
		margin: 0 auto;
		max-width: 100%;
	}
	</style>
<?php
}

// Backend HTML
function rcg_forest_admin_html() {
?>
	<div id="top">
		<div id="top1">
			<h1><a href="http://google.com"><?php bloginfo('name'); ?></a></h1>
			<h2><?php bloginfo('description'); ?></h2>
		</div>
		<div id="top2">
			<?php
			$image = get_header_image();
			if(!empty($image)) :
			?>
				<img src="<?php echo esc_url($image); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo('name'); ?>" />
			<?php
			endif;
			?>
		</div>
	</div>
<?php
}


// Prints entry meta information (category and author).
if(!function_exists('rcg_entry_meta')) :
function rcg_entry_meta() {
	$author = sprintf('<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url(get_author_posts_url(get_the_author_meta('ID'))),
		esc_attr(sprintf(__('View all posts by %s', 'rcg-forest'), get_the_author())),
		get_the_author()
	);
	$categories_list = get_the_category_list(__(', ', 'rcg-forest'));
	$tags_list = get_the_tag_list('', __(', ', 'rcg-forest'));

	if($categories_list) {
		$utility_text = __('Published by <span class="by-author">%1$s</span>, in %2$s.', 'rcg-forest');
	} else {
		$utility_text = __('Published by <span class="by-author">%1$s</span>.', 'rcg-forest');
	}
	if(is_single() && $tags_list) {
		$utility_text .= ' Tagged with %3$s.';
	}

	printf($utility_text, $author, $categories_list, $tags_list);
}
endif;

// Prints entry date.
if(!function_exists('rcg_entry_date')) :
function rcg_entry_date() {
	$date = sprintf('<time class="entry-date" datetime="%1$s">%2$s</time>',
		esc_attr(get_the_date('c')),
		esc_html(get_the_date())
	);
	echo $date;
}
endif;

// Fix issue with invalid rel types.
function rcg_fix_category_tag ($cat_output) {
	return str_replace(array('rel="category tag"', 'rel="category"'), '', $cat_output);
}
add_filter('the_category', 'rcg_fix_category_tag');
