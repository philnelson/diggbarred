<?php
/*
Plugin Name: Diggbarred
Author: Phil Nelson
Author URI: http://extrafuture.com/
Version: 1.02
Description: Blocks all traffic from Digg from viewing your content, replacing it with a message to users. Idea and DiggBar code taken entirely from http://daringfireball.net/2009/04/how_to_block_the_diggbar
Plugin URI: http://extrafuture.com/projects/diggbarred

*/

add_option("diggbarred_version", "1.02");
add_option("diggbarred_message", "Dear Digg, Go fuck yourself.");

add_action('init', 'diggbarred_do_the_shit');

function diggbarred_do_the_shit() 
{
	
	if(preg_match('#http://digg.com/\w{1,8}/*(\?.*)?$#', $_SERVER['HTTP_REFERER'])) 
	{
	    echo get_option('diggbarred_message');
	    exit;
	}
	
}

?>