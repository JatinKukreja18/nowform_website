<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NowForm_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="nf-footer nf-wrapper">
				<div class="row">
					<div class="col-md-6">
						<?php echo do_shortcode('[mc4wp_form id="70"]') ?>
						<div></div>
					</div>
					<div class="follow-us-container">
						<h2 class="nf-heading nf-heading-follow">
							Follow us
						</h2>
						<?php
						wp_nav_menu( array(
							'menu' => 'Follow Us'
						) );
						?>
					</div>
				</div>
			</div>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<div class="nf-gallery-modal">
		<a class="nf-modal-cross" onClick="closeModal()"></a>
		<div class="nf-gallery-modal-body"></div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
