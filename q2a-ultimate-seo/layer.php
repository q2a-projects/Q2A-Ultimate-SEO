<?php

class qa_html_theme_layer extends qa_html_theme_base {
	var $meta_title;
	var $meta_description;
	var $meta_keywords;
	
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
	function head_script()
	{
		qa_html_theme_base::head_script();
		if ( ($this->template=='question') and (qa_get_logged_in_level() >= QA_USER_LEVEL_ADMIN) ){
			$variables = '';
			$variables .= 'useo_ajax_url = "' . USEO_URL . '/ajax.php";';
			$variables .= 'useo_postid = ' . $this->content['q_view']['raw']['postid'] .';';
			$this->output('<script>' . $variables . '</script>');
			$this->output('<script src="'.USEO_URL.'/include/seo-forms.js" type="text/javascript"></script>');
		}
	}	

	function head_title()
	{
	// Custom Meta(title,description,keywords)
		if( ($this->template=='question') and (qa_opt('useo_meta_editor_enable')) ){
			require_once QA_INCLUDE_DIR.'qa-db-metas.php';
			$postid = $this->content['q_view']['raw']['postid'];
			$metas = json_decode(qa_db_postmeta_get($postid, 'useo-meta-info'),true);
			$this->meta_title = @$metas['title'];
			$this->meta_description = @$metas['description'];
			$this->meta_keywords = @$metas['keywords'];
		}
	
	// Title Customization Options
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
				if(empty($this->meta_title)){
					// title customization
					$title_template = qa_opt('useo_title_qa_item');
					if(! empty($title_template) ){
						$search = array( '%site-title%', '%question-title%', '%question-category%');
						$replace   = array(qa_opt('site_title'), @$this->content['q_view']['raw']['title'], @$this->content['q_view']['raw']['categoryname']);
						$title = str_replace($search, $replace, $title_template);
					}
				}else{
					// meta editor
					$title = $this->meta_title;
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
		
	// Page Meta Tags
		$noindex = qa_opt('useo_access_noindex');
		$nofollow = qa_opt('useo_access_nofollow');
		if($noindex and $nofollow)
			$this->output('<meta name="robots" content="noindex, nofollow" />');
		elseif($noindex)
			$this->output('<meta name="robots" content="noindex" />');
		else{
			// if page is not already noindex, check if it needs to be noindex. also add nofollow if necessary
			$status = 1; // content is long enough
			if( ($this->template=='question') and (qa_opt('useo_access_length_enable')) and ( (int)qa_opt('useo_access_length')>0 ) ){
				$status = 0;
				$minimum_words = (int)qa_opt('useo_access_length');
				$word_count = str_word_count($this->content['q_view']['raw']['title']) + str_word_count($this->content['q_view']['raw']['content']);
				if($word_count >= $minimum_words)
					$status = 1;
				else{
					foreach($this->content['q_view']['c_list']['cs'] as $comment)
						$word_count += str_word_count($comment['raw']['content']);
					if($word_count >= $minimum_words)
						$status = 1;
					else{
						foreach($this->content['a_list']['as'] as $answer)
							$word_count += str_word_count($answer['raw']['content']);
						if($word_count >= $minimum_words)
							$status = 1;
						else{
							foreach($this->content['a_list']['as'] as $answer)
								foreach($answer['c_list']['cs'] as $comment)
									$word_count += str_word_count($comment['raw']['content']);
							if($word_count >= $minimum_words)
								$status = 1;
						}
					}
				}
			}
			if( ($nofollow) && ($status==1) )
				$this->output('<meta name="robots" content="nofollow" />');
			elseif( ($nofollow) && ($status==0) )
				$this->output('<meta name="robots" content="noindex, nofollow" />');
			elseif($status==0)
				$this->output('<meta name="robots" content="noindex" />');
		}
	// Question Meta tags
		if($this->template=='question'){
			// setup custom meta keyword
			if (! empty($this->meta_keywords))
				$this->content['keywords'] = $this->meta_keywords;
			// setup custom meta description
			if (! empty($this->meta_description))
				$this->content['description'] = $this->meta_description;
			// if there was no custom meta description and it's supposed to read it from answers do it, otherwise don't change it
			elseif(qa_opt('useo_meta_desc_ans_enable')){
				$lenght = (int)qa_opt('useo_meta_desc_length');
				if($lenght<=0)
					$lenght = 160;
				$text = '';
				if( ($this->content['q_view']['raw']['acount'] > 0) and (qa_opt('useo_meta_desc_ans_enable')) ){
					// get Selected Answer's content
					if( (isset($this->content["q_view"]["raw"]["selchildid"])) and (qa_opt('useo_meta_desc_sel_ans_enable')) ){
						foreach($this->content['a_list']['as'] as $answer)
							if($answer['raw']['isselected'])
								$text = $answer['raw']['content'];
					}else{
					// get most voted Answer's content
						$max_vote = 0; // don't use answers with negative votes.
						foreach($this->content['a_list']['as'] as $answer){
							if($answer['raw']['netvotes'] > $max_vote){
								$text = $answer['raw']['content'];
								$max_vote = $answer['raw']['netvotes'];
							}
						}
					}
				}
				if(!(empty($text))){
					$excerpt = useo_get_excerpt($text, 0, $lenght);
					$this->content['description'] = $excerpt;
				}
			}
		}
	}
	function main_parts($content)
	{
		qa_html_theme_base::main_parts($content);

		if( (qa_get_logged_in_level() >= QA_USER_LEVEL_ADMIN) and ($this->template=='question') and (qa_opt('useo_meta_editor_enable')) ){
			
			$this->output('<div class="qa-widgets-main qa-widgets-main-low"><hr />');
			$this->output('<form name="useo-meta-editor" action="'.qa_self_html().'" method="post">');
			$this->output('
			<h2> Page Title And Meta Tags </h2>
			<strong>Only administrators can see this section.</strong>
			<table class="qa-form-tall-table">
				<tbody id="useo-title">
					<tr>
						<td class="qa-form-tall-label">
							Page Title
						</td>
					</tr>
					<tr>
						<td class="qa-form-tall-data">
							<input placeholder="' . $this->content['q_view']['raw']['title'] . '" id="useo-meta-editor-title" class="qa-form-tall-text" type="text" value="'. $this->meta_title .'" name="useo-meta-editor-title">
						</td>
					</tr>
				</tbody>

				<tbody id="useo-meta-description">
					<tr>
						<td class="qa-form-tall-label">
							Description Meta Tag
						</td>
					</tr>
					<tr>
						<td class="qa-form-tall-data">
							<textarea placeholder="' . $this->content['description'] . '" id="useo-meta-editor-description" class="qa-form-tall-text" cols="40" rows="3" name="useo-meta-editor-description">'. $this->meta_description .'</textarea>
						</td>
					</tr>
				</tbody>
				<tbody id="useo-meta-keywords">
					<tr>
						<td class="qa-form-tall-label">
							Keywords Meta Tag
						</td>
					</tr>
					<tr>
						<td class="qa-form-tall-data">
							<input placeholder="' . $this->content['keywords'] . '" id="useo-meta-editor-keywords" class="qa-form-tall-text" type="text" value="'. $this->meta_keywords .'" name="useo-meta-editor-keywords">
							<div class="qa-form-tall-note">A comma separated list of your most important keywords</div>
						</td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td  id="useo_buttons_container" class="qa-form-tall-buttons" colspan="1">
							<input id="useo_save_meta" class="qa-form-tall-button qa-form-tall-button-save" type="submit" title="" value="Save Options">
						</td>
					</tr>
				</tbody>
			</table>
			');
			$this->output('</form>');
			$this->output('<hr /></div>');
		}
		
	}

}

