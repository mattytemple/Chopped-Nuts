<?php get_header(); ?>
		<div id="single">
        	<div id="singleholder">
                <div id="page">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                  <h1><?php the_title(); ?></h1>
                    <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
        
                    <?php edit_post_link('Edit this entry', '<p class="edit">', '</p>'); ?>
                    
                    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                    
                    <a href="#" id="opencomments" class="javalink">Open comments (<?php comments_number('0', '1', '%' );?>)</a>
                    <div id="comments">
                    	<a name="commentanchor" id="commentanchor"></a>
                      	<?php comments_template(); ?>
                    </div>
                    
                <?php endwhile; else: ?>
                    <p>Sorry, no pages matched your criteria.</p>
                <?php endif; ?>
                </div>
        	</div>
		</div>

<?php get_footer(); ?>