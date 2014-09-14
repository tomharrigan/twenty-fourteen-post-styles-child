<?php
/**
 * The template for displaying Post Format pages
 *
 * Used to display archive-type pages for posts with a post format.
 * If you'd like to further customize these Post Format views, you may create a
 * new template file for each specific one.
 *
 * @todo http://core.trac.wordpress.org/ticket/23257: Add plural versions of Post Format strings
 * and remove plurals below.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<h1 class="archive-title">
					<?php
						if ( is_tax( 'post_style', 'post-style-aside' ) ) :
							_e( 'Asides', 'twentyfourteen' );

						elseif ( is_tax( 'post_style', 'post-style-image' ) ) :
							_e( 'Images', 'twentyfourteen' );

						elseif ( is_tax( 'post_style', 'post-style-video' ) ) :
							_e( 'Videos', 'twentyfourteen' );

						elseif ( is_tax( 'post_style', 'post-style-audio' ) ) :
							_e( 'Audio', 'twentyfourteen' );

						elseif ( is_tax( 'post_style', 'post-style-quote' ) ) :
							_e( 'Quotes', 'twentyfourteen' );

						elseif ( is_tax( 'post_style', 'post-style-link' ) ) :
							_e( 'Links', 'twentyfourteen' );

						elseif ( is_tax( 'post_style', 'post-style-gallery' ) ) :
							_e( 'Galleries', 'twentyfourteen' );

						else :
							_e( 'Archives', 'twentyfourteen' );

						endif;
					?>
				</h1>
			</header><!-- .archive-header -->

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_style() );

					endwhile;
					// Previous/next page navigation.
					twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
