<?php
/*
   Plugin Name: compatibilidadYoast
   Plugin URI: http://webempresa.com/
   Version: 1.2
   Author: Webempresa - Jhon Marreros
   Description: Este plugin evita el conflicto de SEO by Yoast con Rocksprocket
   Text Domain: compatibilidadYoast
   License: GPLv3
  */



function corregir_conflicto_yoast(){

	if( ! function_exists('is_plugin_active') ) {

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	}

	if( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {

		wp_deregister_script('yoast-seo-polyfill');
		wp_register_script('yoast-seo-polyfill', plugins_url( 'js/compatibilidadscript.js', __FILE__ ), array(), false, true);

	}

}

add_action( 'wp_print_scripts', 'corregir_conflicto_yoast', 100 );
