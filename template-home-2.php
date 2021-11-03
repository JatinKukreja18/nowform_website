<?php
/**
 * Template Name: Home With Banner Template
 * The template for displaying all Works
 */

get_header();
?>

	<div id="primary" class="content-area  home nf-wrapper">
		<main id="main" class="site-main">

		<?php
$count = 0;
$args = array(
    'post_type' => array('journal', 'work', 'opinions'),
    'orderby' => 'date',
    'order' => 'DESC',
    // 'orderby' => 'meta_value',
    // 'meta_key' => 'custom_order_type_snv_1',
    // 'order' => 'ASC',
    'post_status' => 'publish',
    'posts_per_page' => 5,
);
$the_query = new WP_Query($args);
?>
			<div class="row">
				<?php if ($the_query->have_posts()): while ($the_query->have_posts()): $the_query->the_post();
        $count++?>
									<?php
        if ($count === 1) {
            $class = 'home-banner';
            $bannerTheme = get_field('color', get_the_ID());
            ?>

										<script type="text/javascript">
											var javaScriptVar = "<?php echo $bannerTheme; ?>";
											if(javaScriptVar){
												console.log(javaScriptVar);
												document.querySelector('.nf-navigation').style.color = javaScriptVar;
												document.querySelector('.site-branding').style.color = javaScriptVar;
											}
											window.addEventListener('DOMContentLoaded', (event) => {
																setTimeout(() => {
																	if(document.querySelector('.home-banner')){
																		document.querySelector('.home-banner').style.color = javaScriptVar;
																	}
																}, 0);
											})
										</script>
									<?php
        } else {
            $class = 'col-md-6';
        }
        ?>
								<div class="<?php echo $class; ?>" >
									<article id="post-<?php the_ID();?>" <?php post_class();?>>
										<div class="nf-work-card">
										<div class="nf-work-hover-block">

											<a class="image-wrapper" href="<?php echo get_the_permalink() ?>"?>
											<?php the_post_thumbnail()?>
											<!-- <img class="work-image" src="<?php echo get_the_post_thumbnail_url() ?>" alt=""> -->
											</a>
											<div class="content-wrapper">
												<span class="category">
													<?php echo get_post_type(); ?>
												</span>
												<a href="<?php echo get_the_permalink() ?>"?>
												<h1 class="work-title">
													<?php
        the_title();
        ?>
												</h1>
												</a>
												<div class="work-summary"><?php the_excerpt();?></div>
											</div>
										</div>

										</div><!-- .entry-content -->

										<!-- <footer class="entry-footer"> -->
											<!-- <php nowform_elegance_entry_footer(); > -->
										<!-- </footer> -->
										<!-- .entry-footer -->
									</article><!-- #post-<?php the_ID();?> -->

								</div>
									<?php endwhile;else: ?> <p>Sorry, there are no posts to display</p> <?php endif;?>
					<?php wp_reset_query();?>
			</div>
			<div class="row redirect-links">
				<a href="./work" class="special-link">
				View all work</a>
				<a href="./journal" class="special-link">View journal</a>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
