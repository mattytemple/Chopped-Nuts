			<h1><?php echo single_cat_title(); ?></h1>
            <?php if (have_posts()) : ?>
            
				<?php while (have_posts()) : the_post(); ?>
                <div class="singlepost">
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <p class="postdate">&ndash; <?php the_time('l, F jS, Y') ?></p>
                    <?php the_excerpt(); ?>
                    <div><span class="commentcount"><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span> <?php print the_tags( '<span class="posted_under">Tags:</span><span class="categoryname"> ', ', ', '</span>'); ?></div>
                    
                </div>
                <?php endwhile; ?>
                
                <div class="navigation">
                    <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
                    <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
                </div>

			<?php else: ?>
            	<?php echo "<h2 class='center'>No posts found.</h2>"; ?>
            <?php endif; ?>