=== WP-Force Images Download === 
Tags: image, download, force, browser force, free, pictures, post thumbnail,featured-image,download-images,force,download link,generate,button,shortcode buton
Tested up to: 4.1
Version : 1.1.1
License: GPLv2

A simple plugin that force the download of images or pictures such as jpeg,png etc.

== Description ==

This is a simple plugin that allows you to force the download of images or pictures such as jpeg,png etc. <br>
This plugin is very useful to those who want to download post attachment or featured image. Just put the template tag in single.php and this plugin automatically generates the download link for every post.<br>
<strong>Note:</strong>The post must have featured image because this plugin generates download link of attached featured image of every post , if the post(s) have not featured image the download button would not appear.<br>

<strong>HOW TO USE:</strong><br>
You can use this plugin in two ways i.e. by using template tag or by using shortcode.<br>
<strong>1-By Using Template Tag</strong><br>
You have to put the template tag in your single.php file of your theme, where you want to appear the download button.<br>
There are three ways to use template tag..<br>
1).  `<?php wp_fid();?>` This is simple form with default settings.<br>
2).  `<?php wp_fid("Some Text");?>` This will allow you to set custom text to appear on download button. Default is "Download"<br>
3).  `<?php wp_fid("Some Text","green");?>` This will allow you to set custom text along with with custom color<strong>(e.g. pink,green,yellow,purple,black,white,etc)</strong>. Default color is "grey"<br>
Second function allows you to set custom text for download button.e.g.<br> `<?php wp_fid("Image Download");?>`<br>
For more details you can ask question in support section.<br>
The default <strong>title text</strong> is <strong>Download</strong> and <strong>default color</strong> is <strong>grey</strong>.<br>
<strong>Note:</strong>If Featured Image is not set for post the download button would not appear on page.<br>

<strong>2-By Using SHORTCODE</strong><br>
You have to put shortcode in the post content, while writing post.<br>
There are also three ways to use SHORTCODE..<br>
1).  `[wpfid]` This is simple form with default settings.<br>
2).  `[wpfid title="some text"]` This will allow you to set custom text to appear on download button. Default is "Download"<br>
3).  `[wpfid title="some text" color="green"]` This will allow you to set custom text along with with custom color. Default color is "grey"<br>
== Installation ==

Upload the <strong>WP-Force Images Download</strong> plugin to your blog, Activate it, and you're done!

You have to put this code in theme file.<br>
`<?php wp_fid();?>`<br>
or use shortcode.<br>
`[wpfid]`
== FAQ ==
No questions yet
== Screenshots ==

== Changelog ==
<strong>1.1.1</strong><br>
little issues solved
styling issues solved

<strong>1.1.0</strong><br>
styling and colors
shortcode support


<strong>1.0.0</b><br>
basic release

