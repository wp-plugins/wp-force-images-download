=== WP-Force Images Download === 
Tags: image, download, force, browser force, free, pictures, post thumbnail,featured-image,download-images,force,download link,generate,button,shortcode buton
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 1.2
Version : 1.2
License: GPLv2

A simple plugin that force the download of images or pictures such as jpeg,png etc.

== Description ==

This is a simple plugin that allows you to force the download of images or pictures such as jpeg,png etc. <br>
This plugin is very useful to those who want to download post attachment or featured image. Just put the template tag in single.php and this plugin automatically generates the download link for every post.<br>
=Note:=The post must have featured image because this plugin generates download link of attached featured image of every post , if the post(s) have not featured image the download button would not appear.<br>

===How To Use:===
You can use this plugin in two ways i.e. by using template tag or by using shortcode.

===1-By Using Template Tag===
You have to put the template tag in your single.php file of your theme, where you want to appear the download button.<br>
There are three ways to use template tag..
1.  `<?php wp_fid();?>` This is simple form with default settings.
2.  `<?php wp_fid("Some Text");?>` This will allow you to set custom text to appear on download button. Default is "Download"
3.  `<?php wp_fid("Some Text","green");?>` This will allow you to set custom text along with with custom color =(e.g. pink,green,yellow,purple,#ffcc66,#cccccc,#f80, rgb(255,56,35) etc)=. Default color is `grey`
*Second function allows you to set custom text for download button.e.g.<br> `<?php wp_fid("Image Download");?>`
*For more details you can ask question in support section.
*The default =title text= is =Download= and =default color= is `grey`.
*Note:If Featured Image is not set for post the download button would not appear on page.

=2-By Using Shortcode=<br>
You have to put shortcode in the post content, while writing post.<br>
There are also three ways to use SHORTCODE..
1.  `[wpfid]` This is simple form with default settings.
2.  `[wpfid title="some text"]` This will allow you to set custom text to appear on download button. Default is "Download"
3.  `[wpfid title="some text" color="green"]` This will allow you to set custom text along with with custom color. Default color is "grey"
== Installation ==

Upload the =WP-Force Images Download= plugin to your blog, Activate it, and you're done!

You have to put this code in theme file.<br>
`<?php wp_fid();?>`<br>
or use shortcode.<br>
`[wpfid]`
== Frequently Asked Questions == 
No questions yet
== FAQ ==
You can Set Custom Color in three forms:
*You can you color names e.g. (pink,green,yellow,purple, etc)
*You can you =HEX= e.g. (#33ff66, #666666, #ff7700, etc)
*You can you =RGB= e.g. ( rgb(255, 255, 255),(24, 45, 68), etc)
=Feel Free To Ask Questions=

(e.g. pink,green,yellow,purple,#ffcc66,#cccccc,#f80, rgb(255,56,35)
== Screenshots ==
1- Buttons in different colors

== Changelog ==
=1.2=
*added support for custom link in shortcode
*more enhancements

=1.1.1=
*little issues solved
*styling issues solved

=1.1.0=
*styling and colors
*shortcode support

=1.0.0=
basic release

