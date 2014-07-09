<?php
        
/*              
    Plugin Name: Q2A Ultimate SEO
    Plugin URI: https://github.com/Towhidn/Q2A-Ultimate-SEO/
    Plugin Update Check URI:  https://github.com/Towhidn/Q2A-Ultimate-SEO/blob/master/q2a-ultimate-seo/qa-plugin.php
    Plugin Description: Question2Answer SEO Plugin
    Plugin Version: 1.0.1
    Plugin Date: 2014-7-9
    Plugin Author: QA-Themes.com
    Plugin Author URI: http://QA-Themes.com
    Plugin License: GPL                           
    Plugin Minimum Question2Answer Version: 1.6
*/                      
                        
    if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
                    header('Location: ../../');
                    exit;   
    }
	define('USEO_DIR', dirname( __FILE__ ));
	define('USEO_VERSION', 1);

	require_once USEO_DIR. '/library/functions.php';
	require_once QA_INCLUDE_DIR.'qa-util-string.php';

    qa_register_plugin_module('page', 'options.php', 'useo_options', 'Ultimate SEO Options');
	
	qa_register_plugin_layer('layer.php', 'Ultimate SEO Layer');

	
	qa_register_plugin_overrides('overrides.php');

	qa_register_plugin_module('page', '/library/scalable-xml-sitemaps.php', 'scalable_xml_sitemaps', 'Scalable XML Sitemaps');
/*                              
    Omit PHP closing tag to help avoid accidental output
*/
