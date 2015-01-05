=== WP-Force Images Download === 
Tags: image, download, force, browser force, free, pictures, post thumbnail
Tested up to: 4.0
Version : 1.1.0
License: GPLv2

A simple plugin that force the download of images or pictures such as jpeg,png etc.

== Description ==

A simple plugin that force the download of images or pictures such as jpeg,png etc. 
This plugin is very useful to those who want to download post attachment or featured image. Just put the template tag in single.php and this plugin automatically generates the download link for every post.
Note:The post must have featured image becuase this plugin generates download link of attached featured image of every post.

<h2>HOW TO USE:</h2><br>
1-WITH TEMPLATE TAG<br>
Just put the template tag in single.php file where you want to appear the download button.Put this line of code in your single.php.<br>
Three ways to implement..<br>
1).  wp_fid(); simple with default settings.<br>
2).  wp_fid("Some Text"); custom text to appear on download button<br>
3).  wp_fid("Some Text","green"); custom text also with custom color<br>
Second function allows you to set custom text for download button.e.g. wp_fid("Image Download");
The default is [Download] and default color is 'grey'.<br>
Note:If Featured Image is not set for post the download button do not appear on page.<br>

2-WITH SHORTCODE<br>
Now you can use shortcode.<br>
Three ways to implement..<br>
1).  [wpfid] simple with default settings.<br>
2).  [wpfid title="some text"] custom text to appear on download button<br>
3).  [wpfid title="some text" color="green"] custom text also with custom color<br>
== Installation ==

Upload the WP-Force Images Download plugin to your blog, Activate it, and you're done!

You have to put this code in single-{post} file.<br>
<b>wp_fid();</b>
== FAQ ==
No questions yet
== Changelog ==
1.1.0
styling and colors
shortcode support


1.0.0
basic release
#plugin-title {
  background-image: url(http://plugins.svn.wordpress.org/wp-force-images-download/assets/wp-force-images-download-772x250.jpg);
}

