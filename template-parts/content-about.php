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
			<div class="nf-wrapper about-top">
				<div class="block-with-arrow">
					<h1 class="nf-heading"><?php echo get_field('left_of_arrow') ?></h1>
					<a class="about-arrow "></a>
					<h1 class="nf-heading"><?php echo get_field('right_of_arrow') ?></h1>
				</div>
				<h1 class="nf-heading"><?php echo get_field('below_the_arrow') ?></h1>
			</div>
			<?php
			$process1 = get_field('process_1');
			$process2 = get_field('process_2');
			$process3 = get_field('process_3');
			?>
			<div class="black-section process-section">
				<div class="nf-wrapper">
					<?php if( $process1 && $process2 && $process3 ): ?>
					<div class="row">
						<div class="col-md-12 process-titles hidden-xs">
							<h2 class="nf-heading process-title">
									<?php echo  $process1['process_name']?>
							</h2>
							<h2 class="nf-heading process-title"><?php echo  $process2['process_name']?></h2>
							<h2 class="nf-heading process-title"><?php echo  $process3['process_name']?></h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<img class="process-image" src="<?php echo  $process1['process_image']?>" alt="" srcset="">
							<h2 class="nf-heading process-title visible-xs">
									<?php echo  $process1['process_name']?>
							</h2>
							<a href="<?php echo  $process1['process_link']?>" class="process-link white special-link"><?php echo  $process1['link_text']?></a>
						</div>
						<div class="col-md-4">
							<img class="process-image" src="<?php echo  $process2['process_image']?>" alt="" srcset="">
							<h2 class="nf-heading process-title visible-xs">
									<?php echo  $process2['process_name']?>
							</h2>
							<a href="<?php echo  $process2['process_link']?>" class="process-link white special-link"><?php echo  $process2['link_text']?></a>
						</div>
						<div class="col-md-4">
							<img class="process-image" src="<?php echo  $process3['process_image']?>" alt="" srcset="">
							<h2 class="nf-heading process-title visible-xs">
									<?php echo  $process3['process_name']?>
							</h2>
							<a href="<?php echo  $process3['process_link']?>" class="process-link white special-link"><?php echo  $process3['link_text']?></a>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="nf-wrapper all-side nf-text-content">


				<div class="row">
					<div class="col-md-5">
						<h1 class="nf-heading">Why Now Form?</h1>
					</div>
					<div class="col-md-7">
						<?php echo the_content();?>
					</div>
				</div>
			</div>
		
				
</article><!-- #post-<?php the_ID(); ?> -->
