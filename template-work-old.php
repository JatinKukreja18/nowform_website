<?php
/**
 * Template Name: Work Page Template
 * The template for displaying all Works
 */
 

get_header();
?>

	<div id="work-page" class="content-area spaced-container-150 nf-wrapper">
		<main id="main" class="site-main">
			
		
			<div class="row" id="add-here">
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<!-- <div class="nf-work-loadmore" onClick="loadNextSet(6,true,'work')"><h2>Load More</h2></div> -->
	<script>
		window.addEventListener('DOMContentLoaded', (event) => {
			isWorkPage();
		})
	</script>
<?php
get_footer();
