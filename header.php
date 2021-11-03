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
	<meta name="pinterest" content="nopin" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/vbk5vpt.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/style.css">
	<!-- <script src="<?php echo get_template_directory_uri() ?>/js/jquery.min.js"></script> -->
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
	<script src="<?php bloginfo("template_url") ?>/js/main.js"></script>
</head>

<body <?php body_class(); ?>>
 <div id="wptime-plugin-preloader"></div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nowform-theme' ); ?></a>

	<header id="masthead" class="site-header nf-header">
		<div class="site-branding nf-branding">
			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<a class="nf-logo" href="">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="181" height="30" viewBox="0 0 181 30">
					<defs>
						<path id="a" d="M.069.063h20.193v21.702H.069z"/>
					</defs>
					<g fill="none" fill-rule="evenodd">
						<path class="brand-ball" fill="#301FFF" d="M181 25.882A4.122 4.122 0 0 1 176.874 30a4.123 4.123 0 0 1-4.128-4.118 4.123 4.123 0 0 1 4.128-4.117A4.122 4.122 0 0 1 181 25.882"/>
						<path fill="currentColor" d="M11.214 8.824a6.58 6.58 0 0 0-2.036.296 6.984 6.984 0 0 0-2.953 1.84c-.373.397-.69.793-.956 1.187-.028-.183-.06-.408-.102-.671a19.49 19.49 0 0 0-.139-.812 11.994 11.994 0 0 0-.18-.791 2.274 2.274 0 0 0-.219-.574c-.372-.08-.732-.14-1.078-.18-.346-.038-.744-.058-1.197-.058-.451 0-.864.02-1.237.059-.372.04-.745.1-1.117.18v20.463A17.33 17.33 0 0 0 2.834 30c.93 0 1.875-.079 2.833-.237V19.036c0-1.108.12-2.006.359-2.692.24-.685.552-1.22.937-1.604.386-.38.818-.64 1.298-.772.48-.13.943-.197 1.397-.197 1.09 0 1.855.382 2.294 1.149.44.766.659 1.86.659 3.285v11.558a17.3 17.3 0 0 0 2.832.237c.931 0 1.876-.079 2.834-.237V16.7c0-2.719-.594-4.71-1.775-5.978-1.185-1.267-2.948-1.9-5.288-1.9M34.475 23.985c-.66 1.114-1.742 1.669-3.248 1.669-1.479 0-2.548-.555-3.207-1.669-.658-1.112-.987-2.715-.987-4.809 0-2.091.329-3.693.987-4.805.66-1.113 1.728-1.672 3.207-1.672 1.506 0 2.588.56 3.248 1.672.658 1.112.987 2.714.987 4.805 0 2.094-.329 3.697-.987 4.81m4.334-12.593c-.833-.98-1.882-1.75-3.145-2.314-1.265-.563-2.741-.844-4.437-.844-1.694 0-3.164.28-4.416.844-1.25.564-2.285 1.334-3.106 2.314-.82.98-1.438 2.138-1.854 3.48-.418 1.342-.626 2.776-.626 4.303 0 1.53.208 2.953.626 4.265.416 1.316 1.034 2.462 1.854 3.44.82.98 1.856 1.745 3.106 2.294 1.252.549 2.722.825 4.416.825 1.696 0 3.172-.276 4.437-.825 1.263-.55 2.312-1.313 3.145-2.294.835-.978 1.453-2.124 1.856-3.44.403-1.312.605-2.735.605-4.265 0-1.527-.202-2.961-.605-4.304-.403-1.34-1.021-2.5-1.856-3.479M71.191 8.824c-.51 0-.964.02-1.368.06-.401.04-.828.1-1.285.181l-3.297 15.04-3.777-15.04a7.227 7.227 0 0 0-1.207-.16 100.03 100.03 0 0 0-1.729-.081c-.99 0-1.902.08-2.732.241l-3.86 15.32L48.6 9.065a8.291 8.291 0 0 0-1.448-.202 31.744 31.744 0 0 0-1.568-.04c-.375 0-.837.014-1.386.04-.55.028-1.132.107-1.748.241l6.27 20.654c.455.107.931.175 1.428.201.494.027.93.041 1.305.041.376 0 .838-.014 1.389-.04.547-.027 1.076-.08 1.586-.16l3.9-13.757 3.779 13.715c.455.107.93.175 1.426.201.496.027.945.041 1.347.041.375 0 .837-.014 1.386-.04.55-.027 1.066-.08 1.548-.16l6.473-20.696a11.716 11.716 0 0 0-1.749-.241 28.81 28.81 0 0 0-1.347-.04M92.575 5.347c.583-.44 1.34-.662 2.27-.662.53 0 .954.035 1.273.102.32.066.624.126.917.18.265-.696.458-1.395.577-2.103.119-.707.205-1.501.258-2.383A11.353 11.353 0 0 0 96.099.1 17.226 17.226 0 0 0 94.089 0c-1.196 0-2.292.18-3.286.541a7.246 7.246 0 0 0-2.568 1.563c-.717.679-1.268 1.521-1.653 2.521-.384 1.002-.577 2.144-.577 3.425V9.05h-3.266a9.785 9.785 0 0 0-.198 2.083c0 .375.012.735.04 1.082.026.348.079.734.158 1.161h3.266v16.382c.955.16 1.897.241 2.827.241.902 0 1.83-.08 2.788-.241V13.377h4.777c.079-.4.133-.76.16-1.081a14.308 14.308 0 0 0 0-2.083 11.1 11.1 0 0 0-.16-1.162H91.62V8.17c.052-1.441.37-2.383.955-2.823"/>
						<g transform="translate(97.28 8.235)">
							<mask id="b" fill="#fff">
								<use xlink:href="#a"/>
							</mask>
							<path fill="currentColor" d="M13.416 15.767c-.665 1.11-1.753 1.666-3.271 1.666-1.489 0-2.566-.555-3.23-1.666-.663-1.109-.995-2.706-.995-4.793 0-2.086.332-3.683.996-4.793.663-1.11 1.74-1.666 3.229-1.666 1.518 0 2.606.556 3.271 1.666.664 1.11.995 2.707.995 4.793 0 2.087-.331 3.684-.995 4.793m4.368-12.555c-.84-.977-1.896-1.745-3.17-2.307-1.273-.561-2.761-.842-4.47-.842-1.706 0-3.187.28-4.447.842-1.26.562-2.303 1.33-3.128 2.307-.828.976-1.449 2.133-1.87 3.47C.28 8.02.07 9.45.07 10.974s.21 2.942.63 4.251c.421 1.312 1.042 2.455 1.87 3.43.825.978 1.868 1.74 3.128 2.287 1.26.549 2.741.823 4.448.823 1.708 0 3.196-.274 4.47-.823 1.273-.548 2.329-1.31 3.17-2.287.838-.975 1.46-2.118 1.867-3.43.406-1.309.61-2.727.61-4.251 0-1.524-.204-2.955-.61-4.292-.406-1.337-1.029-2.494-1.868-3.47" mask="url(#b)"/>
						</g>
						<path fill="currentColor" d="M133.085 8.982c-.159-.053-.41-.092-.754-.12a12.782 12.782 0 0 0-.912-.038c-1.27 0-2.329.326-3.175.98a10.306 10.306 0 0 0-2.143 2.222c-.026-.187-.06-.421-.098-.701-.04-.28-.086-.56-.14-.841-.054-.28-.113-.547-.178-.8a2.382 2.382 0 0 0-.218-.582 16.35 16.35 0 0 0-1.13-.2 10.106 10.106 0 0 0-2.341-.018c-.359.039-.736.098-1.133.18v20.735c.503.08.986.133 1.449.16.462.026.919.041 1.369.041.45 0 .912-.015 1.389-.04.475-.028.952-.081 1.428-.16v-9.848c0-1.442.165-2.563.497-3.363.33-.8.746-1.401 1.25-1.801.501-.4 1.03-.647 1.587-.74a9.017 9.017 0 0 1 1.507-.141h.655c.358 0 .68.028.973.08.105-.48.178-.986.218-1.522.04-.534.06-1.026.06-1.48 0-.374-.016-.735-.04-1.082a8.21 8.21 0 0 0-.12-.92M164.596 10.744c-1.108-1.28-2.84-1.92-5.19-1.92-1.497 0-2.734.363-3.71 1.088-.975.727-1.729 1.577-2.265 2.553-.908-2.427-2.98-3.641-6.213-3.641-.748 0-1.424.1-2.025.297a6.793 6.793 0 0 0-1.623.772c-.48.316-.897.673-1.243 1.068a6.427 6.427 0 0 0-.842 1.189c-.026-.185-.06-.41-.1-.674-.04-.262-.087-.534-.141-.812a13.656 13.656 0 0 0-.18-.792 2.252 2.252 0 0 0-.221-.573 11.865 11.865 0 0 0-1.082-.178c-.348-.04-.749-.059-1.202-.059-.455 0-.869.02-1.243.06-.375.04-.748.099-1.124.177v20.463c.964.158 1.912.238 2.847.238s1.885-.08 2.847-.238V19.036c0-1.108.107-2.004.321-2.692.212-.686.5-1.22.861-1.603a2.731 2.731 0 0 1 1.223-.772c.454-.13.908-.198 1.365-.198 1.094 0 1.822.384 2.183 1.148.36.766.542 1.86.542 3.286v11.557c.962.158 1.91.238 2.845.238.936 0 1.884-.08 2.847-.238V18.719c0-1.03.113-1.866.34-2.513.227-.646.522-1.148.883-1.505.36-.356.761-.598 1.202-.732.442-.13.888-.198 1.344-.198 1.094 0 1.823.384 2.185 1.148.36.766.54 1.86.54 3.286v11.557c.963.158 1.911.238 2.847.238.935 0 1.883-.08 2.847-.238v-13.02c0-2.72-.556-4.718-1.665-5.998"/>
					</g>
				</svg>
				</a>
				<?php
			else :
				?>
				<a class="nf-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="181" height="30" viewBox="0 0 181 30">
					<defs>
						<path id="a" d="M.069.063h20.193v21.702H.069z"/>
					</defs>
					<g fill="none" fill-rule="evenodd">
						<path class="brand-ball" fill="#301FFF" d="M181 25.882A4.122 4.122 0 0 1 176.874 30a4.123 4.123 0 0 1-4.128-4.118 4.123 4.123 0 0 1 4.128-4.117A4.122 4.122 0 0 1 181 25.882"/>
						<path fill="currentColor" d="M11.214 8.824a6.58 6.58 0 0 0-2.036.296 6.984 6.984 0 0 0-2.953 1.84c-.373.397-.69.793-.956 1.187-.028-.183-.06-.408-.102-.671a19.49 19.49 0 0 0-.139-.812 11.994 11.994 0 0 0-.18-.791 2.274 2.274 0 0 0-.219-.574c-.372-.08-.732-.14-1.078-.18-.346-.038-.744-.058-1.197-.058-.451 0-.864.02-1.237.059-.372.04-.745.1-1.117.18v20.463A17.33 17.33 0 0 0 2.834 30c.93 0 1.875-.079 2.833-.237V19.036c0-1.108.12-2.006.359-2.692.24-.685.552-1.22.937-1.604.386-.38.818-.64 1.298-.772.48-.13.943-.197 1.397-.197 1.09 0 1.855.382 2.294 1.149.44.766.659 1.86.659 3.285v11.558a17.3 17.3 0 0 0 2.832.237c.931 0 1.876-.079 2.834-.237V16.7c0-2.719-.594-4.71-1.775-5.978-1.185-1.267-2.948-1.9-5.288-1.9M34.475 23.985c-.66 1.114-1.742 1.669-3.248 1.669-1.479 0-2.548-.555-3.207-1.669-.658-1.112-.987-2.715-.987-4.809 0-2.091.329-3.693.987-4.805.66-1.113 1.728-1.672 3.207-1.672 1.506 0 2.588.56 3.248 1.672.658 1.112.987 2.714.987 4.805 0 2.094-.329 3.697-.987 4.81m4.334-12.593c-.833-.98-1.882-1.75-3.145-2.314-1.265-.563-2.741-.844-4.437-.844-1.694 0-3.164.28-4.416.844-1.25.564-2.285 1.334-3.106 2.314-.82.98-1.438 2.138-1.854 3.48-.418 1.342-.626 2.776-.626 4.303 0 1.53.208 2.953.626 4.265.416 1.316 1.034 2.462 1.854 3.44.82.98 1.856 1.745 3.106 2.294 1.252.549 2.722.825 4.416.825 1.696 0 3.172-.276 4.437-.825 1.263-.55 2.312-1.313 3.145-2.294.835-.978 1.453-2.124 1.856-3.44.403-1.312.605-2.735.605-4.265 0-1.527-.202-2.961-.605-4.304-.403-1.34-1.021-2.5-1.856-3.479M71.191 8.824c-.51 0-.964.02-1.368.06-.401.04-.828.1-1.285.181l-3.297 15.04-3.777-15.04a7.227 7.227 0 0 0-1.207-.16 100.03 100.03 0 0 0-1.729-.081c-.99 0-1.902.08-2.732.241l-3.86 15.32L48.6 9.065a8.291 8.291 0 0 0-1.448-.202 31.744 31.744 0 0 0-1.568-.04c-.375 0-.837.014-1.386.04-.55.028-1.132.107-1.748.241l6.27 20.654c.455.107.931.175 1.428.201.494.027.93.041 1.305.041.376 0 .838-.014 1.389-.04.547-.027 1.076-.08 1.586-.16l3.9-13.757 3.779 13.715c.455.107.93.175 1.426.201.496.027.945.041 1.347.041.375 0 .837-.014 1.386-.04.55-.027 1.066-.08 1.548-.16l6.473-20.696a11.716 11.716 0 0 0-1.749-.241 28.81 28.81 0 0 0-1.347-.04M92.575 5.347c.583-.44 1.34-.662 2.27-.662.53 0 .954.035 1.273.102.32.066.624.126.917.18.265-.696.458-1.395.577-2.103.119-.707.205-1.501.258-2.383A11.353 11.353 0 0 0 96.099.1 17.226 17.226 0 0 0 94.089 0c-1.196 0-2.292.18-3.286.541a7.246 7.246 0 0 0-2.568 1.563c-.717.679-1.268 1.521-1.653 2.521-.384 1.002-.577 2.144-.577 3.425V9.05h-3.266a9.785 9.785 0 0 0-.198 2.083c0 .375.012.735.04 1.082.026.348.079.734.158 1.161h3.266v16.382c.955.16 1.897.241 2.827.241.902 0 1.83-.08 2.788-.241V13.377h4.777c.079-.4.133-.76.16-1.081a14.308 14.308 0 0 0 0-2.083 11.1 11.1 0 0 0-.16-1.162H91.62V8.17c.052-1.441.37-2.383.955-2.823"/>
						<g transform="translate(97.28 8.235)">
							<mask id="b" fill="#fff">
								<use xlink:href="#a"/>
							</mask>
							<path fill="currentColor" d="M13.416 15.767c-.665 1.11-1.753 1.666-3.271 1.666-1.489 0-2.566-.555-3.23-1.666-.663-1.109-.995-2.706-.995-4.793 0-2.086.332-3.683.996-4.793.663-1.11 1.74-1.666 3.229-1.666 1.518 0 2.606.556 3.271 1.666.664 1.11.995 2.707.995 4.793 0 2.087-.331 3.684-.995 4.793m4.368-12.555c-.84-.977-1.896-1.745-3.17-2.307-1.273-.561-2.761-.842-4.47-.842-1.706 0-3.187.28-4.447.842-1.26.562-2.303 1.33-3.128 2.307-.828.976-1.449 2.133-1.87 3.47C.28 8.02.07 9.45.07 10.974s.21 2.942.63 4.251c.421 1.312 1.042 2.455 1.87 3.43.825.978 1.868 1.74 3.128 2.287 1.26.549 2.741.823 4.448.823 1.708 0 3.196-.274 4.47-.823 1.273-.548 2.329-1.31 3.17-2.287.838-.975 1.46-2.118 1.867-3.43.406-1.309.61-2.727.61-4.251 0-1.524-.204-2.955-.61-4.292-.406-1.337-1.029-2.494-1.868-3.47" mask="url(#b)"/>
						</g>
						<path fill="currentColor" d="M133.085 8.982c-.159-.053-.41-.092-.754-.12a12.782 12.782 0 0 0-.912-.038c-1.27 0-2.329.326-3.175.98a10.306 10.306 0 0 0-2.143 2.222c-.026-.187-.06-.421-.098-.701-.04-.28-.086-.56-.14-.841-.054-.28-.113-.547-.178-.8a2.382 2.382 0 0 0-.218-.582 16.35 16.35 0 0 0-1.13-.2 10.106 10.106 0 0 0-2.341-.018c-.359.039-.736.098-1.133.18v20.735c.503.08.986.133 1.449.16.462.026.919.041 1.369.041.45 0 .912-.015 1.389-.04.475-.028.952-.081 1.428-.16v-9.848c0-1.442.165-2.563.497-3.363.33-.8.746-1.401 1.25-1.801.501-.4 1.03-.647 1.587-.74a9.017 9.017 0 0 1 1.507-.141h.655c.358 0 .68.028.973.08.105-.48.178-.986.218-1.522.04-.534.06-1.026.06-1.48 0-.374-.016-.735-.04-1.082a8.21 8.21 0 0 0-.12-.92M164.596 10.744c-1.108-1.28-2.84-1.92-5.19-1.92-1.497 0-2.734.363-3.71 1.088-.975.727-1.729 1.577-2.265 2.553-.908-2.427-2.98-3.641-6.213-3.641-.748 0-1.424.1-2.025.297a6.793 6.793 0 0 0-1.623.772c-.48.316-.897.673-1.243 1.068a6.427 6.427 0 0 0-.842 1.189c-.026-.185-.06-.41-.1-.674-.04-.262-.087-.534-.141-.812a13.656 13.656 0 0 0-.18-.792 2.252 2.252 0 0 0-.221-.573 11.865 11.865 0 0 0-1.082-.178c-.348-.04-.749-.059-1.202-.059-.455 0-.869.02-1.243.06-.375.04-.748.099-1.124.177v20.463c.964.158 1.912.238 2.847.238s1.885-.08 2.847-.238V19.036c0-1.108.107-2.004.321-2.692.212-.686.5-1.22.861-1.603a2.731 2.731 0 0 1 1.223-.772c.454-.13.908-.198 1.365-.198 1.094 0 1.822.384 2.183 1.148.36.766.542 1.86.542 3.286v11.557c.962.158 1.91.238 2.845.238.936 0 1.884-.08 2.847-.238V18.719c0-1.03.113-1.866.34-2.513.227-.646.522-1.148.883-1.505.36-.356.761-.598 1.202-.732.442-.13.888-.198 1.344-.198 1.094 0 1.823.384 2.185 1.148.36.766.54 1.86.54 3.286v11.557c.963.158 1.911.238 2.847.238.935 0 1.883-.08 2.847-.238v-13.02c0-2.72-.556-4.718-1.665-5.998"/>
					</g>
				</svg>

						
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
		<div class="progress-container">
			<div class="progress-bar" id="myBar"></div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
