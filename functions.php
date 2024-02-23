<?php  
/**
 * SKT Coffee functions and definitions
 *
 * @package SKT Coffee
 */
 
 global $content_width;
 if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */ 

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'skt_coffee_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_coffee_setup() {
	load_theme_textdomain( 'skt-coffee', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 200,
		'flex-height' => true,
	) );
	add_theme_support( 'custom-header', array( 'header-text' => false ) );
	
	add_image_size('skt-coffee-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'skt-coffee' ),
		'footer' => __( 'Footer Menu', 'skt-coffee' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // skt_coffee_setup
add_action( 'after_setup_theme', 'skt_coffee_setup' );

function skt_coffee_widgets_init() { 
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'skt-coffee' ),
		'description'   => __( 'Appears on blog page sidebar', 'skt-coffee' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Info', 'skt-coffee' ),
		'description'   => __( 'Appears on header of site', 'skt-coffee' ),
		'id'            => 'header-info',
		'before_widget' => '<div class="headerinfo">',	
		'after_widget'  => '</div>',	
		'before_title'  => '<h3 style="display:none">',
		'after_title'   => '</h3>',		
	) );		
	
}
add_action( 'widgets_init', 'skt_coffee_widgets_init' );


function skt_coffee_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on','roboto:on or off','skt-coffee');		
		
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$scada = _x('on','Scada:on or off','skt-coffee');	
		
		if('off' !== $roboto ){
			$font_family = array();
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}
					
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function skt_coffee_scripts() {
	wp_enqueue_style('skt-coffee-font', skt_coffee_font_url(), array());
	wp_enqueue_style('skt-coffee-basic-style', get_stylesheet_uri() );
	wp_enqueue_style('skt-coffee-editor-style', get_template_directory_uri().'/editor-style.css');
	wp_enqueue_style('nivo-slider', get_template_directory_uri().'/css/nivo-slider.css');
	wp_enqueue_style('skt-coffee-main-style', get_template_directory_uri().'/css/responsive.css');		
	wp_enqueue_style('skt-coffee-style-base', get_template_directory_uri().'/css/style_base.css');
	wp_enqueue_script('nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script('skt-coffee-custom', get_template_directory_uri() . '/js/custom.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_coffee_scripts' );

define('SKT_COFFEE_URL','https://www.sktthemes.org');
define('SKT_COFFEE_THEME_DOC','http://sktthemesdemo.net/documentation/coffee-doc/');
define('SKT_COFFEE_PRO_THEME_URL','https://www.sktthemes.org/shop/coffee-restaurant-wordpress-theme/');
define('SKT_COFFEE_LIVE_DEMO','https://sktthemesdemo.net/coffee-shop/');
define('SKT_COFFEE_THEMES','https://www.sktthemes.org/themes/');
define('SKT_FREE_THEME_URL','https://www.sktthemes.org/product-category/free-wordpress-themes/');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

if ( ! function_exists( 'skt_coffee_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_coffee_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

// get slug by id
function skt_coffee_get_slug_by_id($id) {
	$skt_coffee_post_data = get_post($id, ARRAY_A);
	$slug = $skt_coffee_post_data['post_name'];
	return $slug; 
}

function skt_coffee_customizer_styles() {
    wp_enqueue_style( 'skt-coffee-customizer', trailingslashit( get_template_directory_uri() ).'css/customizer.css', null );
}
add_action( 'customize_controls_print_styles', 'skt_coffee_customizer_styles', 99 );