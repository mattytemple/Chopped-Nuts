<?php get_header(); ?>
<div id="padding">&nbsp;</div>
			<div id="single">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            	<div id="singleholder">
                	<?php 
						$in_subcategory = false;
						foreach ( explode( "/", get_category_children(get_option('pd_photos_category')) ) as $child_category ) {
							if (in_category($child_category)) $in_subcategory = true;
						}
					?>
					<?php if ($in_subcategory || in_category(get_option('pd_photos_category'))) : ?>
                    <!--<div id="colorselection">
                        <div class="colorsquare" id="bg1"><img src="<?php bloginfo('template_directory'); ?>/img/empty.gif" alt="Choose color" width="84" height="18"/></div>
                        <div class="colorsquare" id="bg2"><img src="<?php bloginfo('template_directory'); ?>/img/empty.gif" alt="Choose color" width="84" height="18"/></div>
                        <div class="colorsquare" id="bg3"><img src="<?php bloginfo('template_directory'); ?>/img/empty.gif" alt="Choose color" width="84" height="18"/></div>
                        <div class="colorsquare" id="bg4"><img src="<?php bloginfo('template_directory'); ?>/img/empty.gif" alt="Choose color" width="84" height="18"/></div>
                        <div class="colorsquare" id="bg5"><img src="<?php bloginfo('template_directory'); ?>/img/empty.gif" alt="Choose color" width="84" height="18"/></div>
                        <div class="colorsquare" id="bg6"><img src="<?php bloginfo('template_directory'); ?>/img/empty.gif" alt="Choose color" width="84" height="18"/></div>
                        <div class="colorsquare" id="bg7"><img src="<?php bloginfo('template_directory'); ?>/img/empty.gif" alt="Choose color" width="84" height="18"/></div>
                        <div class="colorsquare" id="bg8"><img src="<?php bloginfo('template_directory'); ?>/img/empty.gif" alt="Choose color" width="84" height="18"/></div>
                        <div class="colorsquare" id="bg9"><img src="<?php bloginfo('template_directory'); ?>/img/empty.gif" alt="Choose color" width="84" height="18"/></div>
                        <div class="colorsquare" id="bg10"><img src="<?php bloginfo('template_directory'); ?>/img/empty.gif" alt="Choose color" width="84" height="18"/></div>
                        <div class="colorsquare" id="bg11"><img src="<?php bloginfo('template_directory'); ?>/img/empty.gif" alt="Choose color" width="84" height="18"/></div>
                    </div>-->
                	<div class="imagepan">
	                    <img src="<?php print (get_post_meta($post->ID, 'big_photo_value', $single = true)) ? get_post_meta($post->ID, 'big_photo_value', $single = true) : get_bloginfo('template_directory').'/img/empty.gif' ?>" />
                    </div>
                    <script type="text/javascript">
						$(function() {
							$(".imagepan img").imagetool({
								viewportWidth: 930,
								viewportHeight: 500,
								loading: "<?php bloginfo('template_directory'); ?>/img/loader.gif"
							});
						});
                    </script>
                    <?php endif; ?>
                    
                    <div class="photocomment">
                    	<h1><?php the_title(); ?></h1>
                        <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
            
			            <div><span class="posted_under">Posted under:</span> <span class="categoryname"><?php the_category(', ') ?></span> <?php print the_tags( '- <span class="posted_under">Tags:</span><span class="categoryname"> ', ', ', '</span>'); ?></div>
            			<?php edit_post_link('Edit this entry', '<p class="edit">', '</p>'); ?>
                        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                    </div>
                    
                    <!--<a href="#" id="opencomments" class="javalink">Open comments (<?php comments_number('0', '1', '%' );?>)</a>-->
                    <div id="comments">
                        <?php comments_template(); ?>
                    </div>
                    
                </div> <!-- end sinlgeholder -->
        	</div> <!-- end single -->
           <?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>

<?php get_footer(); ?>
