<?php
/*
	Design Theme's Front Page
	Design Theme's Front Page to Display the Home Page if Selected
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/
?>
<?php get_header(); ?>
 <div id="slide-container"><div id="slide"><img src="<?php echo of_get_option('banner-image', get_template_directory_uri() . '/images/slide-image/slide-image1.jpg'); ?>"/></div></div>
<div id="container">
<h1 id="heading"><?php echo esc_textarea(of_get_option('heading_text', 'WordPress is web software you can use to create a beautiful website or blog')); ?></h1>
<?php get_template_part( 'featured-box' ); ?> 
<?php if (esc_html(of_get_option('fpost', '0') != '1')): get_template_part( 'front-page-blog' ); endif;?> 
<?php if ( esc_textarea(of_get_option('bottom-quotation', 'All the developers of D5 Creation have come from the disadvantaged part or group of the society. All have established themselves after a long and hard struggle in their life ----- D5 Creation Team')) != '' ) : ?>
<div id="customers-comment">
<blockquote><?php echo esc_textarea(of_get_option('bottom-quotation', 'All the developers of D5 Creation have come from the disadvantaged part or group of the society. All have established themselves after a long and hard struggle in their life ----- D5 Creation Team')); ?></blockquote>
</div>
<?php endif; ?>
<?php get_footer(); ?>