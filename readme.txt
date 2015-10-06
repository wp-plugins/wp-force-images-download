=== WP-Force Images Download === 
Donate link:https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=TNFBA9JHH6854&lc=US&item_name=Nazakat%20Ali&currency_code=USD&bn=PP%2dDonationsBF%3alogo11w%2epng%3aNonHosted
Tags: image, download, force, browser force, free, pictures, post thumbnail,featured image,download images,force download,download link,generate,button,shortcode button, shortcode force download, templatetag force download, pictures download button, rename images on download, on the fly rename, pictures download button, force images download, generate download button
Requires at least: 3.0
Tested up to: 4.2.3
Stable tag: 1.5
Version : 1.5
License: GPLv2

A simple plugin that force the download of images or pictures such as jpeg,png etc.

== Description ==
= New Features: =
Now you can rename images when downloaded.There two ways to rename.

= 1. Using Shortcode =
* `[wpfid new_name="new-name-of-file"]`
* You can use variables also like this
  * `[wpfid new_name="%post_id%"]` 
  * `[wpfid new_name="%filename%_%rand%"]` , etc.
= Note : = You have to specify name only **without file extension**.

* If you have still any confusion__post your question, Thanks.

= 2. Bulk Rename Images =
Goto `settings >> Wp-Force Images Download` page and set your desired combination to rename images. e.g.`%filename%-%rand%`

* Default value:`none`
* Note: These variables will be replaced with their corresponding values.You can use any  combination.e.g. `%site_name%_%filename%-%post_id%`.
* This option will not rename original files. If you set new name in shortcode for individual images, the name in shortcode will be preferred.
* `%site_name%:` Replaced with the site title. `Goto Settings >> General >> [Site Title]` to change this value.
* `%post_title%:` Replaced with the current **post title**
* `%timestamp%:` Replaced with the current time in **unix timestamp format**
* `%post_id%:` Replaced with the current **post id**
* `%rand%:` Replaced with the 5-digit random number between **0 to 100000 e.g. 82469**
* `%md5%:` Replaced with the **md5 hash** of orginal filename
* `%filename%:` Replaced with the **orginal filename**

= Now you can set your own custom download link in shortcode. = e.g.
`[wpfid link="http://link-to/your/image.jpg"]`

This is a simple plugin that allows you to force the download of images or pictures such as jpeg,png etc.
This plugin is very useful to those who want to download post attachment or featured image. Just put the template tag in single.php and this plugin automatically generates the download link for every post.
= Note: =The post must have featured image because this plugin generates download link of attached featured image of every post , if the post(s) have not featured image the download button would not appear. *While using shortcode you can set your own link*

= How To Use: =
You can use this plugin in two ways i.e. by using template tag or by using shortcode.

= 1-By Using Template Tag =
You have to put the template tag in your single.php file of your theme, where you want to appear the download button.
= There are three ways to use template tag =

1. `<?php wp_fid();?>` This is simple form with default settings.
2. `<?php wp_fid("Some Text");?>` This will allow you to set custom text to appear on download button. Default is *Download*
3. `<?php wp_fid("Some Text","green");?>` This will allow you to set custom text along with custom color **(e.g. pink,green,yellow,purple,#ffcc66,#cccccc,#f80, rgb(255,56,35) etc)**. Default color is `grey`

* Second function allows you to set custom text for download button.e.g.
 `<?php wp_fid("Image Download");?>`
* For more details you can ask question in support section.
* The default **title text** is **Download** and *default color* is `grey`.
* Note:If Featured Image is not set for post the download button would not appear on page.

= 2-By Using Shortcode =
You have to put shortcode in the post content, while writing post.<br>
There are four ways to use SHORTCODE..

1. `[wpfid]` This is simple form with default settings.
2. `[wpfid title="some text"]` This will allow you to set custom text to appear on download button. Default is "Download"
3. `[wpfid title="some text" color="green"]` This will allow you to set custom text along with custom color. Default color is "grey"
4. `[wpfid title="some text" color="green" link="http://link-to/your/image.jpg"]` This will allow you to set *custom text*, *custom color*, and **custom download link**.
= Note: = You can use attributes in the way you want.
== Installation ==

Upload the **WP-Force Images Download** plugin to your blog, Activate it, and you're done!

You have to put this code in theme file.

`<?php wp_fid();?>`

or use shortcode.

`[wpfid]`
== Frequently Asked Questions == 
No questions yet
== FAQ ==
You can Set Custom Color in three ways:

* You can use **color names** e.g. `(pink,green,yellow,purple, etc)`
* You can use **HEX** e.g. `(#33ff66, #666666, #ff7700, etc)`
* You can use **RGB** e.g. `( rgb(255, 255, 255),rgb(24, 45, 68), etc)`
* *Feel Free To Ask Questions*
== Screenshots ==
1. Buttons in different colors

2. New button styles

== Changelog ==

= 1.5 =
* bulk rename
  * added new variables `%rand%,%md5%,%filename%`
  * now you can use more than one variables
  * now you can use also these variables in shortcode .e.g `[wpfid new_name="%post_id%_%filename%"]`
* button themeing and styles
  * new button style with 8 different color schemes
  * added option to show file size on download button
  * added option to show file size on download-icon on button
  * added option to easily customize appearence of button
* security increased
* performance increased i.e. code is shortend to increase speed
* added more clear documentation on every function

= 1.4 =
* shortcode suppport to rename images individually
* option to set bulk new name for images in options page
* added options page in admin

= 1.3.1 =
* minor enhancements in code

= 1.3 =
* added more image types i.e mime-types
* security increased
* Tested in 4.2.2

= 1.2.1 =
* enhancement in code

= 1.2 =

* added support for custom link in shortcode
* more enhancements

= 1.1.1 =

* little issues solved
* styling issues solved

= 1.1.0 =

* styling and colors
* shortcode support

= 1.0.0 =

* basic release

