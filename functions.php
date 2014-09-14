<?php 

// Faster than @import
add_action( 'wp_enqueue_scripts', 'my_child_theme_scripts' );
function my_child_theme_scripts() {
	wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
}

add_filter( 'post_style_strings', 'add_oembed_post_style' );
function add_oembed_post_style( $strings ) {

	$strings['oembed'] = 'oEmbed';
	return $strings;
}


function child_get_oembed_or_iframe() {
	$meta = get_post_custom();

    foreach ($meta as $key => $value){
        if (false !== strpos($key, 'oembed'))
            return $value[0];
    }
	$output = preg_match_all('/(\<iframe.*\<\/iframe\>)/is', get_the_content(), $matches);
	$thumb = $matches [1] [0];

	if(!empty($thumb))
		return $thumb;

	return false;
}