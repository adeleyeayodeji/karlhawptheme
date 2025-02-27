<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karlhawptheme
 */

get_header();
/**
 * Display the home page content
 * 
 */

/* Start the Loop */
while (have_posts()) :
	the_post();

	// Display the post content
	the_content();

	// If comments are open or there is at least one comment, load up the comment template.
	if (comments_open() || get_comments_number()) {
		comments_template();
	}
endwhile; // End of the loop.

get_footer();
