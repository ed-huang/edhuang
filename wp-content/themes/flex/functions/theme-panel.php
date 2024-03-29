<?php

$themename = "Flex";
$shortname = "theme";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

		$yesno = array("Yes","No");
		$htmlxhtml = array("HTML 4.0 Strict","XHTML 1.0 Strict");
		$color = array("Carbon","Dark", "White", "Red", "Blue", "Green",  "Yellow", "DeepSpace", "Chrome", "WoodGrain", "Grunge", "Paper");
		
		global $wpdb;
		$pages = $wpdb->get_results('select * from '. $wpdb->prefix .'posts where post_type="page" and post_status="publish"');
		$page_listing = array();
		
		foreach($pages as $page_list) {
			$page_listing[$page_list->post_title] = $page_list->post_title;
		}
		
array_unshift($wp_cats, "Choose a category"); 



/* ----------------------
		Options
	------------------------ */

	$options = array (
			

			array(	"name" => "Design Settings",
					"type" => "section"),
			array( "type" => "open"),  
					
			array( 	"name" => "Theme Color",
					"desc" => "Take your pick! This will simply load a new custom-stylesheet after the core stylesheets are loaded. Modify these in the /css/custom folder. You can use these as-is, or customize them all you want.",
					"id" => $shortname."_color",
					"std" => "Theme Color:",
					"type" => "select",
					"options" => $color),
					
			array( 	"name" => "Logo URL",
					"desc" => "Enter the URL of your logo. IE: http://yourwebsite.com/images/yourlogo.png (note: this should be about 150x60 for quick and easy setup, but can be any size that you want. You can use the #logo ID in the CSS to customize the positioning using basic CSS margins.)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "text"),

			array( 	"name" => "Favicon URL",
					"desc" => "Enter the URL of your image that you'd like to use for the Browser Icon (16px x 16px)",
					"id" => $shortname."_favicon",
					"std" => "",
					"type" => "text"),
			
			array( 	"name" => "Custom Page Width",
					"desc" => "Optional*: This will change the width of the content-column on all pages/posts that aren't the homepage. You can enter a simple number (ie: 640) into this field if you'd prefer to change it from the default (590). No need to enter px to the end.",
					"id" => $shortname."_customwidth",
					"std" => "",
					"type" => "text"),	
								
			array( 	"name" => "Custom CSS",
					"desc" => "You can enter custom style rules into this box if you'd like. IE: <i>a{color: red !important;}</i><br />
					This is an advanced option! This is not recommended for users not fluent in CSS.",
					"id" => $shortname."_customcss",
					"std" => "",
					"type" => "textarea"),		
						
			array( 	"name" => "Post Thumbnail Placeholder",
					"desc" => "Enter the URL to the image that you'd like to use for posts that don't have thumbnails assigned yet.",
					"id" => $shortname."_post_blankthumb",
					"std" => "",
					"type" => "text"),		
					
						
			array( "type" => "close"), 										
			array(	"name" => "Shuffle Link",
					"type" => "section"),
			array( "type" => "open"),  			
			
			
			array( 	"name" => "Shuffle Link",
					"desc" => "This is just for fun right now, it adds a button to the main nav, that when clicked, randomly shuffles the order of the visible pieces in the grid.",
					"id" => $shortname."_shuffle_link",
					"std" => "Display Shuffle Link:",
					"type" => "select",
					"options" => $yesno),			
					
			array( 	"name" => "Shuffle Link Text",
					"desc" => "If you've selected Yes for the Shuffle-Link, you can enter the text for the link here. IE: Shuffle, Sort, Mix it up!, etc.",
					"id" => $shortname."_shuffle_text",
					"std" => "",
					"type" => "text"),
			
					
			array( "type" => "close"), 	
			array(	"name" => "Social Media",
					"type" => "section"),
			array( "type" => "open"),  			
								
					
			array( 	"name" => "Facebook URL",
					"desc" => "Enter the URL of your Facebook page (leave blank if you don't want this option).",
					"id" => $shortname."_facebook",
					"std" => "",
					"type" => "text"),
					
			array( 	"name" => "Twitter Username",
					"desc" => "Enter the username of your Twitter account (IE: http://twitter.com/your_user_name leave blank if you don't want this option).",
					"id" => $shortname."_twitter",
					"std" => "",
					"type" => "text"),
					
			array( 	"name" => "Vimeo URL",
					"desc" => "Enter the URL of your Vimeo page (leave blank if you don't want this option).",
					"id" => $shortname."_vimeo",
					"std" => "",
					"type" => "text"),
			
			array( 	"name" => "Tumblr URL",
					"desc" => "Enter the URL of your Tumblr page (leave blank if you don't want this option).",
					"id" => $shortname."_tumblr",
					"std" => "",
					"type" => "text"),
					
			array( 	"name" => "Email Address",
					"desc" => "Enter an email address if you'd like people to be able to send you email from the top bar.",
					"id" => $shortname."_email_top",
					"std" => "",
					"type" => "text"),
			
			array( 	"name" => "Copyright Text",
					"desc" => "Enter the text that'll show up at the bottom of the page for your Copyright info.",
					"id" => $shortname."_copyright",
					"std" => "",
					"type" => "text"),
						
			array( "type" => "close"), 
					
	  );





function mytheme_add_admin() {
 
global $themename, $shortname, $options;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=theme-panel.php&saved=true");
die;
 
} 
else if( 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=theme-panel.php&saved=true");
die;
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_script("bj_script", $file_dir."/functions/admin_script.js", false, "1.0");

}
function mytheme_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved. w p l o c k e r . c o m</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<div class="wrap bj_wrap">
<h2 style="margin-bottom: 10px;"><img src="<?php bloginfo('template_directory'); ?>/functions/images/adminpanel_header.jpg" /></h2>
 
<div class="bj_opts">
<form method="post">
	
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

 
<?php break;
 
case 'text':
?>

<div class="bj_input bj_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="bj_input bj_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  
<?php
break;
 
case 'select':
?>

<div class="bj_input bj_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case "checkbox":
?>

<div class="bj_input bj_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":

$i++;

?>

<div class="bj_section">
<div class="bj_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.gif" class="inactive" alt=""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="bj_options">
 
<?php break; } } ?>
 
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

</div> 
</div>

<div style="font-size:9px; margin-top: 20px; margin-bottom:10px;">Admin Panel Script based on Tutorials from: <a href="http://literalbarrage.org/blog/archives/2007/05/03/a-theme-tip-for-wordpress-theme-authors/">LiteralBarrage.org</a> and <a href="http://net.tutsplus.com/tutorials/wordpress/how-to-create-a-better-wordpress-options-panel?r=8549&i=l0">Rohan Mehta from net.tutsplus.com</a> and modified by <a href="http://makedesignnotwar.com">Brandon Jones (epicera at ThemeForest)</a></div>


<?php } ?><?php add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>