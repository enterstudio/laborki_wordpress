<?php
/* 	Design Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/
?>


<div class="sep3">sep</div>

<span class="featured-content1">
<h2><?php echo esc_textarea(of_get_option('fcontent01-title1', 'Design a Smart Theme by ')); ?><span> <?php echo esc_textarea(of_get_option('fcontent02-title1', 'D5 Creation')); ?></span></h2>
<p><?php echo esc_textarea(of_get_option('fcontent-description1', 'The Customizable Background and other options of Design Theme will give the WordPress Driven Site an attractive look.  Design Theme is super elegant and Professional Responsive which will create the business widely expressed.')); ?></p>

</span>

<span class="featured-content2">
<h2><?php echo esc_textarea(of_get_option('fcontent01-title2', 'Design a Smart Theme by ')); ?><span> <?php echo esc_textarea(of_get_option('fcontent02-title2', 'D5 Creation')); ?></span></h2>
<p><?php echo esc_textarea(of_get_option('fcontent-description2', 'The Customizable Background and other options of Design Theme will give the WordPress Driven Site an attractive look.  Design Theme is super elegant and Professional Responsive which will create the business widely expressed.')); ?></p>
<a href="<?php echo esc_url(of_get_option('fcontent-link2', '#')); ?>" class="read-more">Read more...</a>
</span>

<div class="sep2">sep</div>