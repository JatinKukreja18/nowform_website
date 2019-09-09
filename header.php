<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NowForm_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/vbk5vpt.css">
	<script src="<?php echo get_template_directory_uri() ?>/main.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nowform-theme' ); ?></a>

	<header id="masthead" class="site-header nf-header">
		<div class="site-branding nf-branding">
			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<a class="nf-logo href="">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="">
					<span class="brand-ball"></span>
				</a>
				<?php
			else :
				?>
				<a class="nf-logo href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="">
					<span class="brand-ball"></span>		
				</a>
				<?php
			endif;
			$nowform_theme_description = get_bloginfo( 'description', 'display' );
			if ( $nowform_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $nowform_theme_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation nf-navigation">
			<a class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" onClick="toggleMenu()">
			</a>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
