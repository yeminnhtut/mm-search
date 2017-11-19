<?php
/**
 * @package MM Search
 * @version 1.0
 */
/*
Plugin Name: MM Search
Plugin URI: http://wordpress.org/extend/plugins/mm-search/
Description: Simple search plugin for Myanmar language that works with both unicode and zawgyi
Version: 1.0
Author: Ye Min Htut
Author URI: https://www.facebook.com/iamyeminhtut
License: WTFPL
*/

include( plugin_dir_path( __FILE__ ) . 'Rabbit.php');

define( 'MM_SEARCH_DIR' , plugin_dir_path( __FILE__ ));

define( 'MM_SEARCH_ADMIN_DIR', MM_SEARCH_DIR . '/admin');

define( 'OPTION_WRITTEN_FONT', 'option_written_font');
define( 'OPTION_ZAWGYI', 'Zawgyi');
define( 'OPTION_UNICODE', 'Unicode');

define( 'MM_SEARCH_VERSION', '1.0');

add_action('pre_get_posts','alter_query');

function alter_query($query) {
	//gets the global query var object
	global $wp_query;

	if($query->is_search()) {

		$q = $query->get('s');
		if(get_option(OPTION_WRITTEN_FONT, OPTION_ZAWGYI)==OPTION_ZAWGYI && !isZawgyi($q)) {
			//is unicode
			$q = Rabbit::unicode2zg($q);
			$query->set('s', $q);	
		}else if(get_option(OPTION_WRITTEN_FONT, OPTION_ZAWGYI)==OPTION_UNICODE && isZawgyi($q)){
			//is zawgyi
			$q = Rabbit::zawgyi2uni($q);
			$query->set('s', $q);
		}

		//we remove the actions hooked on the '__after_loop' (post navigation)
		remove_all_actions ( '__after_loop');
	}
}

function isZawgyi($str){
	//The following pattern is from `MyanmarZawgyiConverter.java` of `mmtext` library
	//Credit ::  https://github.com/htoomyintnaung/mmtext
	$pattern = '/[ဳဴၚၠ-႟]|ေ[ႏ႐]|ေ[ျၾ-ႄ]|[^က-အဩျ်ြွ]ေ|[^က-အဩေ]ျ|\s[ေျၾ-ႄ]|^[ေျၾ-ႄ]|္[^က-ဪ]|င္|ြ[ျၾ-ႄ]|ြ[်႐]|ွြ|ုု/u';
	return preg_match_all($pattern, $str);
}

require_once( MM_SEARCH_ADMIN_DIR . '/admin.php');