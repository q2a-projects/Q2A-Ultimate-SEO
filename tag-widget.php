<?php

class useo_tag_widget {
	
	function allow_template($template)
	{
		return ($template=='tag');
	}

	function allow_region($region)
	{
		return true;
	}
	
	function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
	{
		require_once QA_INCLUDE_DIR.'qa-db-metas.php';
		
		$parts=explode('/', $request);
		$tag=$parts[1];
		
		$description=qa_db_tagmeta_get($tag, 'description');
		if (!(qa_opt('useo_tag_desc_sidebar_html'))) $description=qa_html($description);
		$editurlhtml=qa_path_html('tag-edit/'.$tag);
		
		$allowediting=!qa_user_permit_error('useo_tag_desc_permit_edit');
		
		if (strlen($description)) {
			echo '<SPAN CLASS="entry-content qa-tag-description">';
			echo $description;
			echo '</SPAN>';
			if ($allowediting)
				echo ' - <A HREF="'.$editurlhtml.'">edit</A>';

		} elseif ($allowediting)
			echo '<A HREF="'.$editurlhtml.'">'.qa_lang_html('useo/create_desc_link').'</A>';
	}

}
