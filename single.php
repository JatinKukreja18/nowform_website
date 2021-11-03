<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package NowForm_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main spaced-container-150">

		<?php
		while ( have_posts() ) :
			the_post();

			// get_template_part( 'template-parts/content-work', 'page' );
			if(get_field('content_type') == 'Work'){
				get_template_part( 'template-parts/content-work', get_post_type() );
			}else if(get_field('content_type') == 'Article'){
				get_template_part( 'template-parts/content-journal', get_post_type() );
			}else{
				get_template_part( 'template-parts/content', get_post_type() );
			}
			// the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
