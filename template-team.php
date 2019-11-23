<?php
/**
 * Template Name: Team Page Template
 * The template for displaying all Works
 */
 

get_header();
?>

	<div id="primary" class="content-area team  spaced-container ">
		<main id="main" class="site-main">
		<?php 
			$count = 0;
			$args = array( 
			'post_type' => 'team',
			'orderby' =>'menu_order' 
			);
			$the_query = new WP_Query( $args );
			?>
			<div class="nf-wrapper black-section ">
			<?php the_title( '<h1 class="white nf-heading mb-25">', '</h1>' ); ?>
			<div class="row ">
				<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();  $count++?>
					<div class="col-md-3 col-sm-6">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="team-card">
							<a href="<?php the_permalink(); ?>">
								<img  src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">	
							</a>			
							<a href="<?php the_permalink(); ?>">
								<span>
									<?php the_title(); ?>
								</span>
							</a>
							
							<span class="role"><?php echo get_field('designation')[0] ?></span>
 
	
						</div><!-- .entry-content -->
	
						<!-- <footer class="entry-footer"> -->
							<!-- <php nowform_elegance_entry_footer(); > -->
						<!-- </footer> -->
						<!-- .entry-footer -->
					</article><!-- #post-<?php the_ID(); ?> -->
	
				</div>
					<?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
			<div class="nf-wrapper all-side nf-text-content">
				<div class="row">
					<div class="col-md-5">
						<h1 class="nf-heading">Work with Us</h1>
					</div>
					<div class="col-md-7">
						<?php echo the_content();?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
