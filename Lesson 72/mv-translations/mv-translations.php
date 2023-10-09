<?php

/**
* Plugin Name: MV Translations
* Plugin URI: https://www.wordpress.org/mv-translations
* Description: My plugin's description
* Version: 1.0
* Requires at least: 5.6
* Requires PHP: 7.0
* Author: Marcelo Vieira
* Author URI: https://www.codigowp.net
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: mv-translations
* Domain Path: /languages
*/
/*
MV Translations is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
MV Translations is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with MV Translations. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( !class_exists( 'MV_Translations' )){

	class MV_Translations{

		public function __construct(){

			$this->define_constants(); 
            			
		}

		public function define_constants(){
            // Path/URL to root of this plugin, with trailing slash.
			define ( 'MV_TRANSLATIONS_PATH', plugin_dir_path( __FILE__ ) );
            define ( 'MV_TRANSLATIONS_URL', plugin_dir_url( __FILE__ ) );
            define ( 'MV_TRANSLATIONS_VERSION', '1.0.0' );
		}

        /**
         * Activate the plugin
         */
        public static function activate(){
            update_option('rewrite_rules', '' );

        }

        /**
         * Deactivate the plugin
         */
        public static function deactivate(){
            flush_rewrite_rules();
        }        

        /**
         * Uninstall the plugin
         */
        public static function uninstall(){

        }       

	}
}

// Plugin Instantiation
if (class_exists( 'MV_Translations' )){

    // Installation and uninstallation hooks
    register_activation_hook( __FILE__, array( 'MV_Translations', 'activate'));
    register_deactivation_hook( __FILE__, array( 'MV_Translations', 'deactivate'));
    register_uninstall_hook( __FILE__, array( 'MV_Translations', 'uninstall' ) );

    // Instatiate the plugin class
    $mv_translations = new MV_Translations(); 
}