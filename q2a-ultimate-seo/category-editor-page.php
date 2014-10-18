<?php

class useo_category_editor_page {
	
	function match_request($request)
	{
		$parts=explode('/', $request);
		
		return $parts[0]=='category-edit';
	}
	
	function process_request($request)
	{
		$parts=explode('/', $request);
		$categoryid=$parts[1];
		
		$fullcategory=qa_db_select_with_pending(qa_db_full_category_selectspec($categoryid, true));
				
		$slugs = explode('/', $fullcategory['backpath']);
		$new_request = implode('/', array_reverse($slugs));
		
		
		$qa_content=qa_content_prepare();			
		$qa_content['title']=qa_lang_html_sub('useo/edit_desc_for_x', qa_html($fullcategory['title']));
		
		if (qa_user_permit_error('useo_cat_desc_permit_edit')) {
			$qa_content['error']=qa_lang_html('users/no_permission');
			return $qa_content;
		}

		require_once QA_INCLUDE_DIR.'qa-db-metas.php';
		if (qa_clicked('dosave')) {
			require_once QA_INCLUDE_DIR.'qa-util-string.php';
			
			qa_db_categorymeta_set($categoryid, 'useo_cat_title', qa_post_text('useo_cat_title'));
			qa_db_categorymeta_set($categoryid, 'useo_cat_description', qa_post_text('useo_cat_description'));
			qa_redirect($new_request);
		}

		$qa_content['form']=array(
			'tags' => 'METHOD="POST" ACTION="'.qa_self_html().'"',
			
			'style' => 'tall', // could be 'wide'
			
			
			'fields' => array(		
				array(
					'label' => 'Link Title:',
					'type' => 'text',
					'rows' => 2,
					'tags' => 'NAME="useo_cat_title" ID="useo_cat_title"',
					'value' => qa_html(qa_db_categorymeta_get($categoryid, 'useo_cat_title')),
				),
				array(
					'label' => 'Description:',
					'type' => 'text',
					'rows' => 4,
					'tags' => 'NAME="useo_cat_description" ID="useo_cat_description"',
					'value' => qa_html(qa_db_categorymeta_get($categoryid, 'useo_cat_description')),
				),
			),			
			'buttons' => array(
				array(
					'tags' => 'NAME="dosave"',
					'label' => qa_lang_html('useo/save_desc_button'),
				),
			),			
		);
		
		$qa_content['focusid']='tagtitle';

		return $qa_content;
	}
	
}