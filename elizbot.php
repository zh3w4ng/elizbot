<?php
/*
Plugin Name: Elizbot
Plugin Script: Elizbot.php
Plugin URI: 
Description: Add this Elizbot to your wordpress site. Use the simple shortcode [elizbot-chat] to embed the chatbot in your site and amuse your readers all day long. For more information look under Settings Mneu>>Elizbot
Version: 0.1
Author: Zhe Wang

License: GPLv3 */
/* Copyright 2017 Zhe Wang (email : zh3w4ng@gmail.com)
This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.  If not, see <http://www.gnu.org/licenses/>. */
define("ELIZBOT_PLUGIN_DIR", __file__);
define("ELIZBOT_PLUGIN_BASE", dirname(__file__));
define("ELIZBOT_PLUGIN_URL", plugin_dir_url(ELIZBOT_PLUGIN_DIR));

define("ELIZBOT_PLUGIN_JS_DIR", ELIZBOT_PLUGIN_URL."js/");
define("ELIZBOT_PLUGIN_LIB_DIR", ELIZBOT_PLUGIN_BASE . "/lib/");
define("ELIZBOT_PLUGIN_CSS_DIR", ELIZBOT_PLUGIN_URL . "styles/");
define("ELIZBOT_CONVERSATION", "ELIZBOT_CONVERSATION");
define("ELIZBOT_ID", "ELIZBOT_ID");

include_once(ELIZBOT_PLUGIN_LIB_DIR . 'elizbot_functions.php');

add_action('init', 'register_elizbot_shortcodes');
add_action('admin_menu', 'elizbot_admin_menu');
add_action('wp_enqueue_scripts', 'elizbot_loadScripts');
add_action('init', 'elizbot_convo_id_init');

function elizbot_convo_id_init(){
  define("ELIZBOTID", elizbot_create_convo_id());
}
?>
