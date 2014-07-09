<?php

class qa_html_theme_layer extends qa_html_theme_base {
	
	function doctype(){			
		qa_html_theme_base::doctype();
		//v($this->content);

		
		if ($this->request == 'admin/ulitmate_seo') {
			if(empty($this->content['navigation']['sub']))
				$this->content['navigation']['sub']=array();
			require_once QA_INCLUDE_DIR.'qa-app-admin.php';
			$admin_nav = qa_admin_sub_navigation();
			$this->content['navigation']['sub'] = array_merge(
				$admin_nav,
				$this->content['navigation']['sub']
			);
		}
		if ( ($this->template=='admin') or ($this->request == 'ulitmate_seo') ){
			$this->content['navigation']['sub']['ulitmate_seo'] = array(
				'label' => 'Ultimate SEO',
				'url' => qa_path_html('admin/ulitmate_seo'),
			);
			if ($this->request == 'admin/ulitmate_seo'){
				$this->content['navigation']['sub']['ulitmate_seo']['selected'] = true;
			}
		}
		
	}
	function head_title()
	{
		$title = '';
		switch ($this->template) {
			case 'qa':
				$title_template = qa_opt('useo_title_qa');
				if(! empty($title_template) ){
					$search = array( '%site-title%');
					$replace   = array(qa_opt('site_title'));
					$title = str_replace($search, $replace, $title_template);
				}
				break;
			case 'question':
				$title_template = qa_opt('useo_title_qa_item');
				if(! empty($title_template) ){
					$search = array( '%site-title%', '%question-title%', '%question-category%');
					$replace   = array(qa_opt('site_title'), @$this->content['q_view']['raw']['title'], @$this->content['q_view']['raw']['categoryname']);
					$title = str_replace($search, $replace, $title_template);
				}
				break;
			case 'questions':
				$sort = qa_get('sort');
				if(empty($sort)){
					$title_template = qa_opt('useo_title_recent');
					if(! empty($title_template) ){
						$search = array( '%site-title%', '%recent-qs-title%');
						$replace   = array(qa_opt('site_title'), qa_lang_html('main/recent_qs_title'));
						$title = str_replace($search, $replace, $title_template);
					}
				}elseif($sort=='hot'){
					$title_template = qa_opt('useo_title_hot');
					if(! empty($title_template) ){
						$search = array( '%site-title%', '%hot-qs-title%');
						$replace   = array(qa_opt('site_title'), qa_lang_html('main/hot_qs_title'));
						$title = str_replace($search, $replace, $title_template);
					}
				}elseif($sort=='votes'){
					$title_template = qa_opt('useo_title_voted');
					if(! empty($title_template) ){
						$search = array( '%site-title%', '%voted-qs-title%');
						$replace   = array(qa_opt('site_title'), qa_lang_html('main/voted_qs_title'));
						$title = str_replace($search, $replace, $title_template);
					}
				}elseif($sort=='answers'){
					$title_template = qa_opt('useo_title_answered');
					if(! empty($title_template) ){
						$search = array( '%site-title%', '%answered-qs-title%');
						$replace   = array(qa_opt('site_title'), qa_lang_html('main/answered_qs_title'));
						$title = str_replace($search, $replace, $title_template);
					}
				}elseif($sort=='views'){
					$title_template = qa_opt('useo_title_viewed');
					if(! empty($title_template) ){
						$search = array( '%site-title%', '%viewed-qs-title%');
						$replace   = array(qa_opt('site_title'), qa_lang_html('main/viewed_qs_title'));
						$title = str_replace($search, $replace, $title_template);
					}
				}
			case 'unanswered':
				$sort = qa_get('by');
				if(empty($sort)){
					$title_template = qa_opt('useo_title_unanswered');
					if(! empty($title_template) ){
						$search = array( '%site-title%', '%unanswered-qs-title%');
						$replace   = array(qa_opt('site_title'), qa_lang_html('main/unanswered_qs_title'));
						$title = str_replace($search, $replace, $title_template);
					}
				}elseif($sort=='selected'){
					$title_template = qa_opt('useo_title_unselected');
					if(! empty($title_template) ){
						$search = array( '%site-title%', '%unselected-qs-title%');
						$replace   = array(qa_opt('site_title'), qa_lang_html('main/unselected_qs_title'));
						$title = str_replace($search, $replace, $title_template);
					}
				}elseif($sort=='upvotes'){
					$title_template = qa_opt('useo_title_unupvoted');
					if(! empty($title_template) ){
						$search = array( '%site-title%', '%unupvoteda-qs-title%');
						$replace   = array(qa_opt('site_title'), qa_lang_html('main/unupvoteda_qs_title'));
						$title = str_replace($search, $replace, $title_template);
					}
				}
				break;
			case 'activity':
				$title_template = qa_opt('useo_title_activity');
				if(! empty($title_template) ){
					$search = array( '%site-title%', '%recent-activity-title%');
					$replace   = array(qa_opt('site_title'), qa_lang_html('main/recent_activity_title'));
					$title = str_replace($search, $replace, $title_template);
				}
				break;
			case 'ask':
				$title_template = qa_opt('useo_title_ask');
				if(! empty($title_template) ){
					$search = array( '%site-title%', '%ask-title%');
					$replace   = array(qa_opt('site_title'), qa_lang_html('question/ask_title'));
					$title = str_replace($search, $replace, $title_template);
				}
				break;
			case 'categories':
				$title_template = qa_opt('useo_title_categories');
				if(! empty($title_template) ){
					$search = array( '%site-title%', '%browse-categories%');
					$replace   = array(qa_opt('site_title'), qa_lang_html('misc/browse_categories'));
					$title = str_replace($search, $replace, $title_template);
				}
				break;
			case 'tags':
				$title_template = qa_opt('useo_title_tags');
				if(! empty($title_template) ){
					$search = array( '%site-title%', '%popular-tags%');
					$replace   = array(qa_opt('site_title'), qa_lang_html('main/popular_tags'));
					$title = str_replace($search, $replace, $title_template);
				}
				break;
			case 'tag':
				$title_template = qa_opt('useo_title_tag');
				if(! empty($title_template) ){
					$req = explode('/',$this->request);
					$tag = $req[1];
					$search = array( '%site-title%', '%questions-tagged-x%', '%current-tag%');
					$replace   = array(qa_opt('site_title'), qa_lang_html_sub('main/questions_tagged_x', qa_html($tag)), $tag );
					$title = str_replace($search, $replace, $title_template);
				}
				break;
			case 'search':
				$title_template = qa_opt('useo_title_search');
				if(! empty($title_template) ){
					$term = qa_get('q');
					$search = array( '%site-title%', '%results-for-x%', '%current-term%');
					$replace   = array(qa_opt('site_title'), qa_lang_html_sub('main/results_for_x', qa_html($term)), $term );
					$title = str_replace($search, $replace, $title_template);
				}
				break;
			case 'users':
				$title_template = qa_opt('useo_title_users');
				if(! empty($title_template) ){
					$search = array( '%site-title%', '%highest-users%');
					$replace   = array(qa_opt('site_title'), qa_lang_html('main/highest_users'));
					$title = str_replace($search, $replace, $title_template);
				}
				break;
			case 'user':
				$title_template = qa_opt('useo_title_user');
				if(! empty($title_template) ){
					$req = explode('/',$this->request);
					$user = $req[1];
					$search = array( '%site-title%', '%user-x%', '%current-user%');
					$replace   = array(qa_opt('site_title'), qa_lang_html_sub('main/results_for_x', qa_html($user)), $user );
					$title = str_replace($search, $replace, $title_template);
				}
				break;


		}

		$req = explode('/',$this->request);
		//for category item
		if( ( (isset($this->content["categoryids"])) && (!(empty($this->content["categoryids"]))) ) || ( (count($req)>1) && ( ($this->request=='activity') || ($this->request=='questions') || ($this->request=='unanswered') ) ) )
			echo("it's a category");
			
		
		if(empty($title))
			qa_html_theme_base::head_title();
		else
			$this->output('<title>'.$title.'</title>');
	}

}

