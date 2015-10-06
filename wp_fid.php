<?php
/**
 * Plugin Name: WP-Force Images Download
 * Plugin URI: https://wordpress.org/plugins/wp-force-image-download/
 * Description: Put wp_fid(); template tag or [wpfid] shortcode where you want to appear download button. For more details see description.
 * Author: Nazakat ALi
 * Author URI: https://profiles.wordpress.org/nazakatali32
 * Version: 1.5
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
require_once('func.php');
function wpfid_styles(){
wp_register_style('wpfid', plugins_url('style.css', __FILE__), array(), 'all');
wp_enqueue_style('wpfid');

}add_action('wp_enqueue_scripts','wpfid_styles',999);

function wpfid_custom_css() {
	
$wpfid_options = get_option( 'wp_force_images_download_options');
$wpfid_custom_css = htmlspecialchars(trim($wpfid_options['wpfid_custom_css']));
if(isset($wpfid_custom_css) and !empty($wpfid_custom_css)){
#wp_deregister_style( 'wpfid' );
#echo "<style type=\"text/css\">{$wpfid_custom_css}</style>";
$wpfid_custom_css = str_replace(";"," !important;",$wpfid_custom_css);
wp_add_inline_style( 'wpfid', $wpfid_custom_css );
}
}add_action( 'wp_enqueue_scripts', 'wpfid_custom_css' );



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
			'color' => 'gray',
			'link' => 'post-thumb',
			'new_name' => ''
		), $atts )
	);
	
	if ($link == 'post-thumb' || empty($link))
	{
		if(has_post_thumbnail())
		{
			$filelink = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
			$filelink = $filelink[0];
		}
	}else
	{
		$filelink = $link;
		#$filesize = filesize($filelink );
	}
		//get form values
		$wpfid_options = get_option( 'wp_force_images_download_options');
		$wpfid_field = trim($wpfid_options['wpfid_single']);
		$wpfid_image_size = trim($wpfid_options['size_check_box']);
		$wpfid_btn_style = trim($wpfid_options['button_styles']);
		$wpfid_icon = trim($wpfid_options['icon_check_box']);
		$wpfid_custom_css = htmlspecialchars(trim($wpfid_options['wpfid_custom_css']));

		
		//style															//since v 1.5
		if(isset($wpfid_btn_style)){
			
		if($wpfid_btn_style == 1){
			$btn_style = "style=\"background: none;\"";
			}
		if($wpfid_btn_style == 2){
			if($wpfid_icon == 0){
				$btn_style = "style=\"background: none repeat scroll 0% 0% $color;\"";
				$btn_style .= " class=\"wpfid_button none\"";
			}else{
				$btn_style = "style=\"background: none repeat scroll 0% 0% $color;\"";
				$btn_style .= " class=\"wpfid_button\"";
			}
			}
		if($wpfid_btn_style == 3){
			if($wpfid_icon == 0){
				$btn_style = "class=\"wpfid_button button none button-$color\"";
			}else{
				$btn_style = "class=\"wpfid_button button button-$color\" style=\"height:46px;\"";
			}
			
			}
		}else{
			$btn_style = "style=\"background: none repeat scroll 0% 0% $color;\"";
			
		}
		
		//filesize 														//since v 1.5
		if(isset($wpfid_image_size) and $wpfid_image_size == 1){
			
			#$image_size = (isset($wpfid_image_size)? print '<br/> <span class=\'size\'>27.6Mb'.@wpfid_sizes(filesize($filelink)).'</span>' : print'');
			$image_size = '<br/><span class=\'size\'>'.@wpfid_sizes(filesize($filelink)).'</span>';
			if($wpfid_btn_style == 3){
			$style = 'style="line-height: 16px !important;"';
		}
		}else{
			$style = 'style="line-height: 30px;"';
			#($wpfid_image_size == 0 ?  print "style=\"line-height: 30px;\"" : print '')
		}
		
		//rename 														//since v 1.4
			$meta = array('%site_name%','%post_title%','%timestamp%','%post_id%','%rand%','%md5%','%filename%');
			$values = array
			(
				get_bloginfo( 'blogname'),
				get_the_title(),
				current_time('timestamp'),
				get_the_id(),
				mt_rand(0,100000),										//php 4.2.0
				md5(basename($filelink)),
				array_shift(explode(".", basename($filelink))),			//basename($filelink)
			);
			
		
		//output														// since v 1.5
		if(isset($new_name) and !empty($new_name))
		{
				$new_name_opt = str_replace ($meta, $values, $new_name);
		}
		else
		{
			$new_name_opt = str_replace ($meta, $values, $wpfid_field);
			
		}
	

echo "<table id=\"wpfid-table\" width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
<tr>
	<td align=\"center\">
		<form id=\"wpfid-form\" method=\"post\" action=\"".plugins_url('fd.php',__FILE__)."\"> 
			<input name=\"pic_url\" type=\"hidden\" value=\"$filelink\" />
			<input name=\"new_name\" type=\"hidden\" value=\"$new_name_opt\" />";
			//<input  id=\"wpfid_button\" class=\"wpfid_button\" type=\"submit\" title=\"". $title."\" value=\"".$title."\" />
echo "<button $btn_style id=\"wpfid_button\" type=\"submit\" title=\"". $title."\" ><span $style class=\"wpfid_title\">$title</span>$image_size</button>
		</form>
	</td>
</tr>
</table>";
}
add_shortcode( 'wpfid' , 'wp_fid_short' );
?>
