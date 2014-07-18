<?php
        
/*              
    Plugin Name: Q2A Ultimate SEO
    Plugin URI: https://github.com/Towhidn/Q2A-Ultimate-SEO/
    Plugin Update Check URI:  https://github.com/Towhidn/Q2A-SEO-Links/blob/master/q2a-seo-links/qa-plugin.php
    Plugin Description: SEO Links for Question2Answer
    Plugin Version: 1.2
    Plugin Date: 2014-24-1
    Plugin Author: QA-Themes.com
    Plugin Author URI: http://QA-Themes.com
    Plugin License: copy lifted                           
    Plugin Minimum Question2Answer Version: 1.5
*/                      
                        
    if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
                    header('Location: ../../');
                    exit;   
    }
	define('USEO_DIR', dirname( __FILE__ ));
	define('USEO_URL', useo_get_base_url().'/qa-plugin/q2a-ultimate-seo');
	define('USEO_VERSION', 1);

	require_once USEO_DIR. '/library/functions.php';
	require_once QA_INCLUDE_DIR.'qa-util-string.php';

    qa_register_plugin_module('page', 'options.php', 'useo_options', 'Ultimate SEO Options');
	
	qa_register_plugin_layer('layer.php', 'Ultimate SEO Layer');

	
	qa_register_plugin_overrides('overrides.php');

	qa_register_plugin_module('page', '/library/scalable-xml-sitemaps.php', 'scalable_xml_sitemaps', 'Scalable XML Sitemaps');
	
	
function useo_get_base_url()
{
	/* First we need to get the protocol the website is using */
	$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https://' : 'http://';

	/* returns /myproject/index.php */
	if(QA_URL_FORMAT_NEAT == 0 || strpos($_SERVER['PHP_SELF'],'/index.php/') !== false):
		$path = strstr($_SERVER['PHP_SELF'], '/index', true);
		$directory = $path;
	else:
		$path = $_SERVER['PHP_SELF'];
		$path_parts = pathinfo($path);
		$directory = $path_parts['dirname'];
		$directory = ($directory == "/") ? "" : $directory;
	endif;       
		
		$directory = ($directory == "\\") ? "" : $directory;
		
	/* Returns localhost OR mysite.com */
	$host = $_SERVER['HTTP_HOST'];

	return $protocol . $host . $directory;
}
/*                              
    Omit PHP closing tag to help avoid accidental output
*/
