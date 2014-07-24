<?php

//	Output this header as early as possible
	header('Content-Type: text/plain; charset=utf-8');


//	Ensure no PHP errors are shown in the Ajax response
	//@ini_set('display_errors', 0);


//	Load the Q2A base file which sets up a bunch of crucial functions
	require_once '../../qa-include/qa-base.php';
	qa_report_process_stage('init_ajax');		

//	Get general Ajax parameters from the POST payload, and clear $_GET
	qa_set_request(qa_post_text('qa_request'), qa_post_text('qa_root'));
	
	require_once QA_INCLUDE_DIR.'qa-app-options.php';
	require_once QA_INCLUDE_DIR.'qa-db-metas.php';
	//require_once QA_INCLUDE_DIR.'qa-page.php';
	//qa_set_template('qa');
	$action = $_POST['action'];
	$data = $_POST['data'];
	$postid = $_POST['postid'];
	if($action=='meta-save'){
		if($data=='{}' or $data=='')
			qa_db_postmeta_clear($postid, 'useo-meta-info');
		else
			qa_db_postmeta_set($postid, 'useo-meta-info', $data);
	}
	elseif($action=='social-save'){
		if($data=='{}' or $data=='')
			qa_db_postmeta_clear($postid, 'useo-social-info');
		else
			qa_db_postmeta_set($postid, 'useo-social-info', $data);
	}
/*
	Omit PHP closing tag to help avoid accidental output
*/