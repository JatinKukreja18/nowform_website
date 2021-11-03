<?php 
			$count = 0;
			$args = array( 
			'post_type' => 'work',
			'orderby' =>'menu_order',
			'category_name'=>'work',
			"posts_per_page"=>"2"
			);
			$the_query = new WP_Query( $args );
            ?>
            <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();  $count++?>
					<div class="col-md-6">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="nf-work-card">
							
							<a href="<?php echo get_the_permalink() ?>"?>
							<img class="work-image" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
							</a>
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