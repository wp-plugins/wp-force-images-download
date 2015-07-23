<?php
/* register menu item */
function wp_force_images_download_admin_menu_setup(){
add_submenu_page(
 'options-general.php', //parent_slug
 'WP-Force Images Download:Settings',//page_title
 'WP-Force Images Download',//menu_title
 'manage_options',//capability
 'wp-force-images-download',//slug
 'wp_force_images_download'//function to use
 );
}
add_action('admin_menu', 'wp_force_images_download_admin_menu_setup'); //menu setup

/* display page content */
function wp_force_images_download() {
 global $submenu;
// access page settings 
 $page_data = array();
 foreach($submenu['options-general.php'] as $i => $menu_item) {
 if($submenu['options-general.php'][$i][2] == 'wp-force-images-download')
 $page_data = $submenu['options-general.php'][$i];
 }

// output 
?>
<div class="wrap">
<?php screen_icon();?>
<h2><?php echo $page_data[3];?></h2>
<form id="wp_force_images_download_options" action="options.php" method="post">
<?php
settings_fields('wp_force_images_download_options');
do_settings_sections('wp-force-images-download'); 
submit_button('Save options', 'primary', 'wp_force_images_download_options_submit');
?>
 </form>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="36%" valign="top">
	<h4>Feel free to ask questions on <a href="https://wordpress.org/support/plugin/wp-force-images-download/" target="_new">support page</a></h4></td>
    <td valign="top"><h3>Support Me!</h3>
	<h4>Please make a <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=TNFBA9JHH6854&lc=US&item_name=Nazakat%20Ali&currency_code=USD&bn=PP%2dDonationsBF%3alogo11w%2epng%3aNonHosted" target="_new">donation</a> and/or give it a <a href="https://wordpress.org/support/view/plugin-reviews/wp-force-images-download/" target="_new">5-star rating.</a><br/>

Your generous support encourages me to continue developing free plugins and other wordpress resources for free. Thanks! </h4></td>
 <tr><td></td><td></td></tr>
 </tr>
</table>
</div>
<?php
}
/* settings link in plugin management screen */
function wp_force_images_download_link($actions, $file) {
if(false !== strpos($file, 'wp-force-images-download'))
 $actions['settings'] = '<a href="options-general.php?page=wp-force-images-download">Settings</a>';
return $actions; 
}
add_filter('plugin_action_links', 'wp_force_images_download_link', 2, 2);

/* register settings */
function wp_force_images_download_init(){

register_setting(
 'wp_force_images_download_options',
 'wp_force_images_download_options',
 'wp_force_images_download_options_validate'
 );

add_settings_section(
 'wp_force_images_download_fields_group',
 'How To Use', 
 'wp_force_images_download_desc',
 'wp-force-images-download'
 );

add_settings_field(
 'wp_force_images_download_single',
 'Bulk Rename Images:', 
 'wp_force_images_download_field_single',
 'wp-force-images-download',
 'wp_force_images_download_fields_group'
 );
}

add_action('admin_init', 'wp_force_images_download_init');

/* validate input */
function wp_force_images_download_options_validate($input){
if(isset($input))
return $input;
}

/* description text */
function wp_force_images_download_desc(){
echo "<h4>For complete documentation visit plugin site. <a target=\"_new\" href=\"https://wordpress.org/plugins/wp-force-images-download/\">click here</a> or you can contact on <a href=\"https://wordpress.org/support/plugin/wp-force-images-download/\" target=\"_new\">support page</a>, Thanks</h4>";
}

/* filed output */
function wp_force_images_download_field_single() {
 $options = get_option('wp_force_images_download_options');
 $wpfidsingle = (isset($options['wpfid_single'])) ? $options['wpfid_single'] : '';
 $wpfidsingle = esc_textarea($wpfidsingle); //sanitise output
?>
 <input id="wpfid_single" name="wp_force_images_download_options[wpfid_single]" class="large-text code"
 value="<?php echo $wpfidsingle;?>"/>Default value: <i>none</i><br/>
 Available values <ul><li>%site_name%:  Replaced with the Site Title</li><li>%post_title%:  Replaced with the current post title</li><li>%timestamp%: Replaced with the current time in unix timestamp format</li><li>%post_id%: Replaced with the current post id</li></ul><b>Note:</b> These variables are replaced with their corresponding values.You can use only one variable at a time.
<br/>If you set new name in shortcode for individual images, the name in shortcode is preferred.

<?php
}

function wpfid_values(){
		function check1($input){
	if(!isset($input) or $input == ""){
		
		//return $author_name = the_author();
		//wp 3.1 fix
		$current_user = wp_get_current_user();
		echo $current_user = $current_user->display_name;
	}else {
		
		echo $author_name = $input;
	}}
	
	$wpfid_options = get_option( 'wp_force_images_download_options');
	$single_author = trim($wpfid_options['wpfid_single']);
	$singular_author = trim($wpfid_options['wpfid_singular']);
}

#add_action('wp_head', 'wpfid_values');

//Notice
add_action('admin_notices', 'wpfid_admin_notice');
function wpfid_admin_notice() {
if ( current_user_can( 'install_plugins' ) )
   {
     global $current_user ;
        $user_id = $current_user->ID; 
		//Check that the user hasn't already clicked to ignore the message 
     if ( ! get_user_meta($user_id, 'wpfid_ignore_notice') ) {
        echo '<div class="updated"><p>';
        printf(__('Go to settings page to configure the <b><a href="options-general.php?page=wp-force-images-download">WP-Force Images Download</a>, Thanks</b> | <a href="%1$s">[Hide Notice]</a>'), '?wpfid_nag_ignore=0');
        echo "</p></div>";
     }
    }
}

add_action('admin_init', 'wpfid_nag_ignore');

function wpfid_nag_ignore() {
     global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['wpfid_nag_ignore']) && '0' == $_GET['wpfid_nag_ignore'] ) {
             add_user_meta($user_id, 'wpfid_ignore_notice', 'true', true);
     }
}
