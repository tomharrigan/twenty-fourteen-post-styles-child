<?php
/*
 * Outputs the default primary content area for all pages.
 */
?>
<div <?php post_class( 'archive-post clearfix' ); ?>>
	<div class="post-content">
		<?php do_action( 'stream_meta', $post ); ?>
		<h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
		<?php echo apply_filters( 'the_content', tdr_shorten_text( get_the_excerpt(), 130 ) ); ?>
		<div class="archive-author-likes clearfix">
			<div class="author"><?php the_author_posts_link(); ?></div>
			<?php display_social( $post->ID ); ?>
		</div>
		<a class="more" href="<?php the_permalink(); ?>">Read More</a>
	</div>
</div>