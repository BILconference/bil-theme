<?php
/*
Author: Cody Marx Bailey & Michael Cummings
URL: http://bilconference.com
*/

if ( ! isset( $content_width ) ) {
  $content_width = 680;
}

// Bones Core
require_once get_template_directory() . '/library/bones.php';

// Customize wp-admin
require_once get_template_directory() . '/library/admin.php';

// Thumbnail settings
require_once get_template_directory() . '/inc/thumbnail.php';

// Comments
require_once get_template_directory() . '/inc/comments.php';

// Fonts
require_once get_template_directory() . '/inc/fonts.php';

// Scripts
require_once get_template_directory() . '/inc/js.php';

// Fonts
require_once get_template_directory() . '/inc/css.php';

?>
