<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NowForm_Theme
 */

?>

<div id="post-<?php the_ID();?>" <?php post_class();?>>
	<section class="nf-member-info">
		<div class="nf-wrapper">
			<div class="row">
				<div class="col-md-3">
					<img class="work-image" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">			
				</div>
				<div class="col-md-7 offset-2">
					<h1 class="member-name"><?php echo get_the_title()?></h1>
					<p class="member-designation">Founder</p>
					<p class="member-info">
						<?php echo get_the_content()?>	
					</p>
				</div>
			</div>
		</div>
	</section>

	<div class="entry-content nf-wrapper">
		<?php
			get_the_title();
			get_the_content();
		?>
	<?php
		$projects = get_posts(array(
			'post_type' => 'work',
			'meta_query' => array(
				array(
					'key' => 'team_member', // name of custom field
					'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
					'compare' => 'LIKE',
				),
			),
		));
	?>
			<div class="row">
				<div class="col-sm-12">
					<h2 class="member-work-title"><?php echo get_the_title()?>'s Recent Work</h2>
				</div>
		<?php if ($projects): ?>
				<?php foreach ($projects as $project): ?>
					<div class="col-md-6">
						<div class="nf-work-card">
							<a href="<?php echo get_the_permalink($project->ID); ?>"?>
							<img class="work-image" src="<?php echo get_the_post_thumbnail_url($project->ID); ?>" alt="">
							</a>
							<h1 class="work-title">
								<?php
								echo get_the_title($project->ID);
								?>
							</h1>
							<p class="work-summary">
									<?php echo $project->post_excerpt?>	
						</div><!-- .entry-content -->
					</div>
				<?php endforeach;?>
				<?php endif;?>
			</div>

	</div><!-- .entry-content -->

</div><!-- #post-<?php the_ID();?> -->
