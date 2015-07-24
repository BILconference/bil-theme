<?php

/*

Modifies the WordPress dashboard for non admin users.

*/

function dashboard_customization() {

    if (!current_user_can('manage_options') ) {

             global $wp_meta_boxes, $wp_admin_bar;

             // Remove dashboard widgets

             unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);

             unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

             unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);

             unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

             // Remove toolbar nodes

             $wp_admin_bar->remove_menu('wp-logo');

             $wp_admin_bar->remove_menu('comments');

             $wp_admin_bar->remove_menu('new-content');

             $wp_admin_bar->remove_menu('site-name');

             // Customize dashboard

             // Remove help menu

             add_filter( 'contextual_help', 'remove_contextual_help', 999, 3 );

             function remove_contextual_help($old_help, $screen_id, $screen){

                        $screen->remove_help_tabs();

                        return $old_help;

             }

             // Remove update notification

             add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );

             // Change footer message

             function change_footer_admin () {

                         return 'BIL Conference';

             }

             add_filter('admin_footer_text', 'change_footer_admin', 9999);

             // Change footer version

             function change_footer_version() {

                         return ' ';

             }

             add_filter( 'update_footer', 'change_footer_version', 9999);

             // add 'Submit Guest Post' menu to adminbar

             $wp_admin_bar->add_menu( array(

             'parent' => false,

             'id' => 'submit-guest-post',

             'title' => __('Submit Guest Post'),

             'href' => '#'

             ));
}

// add custom widget in dashboard

function bil_general_info_widget() {

    echo '<ul>';

    echo '<li>BIL Custom Dashboard Widget</li>';

    echo '</ul>';

}

function add_bil_general_info_widget() {

    wp_add_dashboard_widget( 'bil-general-info', 'General BIL Info','bil_general_info_widget');

}

/* Hook function */

add_action( 'wp_before_admin_bar_render', 'dashboard_customization' );

add_action( 'wp_dashboard_setup', 'add_bil_general_info_widget' );