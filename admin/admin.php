<?php

	//include about menu function
	require_once(MM_SEARCH_ADMIN_DIR . '/about.php');
	//include settings menu function
	require_once(MM_SEARCH_ADMIN_DIR . '/settings.php');

	add_action('admin_menu', 'mm_search_admin_menu');

	function mm_search_admin_menu() {

		$page_title = 'MM Search Settings';
		$menu_title = 'MM Search Settings';
		$capability = 'manage_options';
		$menu_slug  = 'mm-search-settings';
		$function   = 'mm_search_settings';
		$icon_url   = 'dashicons-search';
		$position   = 999;

		add_menu_page($page_title,
		             $menu_title, 
		             $capability, 
		             $menu_slug, 
		             $function, 
		             $icon_url, 
		             $position );

		add_submenu_page('mm-search-settings', 'About MM Search', 'About MM Search', 'manage_options', 'mm-search-about', 'mm_search_about_page');
	}

	
	