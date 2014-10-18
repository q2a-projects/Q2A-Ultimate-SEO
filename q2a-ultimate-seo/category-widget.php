<?php

class useo_category_widget {
	
	function allow_template($template)
	{
		if ($template=='qa' or $template=='category' or $template=='unanswered' or $template=='questions');
		return true;
	}

	function allow_region($region)
	{
		return true;
	}
	
	function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
	{
		/*
		$requestparts=qa_request_parts();
		$requestlower=strtolower(qa_request());
		$firstlower=strtolower($requestparts[0]);
		$routing=qa_page_routing();
		// unanswered & questions pages may contain categories.
		unset($routing['activity/']);
		unset($routing['unanswered/']);
		unset($routing['questions/']);
		if ( (isset($routing[$requestlower])) or (isset($routing[$firstlower.'/'])) or (is_numeric($requestparts[0])) )
			return;
			
		$explicitqa=(strtolower($requestparts[0])=='qa' or strtolower($requestparts[0])=='unanswered' or strtolower($requestparts[0])=='questions' or strtolower($requestparts[0])=='activity');
		
		if ($explicitqa)
			$slugs=array_slice($requestparts, 1);
		elseif (strlen($requestparts[0]))
			$slugs=$requestparts;
		else
			$slugs=array();
		*/
		
		$slugs = useo_get_current_category_slug();
		$countslugs=count($slugs);
		
		list($categories, $categoryid)=qa_db_select_with_pending(
			qa_db_category_nav_selectspec($slugs, false, false, true),
			$countslugs ? qa_db_slugs_to_category_id_selectspec($slugs) : null
		);
		
		
		
		if ( $countslugs && isset($categoryid) ) {
			/*
			$categoryid is current categories ID
			$backpath = implode('/', array_reverse($slugs));
			echo "countslugs: <pre>"; var_dump($countslugs); echo "</pre>";
			$fullcategory=qa_db_select_with_pending(qa_db_full_category_selectspec($categoryid, true));
			echo "fullcategory: <pre>"; var_dump($fullcategory); echo "</pre>";
			
			echo "categoryid: <pre>"; var_dump($categoryid); echo "</pre>";
			echo "slugs: <pre>"; var_dump($slugs); echo "</pre>";
			echo "template: <pre>"; var_dump($template); echo "</pre>";
			echo "request: <pre>"; var_dump($request); echo "</pre>";
			*/

			require_once QA_INCLUDE_DIR.'qa-db-metas.php';

			$description=qa_db_categorymeta_get($categoryid, 'useo_cat_description');
			if (!(qa_opt('useo_cat_desc_format'))) $description=qa_html($description);
			$editurlhtml=qa_path_html('category-edit/'.$categoryid);
			
			$allowediting=!qa_user_permit_error('useo_cat_desc_permit_edit');
			
			if (strlen($description)) {
				echo '<SPAN CLASS="entry-content qa-category-description">';
				echo $description;
				echo '</SPAN>';
				if ($allowediting)
					echo ' - <A HREF="'.$editurlhtml.'">edit</A>';

			} elseif ($allowediting)
				echo '<A HREF="'.$editurlhtml.'">'.qa_lang_html('useo/create_desc_link').'</A>';
		}
	}

}
