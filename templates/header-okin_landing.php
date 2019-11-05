<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eCommerce_Gem
 */

?>
<?php
	/**
	 * Hook - ecommerce_gem_doctype.
	 *
	 * @hooked ecommerce_gem_doctype_action - 10
	 */
	do_action( 'ecommerce_gem_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - ecommerce_gem_head.
	 *
	 * @hooked ecommerce_gem_head_action - 10
	 */
	do_action( 'ecommerce_gem_head' );
	
	wp_head(); ?>
        <script src="https://kit.fontawesome.com/91d7a4fcd8.js"></script>
</head>

<body <?php body_class(); ?>>

	<!--div id="page" class="site"-->

	<!--================Landing Header Area =================-->
	<header class="landing-header">
            <div class="container">
	        <div class="landing-header-nav">
		    <ul class="landing-header-list">
			<div class="left">
		        <li class="landing-header-logo"><img src="<?php echo get_stylesheet_directory_uri() . '/images/okin-logotipo.png'; ?>" /></li>
		        <li class="landing-header-display"><?php _e( 'ATLETAS', 'ecommerce-gem-child'); ?></li>
			</div>
			<div class="right">
		        <li class="landing-header-link"><a href="<?php echo home_url( '/atletas-okin/', 'https' ); ?>"><?php _e('Atletas Okin', 'ecommerce-gem-child'); ?></a></li>
		        <li class="landing-header-link"><a href="#join"><?php _e('Únete', 'ecommerce-gem-child'); ?></a></li>
		        <li class="landing-header-link no-mobile"><a href="<?php echo esc_url('https://okinsport.com'); ?>">OkinSport</a></li>
			</div>
		    </ul>
                </div>
            </div>
        </header>
        <!--================End Header Area =================-->
