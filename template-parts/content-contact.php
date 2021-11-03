<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NowForm_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="nf-wrapper contact-page">
		<div class="row">
			<div class="col-md-4">
				<img class="featured-image contact-image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
			</div>
			<div class="col-md-5 offset-1">
				<h1 class="nf-heading email">
					<a target="_blank" href="mailto:<?php  echo get_field('email');?>" >
						<?php echo get_field('email'); ?>
					</a>
				</h1>
				<h1 class="nf-heading mobile">
					<a href="tel:<?php echo get_field('mobile');?>">
						<?php echo get_field('mobile');?>
					</a>
				</h1>
				<p class="address"><?php echo get_field('address');?></p>
				<p class="directions">
					<a href="<?php echo get_field('get_directions_link'); ?>" target="_blank">
						Get Directions
						<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
							<g fill="none" fill-rule="evenodd" stroke="#000">
								<path d="M11.7 11.05V1.3H1.95M11.7 1.3L1.3 11.7"/>
							</g>
						</svg>
					</a>
				</p>
			</div> 
			<div class="col-md-3 col-lg-2">
				<h1 class="nf-heading ">
				India (IST)
				</h1>
				<h1 class="nf-heading ">

					<span id="india-time"></span>
				</h1>			
			</div>

		</div>
		


	</div>
		
				
</article><!-- #post-<?php the_ID(); ?> -->
