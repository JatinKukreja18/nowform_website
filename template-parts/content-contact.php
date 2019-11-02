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
				<p class="address">
					<?php
						$address	=get_field('address');
						echo $address;
					?>	
				</p>
				<p class="directions">
					<a href="<?php echo get_field('get_directions_link'); ?>">Get Directions</a>
				</p>
			</div> 
			<div class="col-md-2">
				<span id="india-time"></span>
				IST
			</div>

		</div>
		


	</div>
		
				
</article><!-- #post-<?php the_ID(); ?> -->
