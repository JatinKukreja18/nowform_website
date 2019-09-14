<?php
/**
 * Template Name: Work Page Template
 * The template for displaying all Works
 */
 

get_header();
?>

	<div id="primary" class="content-area spaced-container nf-wrapper">
		<main id="main" class="site-main">
			
		<?php 
			$count = 0;
			$args = array( 
			'post_type' => 'work',
			'orderby' =>'menu_order',
			'posts_per_page' => 5
			);
			$the_query = new WP_Query( $args );
			?>
			<div class="row">
				<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();  $count++?>
					<?php
					if ($count === 1) {
						$class = 'col-md-12';
					} else {
						$class = 'col-md-6';
					}
					?>
				<div class="<?php echo $class;?>">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="nf-work-card">
							
							<a href="<?php echo get_the_permalink() ?>"?>
							<img class="work-image" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
							</a>
							<span class="category">
								<?php $cat = get_the_category(); echo $cat[0]->cat_name; ?> 
							</span>
							<h1 class="work-title">
								<?php
								the_title();
								?>
							</h1>
							<p class="work-summary"><?php the_excerpt() ;?></p>	
	
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
			<div class="row redirect-links">
				<a href="./work" class="special-link">View all work</a>
				<a href="./journal" class="special-link">View journal</a>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
