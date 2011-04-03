<?php
/*if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
*/

$themename = "Senile Robot";
$shortname = "sr";

$options = array (

	array ("name" => "Menu Settings",
			"type" => "title"),
			
	array ("type" => "open"),

	array ("name" => "Logo",
			"desc" => "Enter full path to your logo.",
			"id" => $shortname."_logo_path",
			"std" => "",
			"type" => "text"),
	
	array ("name" => "Photos Top Category (ID)",
			"desc" => "Enter your photos category ID.",
			"id" => $shortname."_photos_category",
			"std" => "",
			"type" => "text"),
			
	array ("type" => "close"),
	
	
	array ("name" => "Footer Settings",
			"type" => "title"),
			
	array ("type" => "open"),
	
	array ("name" => "Contact Details",
			"desc" => "Contact details. This will be printed in the footer.",
            "id" => $shortname."_contact_details",
			"std" => 'Email me at <a href="mailto:john@domain.com">john@domain.com</a> or give me a call (00) 123-456-789',
            "type" => "textarea"),
	
	array ("name" => "Google Analytics Code",
			"desc" => "Enter javascript code provided by Google. UA-123456-7",
			"id" => $shortname."_google_analytics",
			"std" => "",
			"type" => "text"),
	
	array ("type" => "close")
	
);

function mytheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['action'] ) {
        	foreach ($options as $value) {
            	update_option( $value['id'], $_REQUEST[ $value['id'] ] );
			}
            foreach ($options as $value) {
            	if (isset($_REQUEST[$value['id']])) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] );
				}
			}
            header("Location: themes.php?page=functions.php&saved=true");
            die;
        } else if ('reset' == $_REQUEST['action']) {
            foreach ($options as $value) {
                delete_option( $value['id'] );
			}
            header("Location: themes.php?page=functions.php&reset=true");
            die;
        }
    }
    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap">
    <h2><?php echo $themename; ?> Settings</h2>
    <form method="post">
    <?php foreach ($options as $value) { 
        switch ($value['type']) {
    
            case "open":
            ?>
            <table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">
            <?php break;		
            
            case "close":
            ?>
            </table><br />
            <?php break;
            
            case "title":
            ?>
            <table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;">
                <tr>
                    <td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
                </tr>
            <?php break;
    
            case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo $value['std']; } ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
        
        <?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:100px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea></td>
            
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
            
            case 'select':
            ?>
            <tr>
                <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
           </tr>
                    
           <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr>
           <tr>
                <td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td>
           </tr>
            <?php break;
                
            case "checkbox":
            ?>
                <tr>
                    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                    <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                    </td>
                </tr>
                            
               <tr>
                    <td><small><?php echo $value['desc']; ?></small></td>
               </tr>
               <tr>
                    <td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td>
               </tr>
            <?php break;
        } 
    }
?>
<!--</table>-->
<p class="submit">
    <input name="save" type="submit" value="Save changes" />    
    <input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
    <p class="submit">
        <input name="reset" type="submit" value="Reset" />
        <input type="hidden" name="action" value="reset" />
    </p>
</form>
<?php
}
add_action('admin_menu', 'mytheme_add_admin'); ?>
<?php
/*
Plugin Name: Custom Write Panel
Plugin URI: http://wefunction.com/2008/10/tutorial-create-custom-write-panels-in-wordpress
Description: Allows custom fields to be added to the WordPress Post Page
Version: 1.0
Author: Spencer
Author URI: http://wefunction.com
/* ----------------------------------------------*/

$new_meta_boxes = array(
	"thimage" => array(
		"name" => "thimage",
		"std" => "",
		"title" => "Thumbnail of the photo",
		"description" => "Using the \"<em>Add an Image</em>\" button, upload an image and paste the URL here. 220×160px"
	),
	
	"big_photo" => array(
		"name" => "big_photo",
		"std" => "",
		"title" => "Large photo",
		"description" => "Using the \"<em>Add an Image</em>\" button, upload an image and paste the URLs here (recommended size: 950px wide)."
	)
	
);

function new_meta_boxes() {
	global $post, $new_meta_boxes;
	
	foreach ($new_meta_boxes as $meta_box) {
		$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
		if ($meta_box_value == "") {
			$meta_box_value = $meta_box['std'];
		}
		
		echo '<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		echo '<b>'.$meta_box['title'].'</b>';
		echo '<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="" style="width:99%;" /><br />';
		echo '<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
	}
}

function create_meta_box() {
	global $theme_name;
	
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'new-meta-boxes', 'Portfolio Item Settings', 'new_meta_boxes', 'post', 'normal', 'high' );
	}
}

function save_postdata( $post_id ) {
	global $post, $new_meta_boxes;
	
	foreach($new_meta_boxes as $meta_box) {
		// Verify
		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		
		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ))
				return $post_id;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ))
				return $post_id;
		}
		
		$data = $_POST[$meta_box['name'].'_value'];
		
		if (get_post_meta($post_id, $meta_box['name'].'_value') == "") {
			add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
		} elseif ($data != get_post_meta($post_id, $meta_box['name'].'_value', true)) {
			update_post_meta($post_id, $meta_box['name'].'_value', $data);
		} elseif($data == "") {
			delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
		}
	}
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');


/** comments layout **/
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    	<div class="commentitem" id="comment-<?php comment_ID(); ?>">
            <div class="gravatar">
                <?php echo get_avatar($comment, $size='60', $default='http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' ); ?>
            </div>
            <div class="commentblock">
                <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
                
                <?php comment_text() ?>
                
                <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date('m-d-Y'),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
                
                <div class="reply">
                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
                
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.') ?></em>
                <?php endif; ?>
            </div>
     	</div>
        <div class="clear"></div>
<?php
}

function register_my_menus() {
  register_nav_menus(
    array('header-menu' => __( 'Header Menu' ) )
  );
}

add_action( 'init', 'register_my_menus' );

?>