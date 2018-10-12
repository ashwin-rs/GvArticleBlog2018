<?php
defined('ABSPATH') or die("restricted access");
function add_dpopd_options()  
{  
    add_menu_page('Display Page or Post Details', 'Display Page or Post Details', 'administrator','dpopd-list'); 
    add_submenu_page('dpopd-list', 'Shorcode List','Shorcode List','administrator', 'dpopd-list','dpopd_page_or_post_main'); 
	add_submenu_page('dpopd-list', 'Add New','Add New','administrator', 'dpopd-insert','dpopd_insert'); 	
}