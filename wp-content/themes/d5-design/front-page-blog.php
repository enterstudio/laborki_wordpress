<?php 
/* 	Design Theme's part for showing blog or page in the front page
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.7
*/

?>
 <br />
 <div id="f-post-page" > >>Kliknij, jeżeli chcesz zobaczyć moje wpisy! </div>
<div id="f-post-page-container" >
 <div id="content">
 <?php if (have_posts()) : while (have_posts()) : the_post();?>
 <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
 <?php if (!is_page()): ?><span class="postmetadata"><h3><?php the_time('F j, Y'); ?></h3><div class="content-ver-sep"> </div><h2>By: <?php the_author_posts_link() ?></h2><h5><?php comments_popup_link('No Comments Yet&#187;', '1 Comment &#187;', '% Comments &#187;'); ?></h5>Posted in <?php the_category(', ') ?><?php the_tags('<br />Tags: ', ', ', ''); ?><br /><h5><?php edit_post_link('Edit'); ?></h5></span><?php endif; ?>		
 <div class="entrytext"> <?php if (!is_page()): ?><div class="thumb"><?php the_post_thumbnail(); ?></div>	
 <?php else: if (esc_html(of_get_option('tpage', '') != '1' )): ?><div class="thumb"><?php the_post_thumbnail(); ?></div><?php endif; endif; ?>
 <?php design_content(); ?>
 <div class="clear"> </div>
 </div></div>
 <div class="content-ver-sep"></div><br />
 
 <?php endwhile;  if (!is_page()): ?>

<div id="page-nav">
<div class="alignleft"><?php previous_posts_link('&laquo; Newer Entries') ?></div>
<div class="alignright"><?php next_posts_link('Older Entries &raquo;','') ?></div>
</div>
 
<?php endif; endif; ?>
 
</div>
<?php get_sidebar(); ?>
<div class="clear"></div><div class="lsep"></div></div>