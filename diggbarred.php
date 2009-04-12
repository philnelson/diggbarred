<?php
/*
Plugin Name: Diggbarred
Author: Phil Nelson
Author URI: http://extrafuture.com/
Version: 1.51
Description: Blocks all traffic from Digg from viewing your content, replacing it with a message to users. Idea and DiggBar blocking regex taken  from <a href="http://daringfireball.net/2009/04/how_to_block_the_diggbar" title="Daring Fireball: How to Block the DiggBar">Daring Fireball</a>.
Plugin URI: http://extrafuture.com/projects/diggbarred

*/

add_option("diggbarred_version", "1.51");
add_option("diggbarred_message", 'Dear Digg, Go fuck yourself.');
add_option("diggbarred_style","width: 30%; line-height: 17px; text-align: justify; margin: 20% auto 0 auto; font-family: verdana, sans-serif; font-size: 13px;");

add_action('init', 'diggbarred_do_the_shit');

function diggbarred_do_the_shit() 
{
	
	if(preg_match('#http://digg.com/\w{1,8}/*(\?.*)?$#', $_SERVER['HTTP_REFERER'])) 
	{
	    echo '<div style="'.get_option('diggbarred_style').'"><p>' . get_option('diggbarred_message') . '</p></div>';
	    exit;
	}
	
}

// Thanks to http://wpengineer.com/how-to-improve-wordpress-plugins/ for instructions on adding the Settings link

function diggbarred_plugin_actions($links, $file)
{
	static $this_plugin;
 
	if( !$this_plugin ) $this_plugin = plugin_basename(__FILE__);
 
	if( $file == $this_plugin )
	{
		$settings_link = '<a href="index.php?page=diggbarred/diggbarred-options.php">' . __('Settings') . '</a>';
		$links = array_merge( array($settings_link), $links); // before other links
	}
	return $links;
}

function diggbarred_settings()
{
	require_once('diggbarred-options.php');
}

function diggbarred_admin_panel()
{
	add_options_page('Diggbarred Options', 'Diggbarred', 8, 'diggbarred/diggbarred-options.php', 'diggbarred_settings');
	if ( current_user_can('edit_posts') && function_exists('add_submenu_page') ) {
		add_filter( 'plugin_action_links', 'diggbarred_plugin_actions', 10, 2 );
	}
}

if(is_admin()) 
{
	add_action('admin_menu', 'diggbarred_admin_panel');
}

?>