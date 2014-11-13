<?php
/**
 * Mission Atletica functions and definitions
 *
 * @package Mission Atletica
 */

// Set the version number
define( 'MAWP_VERSION', '0.1.0' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
//if ( ! isset( $content_width ) ) {
//	$content_width = 640; /* pixels */
//}

if ( ! function_exists( 'mission_atletica_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mission_atletica_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Mission Atletica, use a find and replace
		 * to change 'mission-atletica' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'mission-atletica', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'mission-atletica' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		/**
		 * Register custom image sizes
		 */
		add_image_size( 'mawp-sponsor-hp', 150, 150 );
	}
endif; // mission_atletica_setup
add_action( 'after_setup_theme', 'mission_atletica_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function mission_atletica_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'mission-atletica' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'mission_atletica_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mission_atletica_resources() {
	// Load our dev copies if script debug is enabled in WP.
	// Add define( 'SCRIPT_DEBUG', TRUE ); to wp_config.php (FOR DEV SERVERS ONLY!)
	$min = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'mission-atletica-fonts', "//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic|Oswald:400", array(), MAWP_VERSION );
	wp_enqueue_style( 'mawp-bootstrap', get_template_directory_uri() . '/assets/css/vendor/bootstrap.min.css', array(), '3.3.0' );
	wp_enqueue_style( 'bootstrap-select-style', get_template_directory_uri() . "/assets/css/bootstrap-select.min.css", array(), '1.6.3' );
	wp_enqueue_style( 'mission-atletica-style', get_template_directory_uri() . "/assets/css/mission-atletica.css", array(), MAWP_VERSION );

	wp_enqueue_script( 'mawp-bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array( 'jquery' ), '3.3.0', true );
	wp_enqueue_script( 'bootstrap-select-js', get_template_directory_uri() . "/assets/js/bootstrap-select.min.js", array( 'jquery' ), '1.6.3', true );
	wp_enqueue_script( 'mission-atletica-navigation', get_template_directory_uri() . "/assets/js/mission-atletica.js", array( 'jquery' ), MAWP_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mission_atletica_resources' );


function donate_func( $atts )
{
	$strResult = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top"><input name="cmd" type="hidden" value="_s-xclick" /><input name="hosted_button_id" type="hidden" value="ATMU6LX63YN26" /><button class="btn btn-primary btn-lg">Donate</button></form>';

	if($atts['type'] == "simple")
	{
		// use more elaborate payment form directly to missionatletica@gmail.com
		ob_start();
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input name="cmd" type="hidden" value="_donations" />
<input name="page_style" type="hidden" value="primary" />
<input name="image_url" type="hidden" value="<?php echo get_template_directory_uri(); ?>/images/PP_logo_313x100.png" />
<input name="cpp_logo_image" type="hidden" value="<?php echo get_template_directory_uri(); ?>/images/PP_logo_190x53.png" />
<input name="no_note" type="hidden" value="1" />
<input name="no_shipping" type="hidden" value="1" />
<input name="return" type="hidden" value="<?php echo esc_url( home_url() ); ?>/thank-you/" />
<input name="rm" type="hidden" value="1" />
<input name="cbt" type="hidden" value="Mission Atletica" />
<input name="cancel_return" type="hidden" value="<?php echo esc_url( home_url() ); ?>/donate/" />
<input name="item_name" type="hidden" value="Donation to Mission Atletica" />
<input name="business" type="hidden" value="MW68R2RMFJEAA" />
<button class="btn btn-primary btn-lg">Donate</button>
</form>
<?php
		$strResult = ob_get_clean();
	}
	else if($atts['type'] == "advanced")
	{
		// use more elaborate payment form directly to missionatletica@gmail.com
		ob_start();
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input name="cmd" id="pp_donations" type="hidden" value="_donations" />
<input name="cmd" id="pp_subscription" type="hidden" value="_xclick-subscriptions" disabled />
<input name="a3" id="pp_a3" type="hidden" value="" disabled />
<input name="p3" id="pp_p3" type="hidden" value="24" disabled />
<input name="t3" id="pp_t3" type="hidden" value="M" disabled />
<input name="page_style" type="hidden" value="primary" />
<input name="image_url" type="hidden" value="<?php echo get_template_directory_uri(); ?>/images/PP_logo_313x100.png" />
<input name="cpp_logo_image" type="hidden" value="<?php echo get_template_directory_uri(); ?>/images/PP_logo_190x53.png" />
<input name="no_note" type="hidden" value="1" />
<input name="no_shipping" type="hidden" value="1" />
<input name="return" type="hidden" value="<?php echo esc_url( home_url() ); ?>/thank-you/" />
<input name="rm" type="hidden" value="1" />
<input name="cbt" type="hidden" value="Mission Atletica" />
<input name="cancel_return" type="hidden" value="<?php echo esc_url( home_url() ); ?>/donate/" />
<input name="item_name" type="hidden" value="Donation to Mission Atletica" />
<input name="business" type="hidden" value="MW68R2RMFJEAA" />
<select name="amount" id="pp_amount" class="selectpicker">
	<option value="25.00">$25</option>
	<option value="50.00">$50</option>
	<option value="100.00" selected>$100</option>
	<option value="500.00">$500</option>
	<option value="">Other</option>
</select>
<br/>
<label><input type="checkbox" name="src" id="pp_src" value="1" /> Make it monthly</label>
<br/>
<button class="btn btn-primary btn-lg">Donate</button>
</form>
<?php
		$strResult = ob_get_clean();
	}

	return $strResult;
}
add_shortcode( 'donate', 'donate_func' );


/**
 * Load the Bootstrap walker class
 */
require get_template_directory() . '/includes/bootstrap-walker.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Load our post types
 */
require get_template_directory() . '/includes/post-types.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';