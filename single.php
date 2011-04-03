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
                    
                	<div class="imagepan">
	                    <?php
	                    				$imagepath = get_post_meta($post->ID, 'big_photo_value', $single = true);
	                    				list($width, $height, $type, $attr)=getimagesize($imagepath); 
	                    				$ht=$height; 
	                    				$wd=$width;
	                    			?>
	                    			<div class="singlephoto" style="width:950px; height:<?php echo $ht; ?>px; margin-left:auto; margin-right:auto; background:url(<?php print (get_post_meta($post->ID, 'big_photo_value', $single = true)) ? get_post_meta($post->ID, 'big_photo_value', $single = true) : get_bloginfo('template_directory').'/img/nice-try.gif' ?>) no-repeat center center;">
	                    			    <img src="<?php print get_bloginfo('template_directory'); ?>/img/nice-try.gif" alt="<?php the_title(); ?>" width="950px" height="<?php echo $ht; ?>px" />
	                    			</div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="photocomment">
                    	<h1><?php the_title(); ?></h1>
                        <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
            
			            <div><span class="posted_under">Posted under:</span> <span class="categoryname"><?php the_category(', ') ?></span> <?php print the_tags( '- <span class="posted_under">Tags:</span><span class="categoryname"> ', ', ', '</span>'); ?></div>
            			<?php edit_post_link('Edit this entry', '<p class="edit">', '</p>'); ?>
                        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                    </div>
                    
                    <div id="comments">
                        <?php comments_template(); ?>
                    </div>
                    
                </div> <!-- end sinlgeholder -->
        	</div> <!-- end single -->
           <?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>

<?php get_footer(); ?>
