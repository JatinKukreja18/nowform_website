<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NowForm_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="nf-wrapper">
		<div class="row">
			<div class="col-md-4">
				<h2 class="nf-heading work-title">
					<?php the_title();?>
				</h2>
				<?php
					$categories	=get_field('industry');
					foreach( $categories as $category): $count++;
					?>
					<span><?php echo $count > 1?  ', ':'' ?></span>
					<span class="project-industry"><?php echo $category?></span>
					<?php endforeach; ?>
			</div>
			<div class="col-md-7 offset-1 project-breif">
				<?php the_excerpt()?>
			</div>

			<div class="col-md-12">
				<img class="featured-image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
			</div>
		</div>
		

		<div class="row">
			<div class="col-md-7 offset-5">
				<div class="entry-content interior-work">
					<?php
					the_content();
					?>		
				</div><!-- .entry-content -->

			</div>
		</div>

	</div>
	<?php $posts = get_field('team_member'); if( $posts ): ?>
		<section class="black-section">
			<div class="nf-wrapper">
			 	<h1 class="nf-heading white  team-title">
					Team
				</h1>
				
				<ul class="team-card-list row">
				<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					<?php setup_postdata($post); ?>
					<li class="col-md-3 col-sm-6 team-card">
						<a href="<?php the_permalink(); ?>">
								<img  src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">				
							<span>	<?php the_title(); ?></span>
						</a>
						
						<span class="role"><?php echo get_field('designation')[0] ?></span>
					</li>
				<?php endforeach; ?>
				</ul>

				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			</div>
		</section>
		<?php endif; ?>
	<?php $posts = get_field('collaborator');
		
				if( $posts ): ?>
				<section class="black-section">
					<div class="nf-wrapper">
						<h1 class="nf-heading white team-title">
							Collaborators
						</h1>
						<ul class="team-card-list row">
						<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
							<?php setup_postdata($post); ?>
							<li class="team-card col-md-3">
								<h2><?php the_title(); ?></h2>
								<span class="role"><?php echo get_field('designation')[0] ?></span>
							</li>
						<?php endforeach; ?>
						</ul>
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					</div>
				</section>
			<?php endif; ?>

			<?php

		//below code is fore related posts 

		//query arguments

		?>
		<?php 
		// Get the selected options
		$my_acf_checkbox_field_arr = get_field('industries');

		// Build the meta query based on the selected options
		$meta_query = array('relation' => 'OR');
		foreach( $my_acf_checkbox_field_arr as $item ){
			$meta_query[] = array(
				'key'     => 'industries',
				'value'   => $item,
				'compare' => 'LIKE',
			);
		}?>
		
		<?php $args = array(
				'numberposts' => -1,
				'posts_per_page'=> 2,
				'post_type' => 'work',
				'meta_query' => $meta_query
			);
 
// get results
$the_query = new WP_Query( $args );
 
// The Loop
?>
<div class="nf-wrapper">
<div class="row">
			<div class="col-md-12">
				<h1 class="nf-heading related-projects">Related Projects</h1>
			</div>
				<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>
					<div class="col-md-6"> 
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
		</div>
							<?php endwhile; ?>
						<?php endif; ?>
</div>
		</div>
<?php wp_reset_query(); ?>

</article><!-- #post-<?php the_ID(); ?> -->
