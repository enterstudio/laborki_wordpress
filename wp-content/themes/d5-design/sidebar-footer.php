<?php
/* 	Design Theme's Footer Sidebar Area
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/
	
	if (esc_html(of_get_option ( 'fsidebar', '1')) != '1'):	
	if (   ! is_active_sidebar( 'sidebar-2'  )
		&& ! is_active_sidebar( 'sidebar-3' )
		&& ! is_active_sidebar( 'sidebar-4' )
		&& ! is_active_sidebar( 'sidebar-5'  )
	   )
		return;
	endif;
		
	// If we get this far, we have widgets. Let do this.
?>
<div id="footer-sidebar">
	<div id="first-footer-widget" class="widget">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : dynamic_sidebar( 'sidebar-2' ); else: if (esc_html(of_get_option ( 'fsidebar', '1')) == '1'):?>
        
        <aside id="archives" class="widget">
					<h3 class="widget-title">Categories</h3>
					
						<ul><?php wp_list_categories('orderby=name&number=5&title_li='); ?></ul>
					
		</aside>
        <?php endif; endif;?>
        </div><!-- #first .widget-area -->
        

	<div id="footer-widgets" class="widget">
    <?php if ( is_active_sidebar( 'sidebar-3' ) ) : dynamic_sidebar( 'sidebar-3' ); else: if (esc_html(of_get_option ( 'fsidebar', '1')) == '1'):?>
        <aside class="widget widget_text"><h3 class="widget-title">Sample Text</h3><div class="textwidget">The Customizable Background and other options of Design Theme will give the WordPress Driven Site an attractive look. You can chnage these texts or insert new itms from Appearence > Widgets. You will also find Theme Options..</div></aside>
       <?php endif; endif;?>
	</div><!-- #second .widget-area -->
	
	
	<div id="footer-widgets" class="widget">
    <?php if ( is_active_sidebar( 'sidebar-4' ) ) : dynamic_sidebar( 'sidebar-4' ); else: if (esc_html(of_get_option ( 'fsidebar', '1')) == '1'):?>
        <aside class="widget">
					<h3 class="widget-title">List Items</h3>
					<ul>
						<li>This is a Test List 01</li>
                        <li>This is a Test List 02</li>
                        <li>This is a Test List 03</li>
                        <li>This is a Test List 04</li>
                        <li>This is a Test List 05</li>
					</ul>
		</aside>
        <?php endif; endif;?>
	</div><!-- #third .widget-area -->
    
    <div id="footer-widgets" class="widget">
    <?php if ( is_active_sidebar( 'sidebar-5' ) ) : dynamic_sidebar( 'sidebar-5' ); else: if (esc_html(of_get_option ( 'fsidebar', '1')) == '1'):?>
        <aside id="meta" class="widget">
					<h3 class="widget-title">Meta</h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
                        <li>Some Link</li>
                        <li>Test Link</li>
                        <li>D5 Design Theme</li>
					</ul>
		</aside>
        <?php endif; endif;?>
	</div><!-- #third .widget-area -->
</div><!-- #footerwidget -->

