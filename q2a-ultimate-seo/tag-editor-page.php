<?php

class useo_tag_editor_page {
	
	function match_request($request)
	{
		$parts=explode('/', $request);
		
		return $parts[0]=='tag-edit';
	}
	
	function process_request($request)
	{
		$parts=explode('/', $request);
		$tag=$parts[1];
		
		$qa_content=qa_content_prepare();			
		$qa_content['title']=qa_lang_html_sub('useo/edit_desc_for_x', qa_html($tag));
		
		if (qa_user_permit_error('useo_tag_desc_permit_edit')) {
			$qa_content['error']=qa_lang_html('users/no_permission');
			return $qa_content;
		}

		require_once QA_INCLUDE_DIR.'qa-db-metas.php';
		
		if (qa_clicked('dosave')) {
			require_once QA_INCLUDE_DIR.'qa-util-string.php';
			
			$taglc=qa_strtolower($tag);
			qa_db_tagmeta_set($taglc, 'title', qa_post_text('tagtitle'));
			qa_db_tagmeta_set($taglc, 'description', qa_post_text('tagdesc'));
			qa_db_tagmeta_set($taglc, 'icon', qa_post_text('tagicon'));
			qa_redirect('tag/'.$tag);
		}

		$qa_content['form']=array(
			'tags' => 'METHOD="POST" ACTION="'.qa_self_html().'"',
			
			'style' => 'tall', // could be 'wide'
			
			
			'fields' => array(		
				array(
					'label' => 'Title:',
					'type' => 'text',
					'rows' => 2,
					'tags' => 'NAME="tagtitle" ID="tagtitle"',
					'value' => qa_html(qa_db_tagmeta_get($tag, 'title')),
				),
				array(
					'label' => 'Description:',
					'type' => 'text',
					'rows' => 4,
					'tags' => 'NAME="tagdesc" ID="tagdesc"',
					'value' => qa_html(qa_db_tagmeta_get($tag, 'description')),
				),
				array(
					'label' => 'Icon image:',
					'type' => 'text',
					'rows' => 1,
					'tags' => 'NAME="tagicon" ID="tagicon"',
					'value' => qa_html(qa_db_tagmeta_get($tag, 'icon')),
				),
			),			
			'buttons' => array(
				array(
					'tags' => 'NAME="dosave"',
					'label' => qa_lang_html('useo/save_desc_button'),
				),
			),			
		);
		
		$qa_content['focusid']='tagdesc';

		return $qa_content;
	}
	
}