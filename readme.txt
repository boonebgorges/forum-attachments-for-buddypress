=== Plugin Name ===
Contributors: _ck_, boonebgorges, cuny-academic-commons
Tags: buddypress, bbpress, forums, attachments
Requires at least: WPMU 2.9, BP 1.2
Tested up to: WPMU 2.9.2, BP 1.2.2.1
Stable tag: trunk

Gives members the ability to upload attachments on their forum posts in BuddyPress.

== Description ==

Gives members the ability to upload attachments on their posts.

It's a port of a plugin originally created for bbPress by _ck_. See the original plugin page here: http://bbpress.org/plugins/topic/bb-attachments/.  _ck_ is not supporting this plugin anymore. Insofar as the code works, it is thanks to her; insofar as it does not, it is my fault.http://teleogistic.net/code/buddypress/forum-attachments-for-buddypress

Many thanks to slaFFik for his work on localizing this plugin!

== Installation ==

* Upload to plugin directory and activate
* If you'd like to change the default settings (as described in step 5 here http://bbpress.org/plugins/topic/bb-attachments/installation/), you may do so by editing forum-attachments-for-buddypress-bp-functions.php
* I use a JavaScript trick to make uploads possible. If you are confident that most of your users will have JS enabled, you do not need to do anything else.
* If you want to make uploads possible for users with JS turned off, you will need to alter the `<form>` tags on your theme's forum files: groups/single/forum/topic.php and groups/single/forum.php. Change `<form action="" method="post" id="forum-topic-form" class="standard-form">` to `<form action="" method="post" id="forum-topic-form" class="standard-form" enctype="multipart/form-data">`

== Changelog ==

= 0.1 =
* Initial release

= 0.2 =
* BuddyPress 1.2 compatible
* Removed the need for custom hooks
* Enabled inline images
* Improved download process to avoid header conflicts