<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<a name="comments" id="comments"></a>
<div class="w50 left15px" id="commentslist">
<?php if ( have_comments() ) : ?>
		<div class="navigation">
            <div class="alignleft"><?php previous_comments_link() ?></div>
            <div class="alignright"><?php next_comments_link() ?></div>
        </div>
        
        <ul class="commentlist">
              <?php wp_list_comments('avatar_size=60&type=comment&callback=mytheme_comment'); ?>
        </ul>
        
        <div class="navigation">
            <div class="alignleft"><?php previous_comments_link() ?></div>
            <div class="alignright"><?php next_comments_link() ?></div>
        </div>
       
<?php else : // this is displayed if there are no comments so far ?>
    
        <?php if ('open' == $post->comment_status) : ?>
          <!-- If comments are open, but there are no comments. -->
          There are no comments yet
        <?php else : // comments are closed ?>
        
        <?php endif; ?>
<?php endif; ?>
</div>

<?php if ('open' == $post->comment_status) : ?>

	<div class="w50" id="respond">

		<h3><?php comment_form_title( 'Add Your Comment', 'Add Your Comment' ); ?></h3>

        <div class="cancel-comment-reply">
            <small><?php cancel_comment_reply_link(); ?></small>
        </div>

		<?php if (get_option('comment_registration') && !$user_ID) : ?>
			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
			<div>
			<?php if ($user_ID) : ?>
				<p>Logged in as <strong><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a></strong>. <a class="blue" href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a></p>
			<?php endif; ?>
    
			<div id="commentformdiv">
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" name="commentform">
    				<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="1" defaultvalue="Your Message ...">Your Message ...</textarea>
    			<?php if (!$user_ID) : ?>
                    <input class="text" type="text" name="author" id="author" value="<?php echo $comment_author ? $comment_author : "Name"; ?>" defaultvalue="<?php echo $comment_author ? $comment_author : "Name"; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
        
                    <input class="text" type="text" name="email" id="email" value="<?php echo $comment_author_email ? $comment_author_email : "E-mail"; ?>" defaultvalue="<?php echo $comment_author_email ? $comment_author_email : "E-mail"; ?>" size="22" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> />
        
                    <input class="text" type="text" name="url" id="url" value="<?php echo $comment_author_url ? $comment_author_url : "Website"; ?>" defaultvalue="<?php echo $comment_author_url ? $comment_author_url : "Website"; ?>" size="22" tabindex="4" />
    
				<?php endif; ?>
    
			</div>
    
					<input class="sendmessage" type="submit" value="Send comment" name="submit" id="submit" tabindex="5" />
					<?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>
				</form>
	</div>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
