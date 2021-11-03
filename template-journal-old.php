<?php
/**
 * Template Name: Journal Page Template
 * The template for displaying all Journals
 */
 

get_header();
?>

	<div id="journal-page" class="content-area spaced-container-150 nf-wrapper">
		<main id="main" class="site-main">
			
		
			<div class="row" id="add-here">
				
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<!-- <div class="nf-work-loadmore" onClick="loadNextSet(6,true,'journal')"><h2>Load More</h2></div> -->
	<script>
		window.addEventListener('DOMContentLoaded', (event) => {
			isJournalPage();
		});
	</script>
<?php
get_footer();
