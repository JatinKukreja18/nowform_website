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
				<h2 class="nf-heading">
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
					<li class="col-md-3 team-card">
						<img  src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">				
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						
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
							<li class="team-card col-md-4">
								<h2><?php the_title(); ?></h2>
								<span class="role"><?php echo get_field('designation')[0] ?></span>
							</li>
						<?php endforeach; ?>
						</ul>
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					</div>
				</section>
					<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
