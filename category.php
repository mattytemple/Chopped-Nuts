<?php get_header(); ?>
    
        	<?php
			$in_subcategory = false;
            foreach ( explode( "/", get_category_children(get_option('pd_photos_category')) ) as $child_category ) {
				if (in_category($child_category)) $in_subcategory = true;
			}
			?>
            <?php if ($in_subcategory || in_category(get_option('pd_photos_category'))) {
            	include (TEMPLATEPATH . '/photos-cat.php');
			?>  
			<?php
            } else {
			?>
            	<div id="single">
		    	<div id="singleholder">
            <?php
        		include (TEMPLATEPATH . '/all-cat.php');
			?>
            	</div>
                </div>
            <?php
			}
            ?>
<?php get_footer(); ?>