=== WP-Force Images Download === 
Tags: image, download, force, browser force, free, pictures, post thumbnail
Tested up to: 4.0
License: GPLv2

A simple plugin that force the download of images or pictures such as jpeg,png etc.

== Description ==

A simple plugin that force the download of images or pictures such as jpeg,png etc. 
This plugin is very useful to those who want to download post attachment or featured image. Just put the template tag in single.php and this plugin automatically generates the download link for every post.
Note:The post must have featured image becuase this plugin generates download link of attached featured image of every post.

<h2>HOW TO USE:<h2>
Just put the template tag in single.php file where you want to appear the download button.Put this line of code in your single.php.
Usage:<br>
1).  <b>wp_fid();</b><br>
2).  <b>wp_fid("Some Text");</b>
Second function allows you to set custom text for download button.e.g. wp_fid("Image Download");
The default is [Download].
If Featured Image is not set for post the download button do not appear on page.
== Installation ==

Upload the WP-Force Images Download plugin to your blog, Activate it, and you're done!

You have to put this code in single-{post} file.<br>
<b>wp_fid();</b>
