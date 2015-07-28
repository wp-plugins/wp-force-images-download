<?php
/**
 * Plugin Name: WP-Force Images Download
 * Plugin URI: https://wordpress.org/plugins/wp-force-image-download/
 * Description: Put wp_fid(); template tag or [wpfid] shortcode where you want to appear download button. For more details see description.
 * Author: Nazakat ALi
 * Author URI: https://profiles.wordpress.org/nazakatali32
 * Version: 1.4
 * License: GPL2
 */
 /*  Copyright 2014  Nazakat ALi  (email : nazakatali32@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/
defined('ABSPATH') or die("No script kiddies please...!");
require_once('inc.php');
wp_register_style('wpfid-css', plugins_url('style.css', __FILE__), array(), 'all');
wp_enqueue_style('wpfid-css');
function wp_fid($btn_text = "Download",$btn_color = "grey"){
if(has_post_thumbnail()){
$filelink = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$filelink = $filelink[0];
echo "<table id=\"wpfid-table\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr><td align=\"center\">
<form id=\"wpfid-form\" method=\"post\" action=\"".plugins_url('fd.php',__FILE__)."\">
<input name=\"new_name\" type=\"hidden\" value=\"$new_name\" />
 <input name=\"pic_url\" type=\"hidden\" value=\"$filelink\" />
 <input id=\"wp_fid_button\" class=\"wpfid_button\" type=\"submit\" title=\"". $btn_text."\" value=\"".$btn_text."\" />
 </form></td></tr>";
echo "</table>";
echo "<style type=\"text/css\">table#wpfid-table input#wp_fid_button{background: none repeat scroll 0% 0%  $btn_color;}table#wpfid-table input#wp_fid_button:hover {background: $btn_color;}</style>";
}
};
function wp_fid_short($atts){
extract( shortcode_atts(
		array(
			'title' => 'Download',
			'color' => 'grey',
			'link' => 'post-thumb',
			'new_name' => ''
		), $atts )
	);
if ($link == 'post-thumb' || empty($link)){
if(has_post_thumbnail()){
$filelink = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$filelink = $filelink[0];}}else{
$filelink = $link;
}
//Get Value of Field
		$wpfid_options = get_option( 'wp_force_images_download_options');
		$wpfid_field = trim($wpfid_options['wpfid_single']);
	if(isset($wpfid_field) and !empty($wpfid_field)){
		if($wpfid_field == '%site_name%'){
		$new_name_field = get_bloginfo( 'blogname');
		}else if($wpfid_field == '%post_title%'){
		$new_name_field = get_the_title();
		}else if($wpfid_field == '%timestamp%'){
		$new_name_field = current_time('timestamp');
		}else if($wpfid_field == '%post_id%'){
		$new_name_field = get_the_id();
		}
		
	}

echo "<table id=\"wpfid-table\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr><td align=\"center\">

<form id=\"wpfid-form\" method=\"post\" action=\"".plugins_url('fd.php',__FILE__)."\"> 
<input name=\"pic_url\" type=\"hidden\" value=\"$filelink\" />
<input name=\"new_name\" type=\"hidden\" value=\"$new_name\" />
<input name=\"new_name_field\" type=\"hidden\" value=\"$new_name_field\" />
<input class=\"wpfid_button\" type=\"submit\" title=\"". $title."\" value=\"".$title."\" />
</form>

</td></tr>";
echo "</table>";
echo "<style type=\"text/css\">table#wpfid-table input.wpfid_button{background: none repeat scroll 0% 0% $color;}table#wpfid-table input.wpfid_button:hover{background:$color;}</style>";
}
add_shortcode( 'wpfid' , 'wp_fid_short' );
?>
