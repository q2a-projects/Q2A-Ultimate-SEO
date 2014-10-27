<?php
	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../');
		exit;
	}

function qa_q_request($questionid, $title)
{
	// URL Clean
	if (qa_opt('useo_url_cleanup')){ //clean url's title
		$words = qa_opt('useo_url_words_list');
		$raw_title = $title;
		// ~~ str_replace method
		//$word_list = explode(',', $words);
		//$title = str_replace($word_list, '', $raw_title);
		
		// ~~preg_replace method with Q2A functions
		require_once QA_INCLUDE_DIR.'qa-util-string.php';
		$word_list = qa_block_words_to_preg($words);
		$title=trim(qa_block_words_replace($title, $word_list , ''));

		if ( (strlen($title)==0) && (qa_opt('useo_url_dont_make_empty')) )
			$title = $raw_title;
	}

	$url = qa_q_request_base($questionid, $title);

	// capitalize letters
	if (qa_opt('useo_url_q_uppercase')){
		$type = qa_opt('useo_url_q_uppercase_type');
		if($type==1){ // first word's first letter
			$parts = explode('/', $url);
			$parts[1] = ucfirst($parts[1]);
			$url = implode('/', $parts);
		}else if($type==2) // all word's first letter
			$url = str_replace(' ', '?', ucwords(str_replace('?', ' ',  str_replace(' ', '/', ucwords(str_replace('/', ' ', str_replace(' ', '-', ucwords( str_replace('-', ' ', strtolower($url)) )) )) ))));
		else // whole words
			$url = strtoupper($url);
	}

    return $url;
}

function qa_tag_html($tag, $microformats=false, $favorited=false)
{
// URL Customization
	$type = qa_opt('useo_url_tag_uppercase_type');
	if($type==1){ // first word's first letter
		$taglink = ucfirst($tag);
	}else if($type==2) // all word's first letter
		$taglink = str_replace(' ', '?', ucwords(str_replace('?', ' ',  str_replace(' ', '/', ucwords(str_replace('/', ' ', str_replace(' ', '-', ucwords( str_replace('-', ' ', strtolower($tag)) )) )) ))));
	else // whole words
		$taglink = strtoupper($tag);
// Tag Description
	global $useo_tag_desc_list;
	require_once QA_INCLUDE_DIR.'qa-util-string.php';
	
	$taglc=qa_strtolower($tag);
	$useo_tag_desc_list[$taglc]=true;
	
	
	return '<a href="'.qa_path_html('tag/'.$taglink).'"'.($microformats ? ' rel="tag"' : '').' class="qa-tag-link'.
		($favorited ? ' qa-tag-favorited' : '').'">'.qa_html($tag).'</a>';
}

function qa_sanitize_html($html, $linksnewwindow=false, $storage=false)
{
	$safe=qa_sanitize_html_base($html, $linksnewwindow, $storage);
	$rel_types = array(1 => 'Nofollow', 2 => 'External', 3 => 'Nofollow External', 4 => '');
	$links_list=json_decode(qa_opt('useo_link_relations'));
	$dom = new DOMDocument;
	$encod  = mb_detect_encoding($safe);
	$dom->loadHTML(mb_convert_encoding($safe, 'HTML-ENTITIES', $encod));
	$links = $dom->getElementsByTagName('a');
	// apply rel change to list of links
	foreach ($links as $link) {
		foreach($links_list as $key=>$value)
		{	
			$site_url=parse_url($value->url);
			// add rel attribute according to host address
			$link_attribute = $link->getAttribute('href');
			if( (isset($site_url['host'])) && (!(empty($site_url['host']))) && (!(empty($link_attribute))) )
				if (strpos( strtolower($link->getAttribute('href')) , strtolower($site_url['host']) ))
					$link->setAttribute('rel', $rel_types[$value->rel]);
		}
	}
	if( qa_opt('useo_links_internal_dofollow') )
	{
		foreach ($links as $link) {
			$site_url=parse_url(qa_opt('site_url'));
			if (strpos( strtolower($link->getAttribute('href')) , strtolower($site_url['host']) ))
				$link->setAttribute('rel', '');
		}
		$safe = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));
	}
	return $safe;
}

function qa_html_convert_urls($html, $newwindow=false)
{
	$host=useo_get_host($html);
    $rel_types = array(1 => 'Nofollow', 2 => 'External', 3 => 'Nofollow External', 4 => '');
	$links_list=json_decode(qa_opt('useo_link_relations'));
	$rel='nofollow';
	if(count($links_list))
		foreach($links_list as $key=>$value)
			if (useo_get_host($value->url) == $host){
				$rel=$rel_types[$value->rel];
			}
	if( qa_opt('useo_links_internal_dofollow') ){
		$host = useo_get_host($html);
		$site_url=parse_url(qa_opt('site_url'));
		if($host==$site_url['host'])
			$rel = 'dofollow';
	}
	return substr(preg_replace('/([^A-Za-z0-9])((http|https|ftp):\/\/([^\s&<>"\'\.])+\.([^\s&<>"\']|&amp;)+)/i', '\1<a href="\2" rel="'. $rel .'"'.($newwindow ? ' target="_blank"' : '').'>\2</a>', ' '.$html.' '), 1, -1);
}

/*
	Omit PHP closing tag to help avoid accidental output
*/
