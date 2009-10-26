=== Plugin Name ===
Contributors: _ck_, boonebgorges, cuny-academic-commons
Tags: buddypress, bbpress, forums, attachments
Requires at least: WPMU 2.8, BP 1.1
Tested up to: WPMU 2.8.4a, BP 1.1.1
Stable tag: trunk

Gives members the ability to upload attachments on their posts.

== Description ==

Gives members the ability to upload attachments on their posts.

This plugin was originally created for bbPress by _ck_. See the original plugin page here: http://bbpress.org/plugins/topic/bb-attachments/. Ported to BuddyPress 1.1 by boonebgorges. Please do not go to _ck_ for support, as this port to BP has nothing to do with her! Direct compliments only to _ck_ (95% of the code is hers), complaints to boonebgorges (who probably screwed some stuff up!) http://teleogistic.net/2009/10/help-me-alpha-test-buddypress-forum-attachments/. 

Many thanks to slaFFik for his work on localizing this plugin!

== Installation ==

Warning: If you find these instructions illegible on the wordpress.com plugins website,  please download the plugin and read the readme.txt file or visit http://teleogistic.net/2009/10/help-me-alpha-test-buddypress-forum-attachments/ for installation instructions.

* Place the `forum-attachments-for-buddypress` directory into to your WPMU plugin directory. Activate the plugin.
* In your BP theme directory, go to `groups/single/forum/topic.php`. On line 9, after the "template_notices" hook, add `<?php do_action( 'topic_page_load' ) ?>`
* After line 61 in the same file, which reads `<?php bp_the_topic_post_content() ?>` insert the following line `<?php do_action( 'bp_after_post_content' ); ?>`
* On line 26 in the same file, replace `<form action="<?php bp_forum_topic_action() ?>" method="post" id="forum-topic-form" class="standard-form">` with `<form action="<?php bp_forum_topic_action() ?>" method="post" id="forum-topic-form" class="standard-form" enctype="multipart/form-data">`
* In the same theme directory, open edit.php and index.php. Find the `<form>` tags, as described in the last part of the previous step, and replace them with the alternative `<form>` tag given above (with the enctype specified)
* Follow steps 1 and 2 on http://bbpress.org/plugins/topic/bb-attachments/installation/. Step 5 on that page (the "optional settings") you can do as well, and those settings might take some tweaking for certain filetypes to be allowed.



== Changelog ==

= 0.1 =
* Initial release