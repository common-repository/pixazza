<?php

/*
Plugin Name: Pixazza
Plugin URI: http://www.pivari.com/wordpress-plugins/pixazza-wp-plugin/
Description: A simple Plugin to add Pixazza code on your pages.
Version: 1.0.0
Author: Fabrizio Pivari
Author URI: http://www.pivari.com
 */
/*  Copyright 2012 Fabrizio Pivari  (email : fabrizio@pivari.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

$pixazzaversion="1.0.0";

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_pixazza() {
	add_option('pixazzaid', 'You site Pixazza ID');
}

function deactive_pixazza() {
  delete_option('pixazzaid');
}

function admin_init_pixazza() {
  register_setting('pixazza', 'pixazzaid');
}

function admin_menu_pixazza() {
  add_options_page('Pixazza', 'Pixazza', 8, 'pixazza', 'options_page_pixazza');
}

function options_page_pixazza() {
  include(WP_PLUGIN_DIR.'/pixazza/options.php');  
}

function pixazza() {
  global $pixazzaversion;
  $pixazzaid = get_option('pixazzaid');
  echo "\n".'<!-- Pixazza plugin v. '.$pixazzaversion.' (Begin) -->'."\n" ;
  echo '<script type="text/javascript" src="http://www.luminate.com/widget/'. $pixazzaid . '/"></script>'."\n" ;
#  $options='<script type="text/javascript">' . $adtrigger . 'picadService.initialize();</script>'."\n";
  echo $options;
  echo '<!-- Pixazza plugin v. '.$pixazzaversion.' (End) -->'."\n" ;

}

function pixazza_settings( $links ) {
	$settings_link = '<a href="options-general.php?page=pixazza">'.__('Settings').'</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

function pixazza_plugin_settings($links, $file) {
	if ( $file == basename( dirname( __FILE__ ) ).'/'.basename( __FILE__ ) ) {
		$links[] = '<a href="options-general.php?page=pixazza">' . __('Settings') . '</a>';
		$links[] = '<a href="http://www.pivari.com/contatta-pivari/">' . __('Support') . '</a>';
	}
	return $links;
}

register_activation_hook(__FILE__, 'activate_pixazza');
register_deactivation_hook(__FILE__, 'deactive_pixazza');
add_action('admin_init', 'admin_init_pixazza');
add_action('admin_menu', 'admin_menu_pixazza');
add_action( 'plugin_action_links_'.basename( dirname( __FILE__ ) ).'/'.basename( __FILE__ ), 'pixazza_settings', 10, 4 );
add_filter( 'plugin_row_meta', 'pixazza_plugin_settings', 10, 2 );
add_action('wp_footer', 'pixazza');


?>
