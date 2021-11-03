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
	<div class="nf-wrapper work-wrapper">
			<div class=" work-title-block" id="project-title-block">
				<h2 class="nf-heading work-title">
					<?php the_title();?>
				</h2>
				<?php 
				$category = get_the_category();
				$author = get_field('author');
				$firstCategory = $category[0]->cat_name;
				if($author): ?>
					<div class="project-industry">
						<p>
							<?php  echo $author ?> 
						</p>
						<p> 
						<?php the_time('jS M Y'); ?>
						</p>
					</div>
				<?php endif; ?>
				<?php
				$industries = get_field('industries');
				if( $industries ): ?>
					<div class="project-industry">
						<?php foreach( $industries as $industry ): $count++ ?>
							<span ><span><?php echo $count > 1?  ', ':'' ?></span><?php echo $industry; ?></span>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				
				
				
				
				
			</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-8  project-breif">
				<?php the_excerpt()?>
			</div>

			<div class="col-md-12">
				<?php
					$videolink = get_field('video');
					$imagelink = get_field('banner_image');
					// $imagelink = get_field('image');

					// var_dump($imagelink['sizes']['large']);
					$lottieShortcode = get_field('lottie_shortcode');
				if($lottieShortcode){?>
					<div class="featured-image">
						<?php echo do_shortcode($lottieShortcode);?>
					</div>
				<?php 
				}
				// "https://www.youtube.com/embed/lHcOt0AdLVw?autoplay=0&controls=0&disablekb=1&playsinline=1&cc_load_policy=0&cc_lang_pref=auto&widget_referrer=http%3A%2F%2Frawmango.in%2Fcollections%2Fbetween-%257C-2020%2FMjQ%3D&noCookie=false&rel=0&showinfo=0&iv_load_policy=3&modestbranding=1&enablejsapi=1&origin=http%3A%2F%2Frawmango.in&widgetid=1
				else if( $videolink['video_link_id']){?>
					
				
					<!-- <div class="plyr__video-embed" id="player-9">
					<iframe
						src="https://player.vimeo.com/video/<?php  echo $videolink?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media&showinfo=0&disablekb=1"
						allowfullscreen
						allowtransparency
						allow="autoplay"
					></iframe>
					</div> -->
					<div class="featured-video" >
						<div id="player" data-plyr-provider="<?php echo $videolink['type']?>" data-plyr-embed-id="<?php  echo $videolink['video_link_id']?>"></div>
					</div>
					<script src="https://player.vimeo.com/api/player.js"></script>
				<?php }else if( $imagelink ):?>
					<img class="featured-image"
							 src="<?php  echo $imagelink['sizes']['medium_large']?>" 
							 srcset="<?php echo $imagelink['url']?> 1280w, <?php echo $imagelink['sizes']['large']?> 1024w,
							 <?php echo $imagelink['sizes']['medium_large']?> 768w"
							 sizes="(max-width: 3840px) 100vw, 100vw"
							 alt="">
				<?php endif;?>
				<?php if( !$imagelink && !$videolink)  ?>
					<span class="spacer"></span>
			</div>
		</div>
		

		<div class="row">
			<div class="col-md-8 offset-4">
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
					<?php echo get_the_title() . ' Project Team';?>
				</h1>
				
				<ul class="team-card-list row">
				<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					<?php setup_postdata($post); ?>
					<li class="col-md-3 col-sm-6 team-card">
						<a href="<?php the_permalink(); ?>">
								<img  src="<?php echo get_the_post_thumbnail_url($post->ID,'large'); ?>" alt="">				
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
	<?php $posts = get_field('collaborators');
				if( $posts ): ?>
				<section class="black-section">
					<div class="nf-wrapper">
						<h1 class="nf-heading white team-title">
							Collaborators
						</h1>
						<ul class="team-card-list row">
						<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
							<?php setup_postdata($post); ?>
							<li class="team-card col-md-3 col-sm-6">
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
		$relatedPosts = get_field('related_posts'); 
		if( $relatedPosts ): ?>
<div class="nf-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="nf-heading related-projects">Related Projects</h1>

		</div>
				<?php foreach( $relatedPosts as $relatedPost ):
			?>

					<div class="col-md-6"> 
						<div class="nf-work-card">
							<div class="nf-work-hover-block">
								<a class="image-wrapper" href="<?php echo get_the_permalink($relatedPost->ID)?>">
								<img class="work-image" src="<?php echo get_the_post_thumbnail_url($relatedPost->ID) ?>" alt="">
								</a>
								<a  href="<?php echo get_the_permalink($relatedPost->ID)?>">
									<h1 class="work-title">
										<?php echo $relatedPost->post_title; ?>
									</h1>
								</a>
							</div>
							<p class="work-summary"><?php echo $relatedPost->post_excerpt ;?></p>	
	
						</div><!-- .entry-content -->	
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endif; ?>
		<script>
			window.onscroll = function() {myFunction()};

			function myFunction() {
			var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
			var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
			var scrolled = (winScroll / height) * 100;
			document.getElementById("myBar").style.width = scrolled + "%";
			}
		</script>
</article><!-- #post-<?php the_ID(); ?> -->
