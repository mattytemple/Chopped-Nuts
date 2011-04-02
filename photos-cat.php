			<ul class="category_tabs">
            	<?php wp_list_categories('child_of='.get_option('pd_photos_category').'&orderby=name&title_li=&depth=10'); ?>    
            </ul>
            <div class="clear"></div>
            
            <div id="homephotos">
           	<div id="homephotoholder">
            <?php if (have_posts()) : ?>
            
            <?php while (have_posts()) : the_post(); ?>
            <div class="photo" style="background:url(<?php print (get_post_meta($post->ID, 'thimage_value', $single = true)) ? get_post_meta($post->ID, 'thimage_value', $single = true) : get_bloginfo('template_directory').'/img/empty.gif' ?>) center center;">
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php print get_bloginfo('template_directory'); ?>/img/empty.gif" alt="<?php the_title(); ?>" width="190" height="130" /></a>
            </div>
            <?php endwhile; ?>
            
            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
                <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
            </div>

            <?php endif; ?>
			</div>
            </div>