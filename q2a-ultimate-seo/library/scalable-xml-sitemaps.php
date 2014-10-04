<?php
	class useo_scalable_xml_sitemaps {
		
		var $directory;
		var $urltoroot;
		
		function load_module($directory, $urltoroot)
		{
			$this->directory=$directory;
			$this->urltoroot=$urltoroot;
		}

		function suggest_requests()
		{
			return array(
				array(
					'title' => 'Sitemap Index',
					'request' => 'sitemap-index.xml',
					'nav' => null, // 'M'=main, 'F'=footer, 'B'=before main, 'O'=opposite main, null=none
				),
				array(
					'title' => 'Index for all sitemaps',
					'request' => 'sitemap-all.xml',
					'nav' => null, // 'M'=main, 'F'=footer, 'B'=before main, 'O'=opposite main, null=none
				),				array(
					'title' => 'Sitemap Index only Questions',
					'request' => 'sitemap.xml',
					'nav' => null, // 'M'=main, 'F'=footer, 'B'=before main, 'O'=opposite main, null=none
				),
			);
		}

		
		function match_request($request)
		{
		//var_dump(substr($request, 8,strlen($request)-12) );
			if( (substr($request,0,7)=='sitemap') && (qa_opt('useo_sitemap_enable')) )
				return true;
		}

		
		function process_request($request)
		{
			//@ini_set('display_errors', 0); // we don't want to show PHP errors inside XML
			
			if($request == 'sitemap.xml'){
				$req = '';
			}else{
				$req_str = substr($request, 8,strlen($request)-12); // extract "X-Y-Z" from "sitemap-X-Y-Z.xml"
				$req=explode('-', $req_str);
			}

			$siteurl=qa_opt('site_url');
			header('Content-type: text/xml; charset=utf-8');
		// Index Pages	
			// Indexed all XML sitemaps for question's lists
			// example: sitemap.xml
			if ( $req=='' ) {
				$this->sitemap_index_header();
				$q_sitemaps=qa_db_read_one_assoc(qa_db_query_sub(
					"SELECT count(*) as total from ^posts WHERE type='Q'"
				));
				$count=qa_opt('useo_sitemap_question_count');
				$q_sitemap_count = ceil($q_sitemaps['total'] / $count);
				for ($i = 0; $i < $q_sitemap_count; $i++){
					$this->sitemap_index_output('sitemap-'. $i . '.xml');
				}
				$this->sitemap_index_footer();
			}
			// Indexed all important XML sitemaps
			// example: sitemap-index.xml
			if ( (count($req)==1) && ($req[0]=='index') ) {
				$this->sitemap_index_header();
				$this->sitemap_index();
				$this->sitemap_index_footer();
			}
			// Indexed all XML sitemaps, including categories question page
			// example: sitemap-index.xml
			if ( (count($req)==1) && ($req[0]=='all') ) {
				$this->sitemap_index_header();
				$this->sitemap_all();
				$this->sitemap_index_footer();
			}
			
			//	Question pages
			// numbered question sitenaps
			// example: sitemap-1.xml, sitemap-12.xml
			if ( (count($req)==1) && ((strval((int)$req[0]))==$req[0]) ) {
				$hotstats=qa_db_read_one_assoc(qa_db_query_sub(
					"SELECT MIN(hotness) AS base, MAX(hotness)-MIN(hotness) AS spread FROM ^posts WHERE type='Q'"
				));
				
				$count=qa_opt('useo_sitemap_question_count');
				$start=(int)$req[0]*$count;

				$questions=qa_db_read_all_assoc(qa_db_query_sub(
					"SELECT postid, title, hotness FROM ^posts WHERE type='Q' ORDER BY postid LIMIT #,#",
					$start,$count
				));
				
				if (count($questions)){
					$this->sitemap_header();
					foreach ($questions as $question) {
						$this->sitemap_output(qa_q_request($question['postid'], $question['title']),
							0.1+0.9*($question['hotness']-$hotstats['base'])/(1+$hotstats['spread']));
					}
					$this->sitemap_footer();
				}
			}
		

		//User pages
			if ( ($req[0]=='users') && (!QA_FINAL_EXTERNAL_USERS) && qa_opt('useo_sitemap_users_enable')) {
			// user's numbered sitemaps
			// example: sitemap-users-1.xml, sitemap-users-12.xml		
				if(isset($req[1]) && ((strval((int)$req[1]))==$req[1]) && ((int)qa_opt('useo_sitemap_users_count')!=0) ){
					$count=qa_opt('useo_sitemap_users_count');
					$start=(int)$req[1]*$count;		
					$users=qa_db_read_all_assoc(qa_db_query_sub(
						"SELECT userid, handle FROM ^users ORDER BY userid LIMIT #,#",
						$start,$count
					));

					if (count($users)){
						$this->sitemap_header();
						foreach ($users as $user) {
							$this->sitemap_output('user/'.$user['handle'], 0.25);
						}
						$this->sitemap_footer();
					}
				}else
			// All users sitemap
			// example: sitemap-users.xml
				if(!(isset($req[1]))){
					$users=qa_db_read_all_assoc(qa_db_query_sub(
						"SELECT userid, handle FROM ^users ORDER BY userid"
					));
					if (count($users)){
						$this->sitemap_header();
						foreach ($users as $user) {
							$this->sitemap_output('user/'.$user['handle'], 0.25);
						}
						$this->sitemap_footer();
					}
				}
			}
			

		//	Tag pages
			if (($req[0]=='tags') && qa_using_tags() && qa_opt('useo_sitemap_tags_enable')) {
			// link to each tag's page sitemaps
			// example: sitemap-tags-1.xml, sitemap-tags-12.xml				
				if(isset($req[1]) && ((strval((int)$req[1]))==$req[1]) && ((int)qa_opt('useo_sitemap_tags_count')!=0) ){
					$count=qa_opt('useo_sitemap_tags_count');
					$start=(int)$req[1]*$count;		
					$tagwords=qa_db_read_all_assoc(qa_db_query_sub(
						"SELECT wordid, word, tagcount FROM ^words WHERE tagcount>0 ORDER BY wordid LIMIT #,#",
						$start,$count
					));
					if (count($tagwords)){
						$this->sitemap_header();
						foreach ($tagwords as $tagword) {
							$this->sitemap_output('tag/'.$tagword['word'], 0.5/(1+(1/$tagword['tagcount']))); // priority between 0.25 and 0.5 depending on tag frequency
						}
						$this->sitemap_footer();
					}
				}else
			// link to all tags in sitemaps
			// example: sitemap-tags.xml
				if(!(isset($req[1]))){
					$tagwords=qa_db_read_all_assoc(qa_db_query_sub(
						"SELECT wordid, word, tagcount FROM ^words WHERE tagcount>0 ORDER BY wordid"
					));
					if (count($tagwords)){
						$this->sitemap_header();
						foreach ($tagwords as $tagword) {
							$this->sitemap_output('tag/'.$tagword['word'], 0.5/(1+(1/$tagword['tagcount']))); // priority between 0.25 and 0.5 depending on tag frequency
						}
						$this->sitemap_footer();
					}
				}
			}
			
		//	link to all category pages
			if (($req[0]=='category')  && (!(isset($req[1]))) && qa_using_categories() && qa_opt('useo_sitemap_categories_enable')) {
					$categories=qa_db_read_all_assoc(qa_db_query_sub(
						"SELECT categoryid, backpath FROM ^categories WHERE qcount>0 ORDER BY categoryid"
					));
					if (count($categories)){
						$this->sitemap_header();
						foreach ($categories as $category) {
							$this->sitemap_output('questions/'.implode('/', array_reverse(explode('/', $category['backpath']))), 0.5);
						}
						$this->sitemap_footer();
					}
			}
		//	sitemap for category questions
			if (($req[0]=='category') && (isset($req[1])) && qa_using_categories() && qa_opt('useo_sitemap_categoriy_q_enable')) {
				$hotstats=qa_db_read_one_assoc(qa_db_query_sub(
					"SELECT MIN(hotness) AS base, MAX(hotness)-MIN(hotness) AS spread FROM ^posts WHERE type='Q'"
				));
				
				if(count($req)>=3){ //because: "category-x-x-x-x-1" | 1 category + 1 sount + at least 1 category = 3
			// link to questions in a category or sub category
			// example: sitemap-category-RootCat-SubCat-2.xml
			// it's always numbered, "sitemap-category-RootCat-SubCat.xml" is NOT ALLOWED
					$slug_list = array_splice($req, 1, -1);
					$slug = implode("/", array_reverse($slug_list));
					$count=qa_opt('useo_sitemap_categoriy_q_count');
					$start=(int)$req[count($req)-1]*$count;	
					$questions=qa_db_read_all_assoc(qa_db_query_sub(
						'SELECT postid, title, hotness FROM ^posts WHERE ^posts.type=$
						AND categoryid=(SELECT categoryid FROM ^categories WHERE ^categories.backpath=$ LIMIT 1) 
						ORDER BY ^posts.created DESC LIMIT #,#',
						'Q', $slug, $start, $count
					));
				}else{
			// link to all questions in a category
			// example: sitemap-category-RootCat.xml
					$slug = $req[1];
					$questions=qa_db_read_all_assoc(qa_db_query_sub(
						"SELECT postid, title, hotness FROM ^posts WHERE ^posts.type=$
						AND categoryid=(SELECT categoryid FROM ^categories WHERE ^categories.backpath=$ LIMIT 1) 
						ORDER BY ^posts.created DESC",
						'Q', $slug
					));
				}
				
				if (count($questions))
					$this->sitemap_header();
					foreach ($questions as $question) {
						$this->sitemap_output(qa_q_request($question['postid'], $question['title']),
							0.1+0.9*($question['hotness']-$hotstats['base'])/(1+$hotstats['spread']));
					}
					$this->sitemap_footer();
			}
			
		
		//	Pages in category browser
		
			if (qa_using_categories() && qa_opt('useo_sitemap_categories_enable')) {
				$this->sitemap_output('categories', 0.5);
				
				$nextcategoryid=0;
				$this->sitemap_header();
				while (1) { // only find categories with a child
					$categories=qa_db_read_all_assoc(qa_db_query_sub(
						"SELECT parent.categoryid, parent.backpath FROM ^categories AS parent ".
						"JOIN ^categories AS child ON child.parentid=parent.categoryid WHERE parent.categoryid>=# GROUP BY parent.categoryid LIMIT 100",
						$nextcategoryid
					));
					if (!count($categories))
						break;
					foreach ($categories as $category) {
						$this->sitemap_output('categories/'.implode('/', array_reverse(explode('/', $category['backpath']))), 0.5);
						$nextcategoryid=max($nextcategoryid, $category['categoryid']+1);
					}
				}
				$this->sitemap_footer();
			}
			

		//	Finish up...
			
			return null;
		}
		

		function sitemap_all(){
			// all indexed sitemaps
			$this->sitemap_index();
			// category question's list
			$categories=qa_db_read_all_assoc(qa_db_query_sub(
						"SELECT categoryid, backpath FROM ^categories WHERE qcount>0 ORDER BY categoryid"
			));
			foreach ($categories as $category){
				$backpath = $category['backpath'];
				
				$count=qa_opt('useo_sitemap_categoriy_q_count');
				$qcount=qa_db_read_one_assoc(qa_db_query_sub(
					'SELECT count(*) as total FROM ^posts WHERE ^posts.type=$
					AND categoryid=(SELECT categoryid FROM ^categories WHERE ^categories.backpath=$ LIMIT 1)',
					'Q', $backpath
				));
				
				$category_slug = implode('-', array_reverse(explode('/', $category['backpath'])));
				$cat_count = ceil($qcount['total'] / $count);
				for ($i = 0; $i < $cat_count; $i++){
					$this->sitemap_index_output('sitemap-category-'. $category_slug . '-' . $i . '.xml');
				}
			}
		}
		function sitemap_index(){
			// question list sitemap
			$q_sitemaps=qa_db_read_one_assoc(qa_db_query_sub(
				"SELECT count(*) as total from ^posts WHERE type='Q'"
			));
			$count=qa_opt('useo_sitemap_question_count');
			$q_sitemap_count = ceil($q_sitemaps['total'] / $count);
			for ($i = 0; $i < $q_sitemap_count; $i++){
				$this->sitemap_index_output('sitemap-'. $i . '.xml');
			}				

			// user's list sitemap
			if( qa_opt('useo_sitemap_users_enable') )
			{
				$u_sitemaps=qa_db_read_one_assoc(qa_db_query_sub(
					"SELECT count(*) as total from ^users"
				));
				$count=qa_opt('useo_sitemap_users_count');
				$u_sitemap_count = ceil($u_sitemaps['total'] / $count);
				for ($i = 0; $i < $u_sitemap_count; $i++){
					$this->sitemap_index_output('sitemap-users-'. $i . '.xml');
				}				
			}
			// tag's list sitemap
			if( qa_opt('useo_sitemap_tags_enable') )
			{
				$t_sitemaps=qa_db_read_one_assoc(qa_db_query_sub(
					"SELECT count(*) as total from ^words WHERE tagcount>0 "
				));
				$count=qa_opt('useo_sitemap_tags_count');
				$t_sitemap_count = ceil($t_sitemaps['total'] / $count);
				for ($i = 0; $i < $t_sitemap_count; $i++){
					$this->sitemap_index_output('sitemap-tags-'. $i . '.xml');
				}				
			}
			// categories's list sitemap
			if( qa_opt('useo_sitemap_categories_enable') )
			{
				$this->sitemap_index_output('sitemap-category.xml');
			}
		}
		
		function sitemap_header(){
			echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
			echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
		}
		function sitemap_footer(){
			echo "</urlset>\n";
			die();
		}
		function sitemap_index_header(){
			echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
			echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
		}
		function sitemap_index_footer(){
			echo "</sitemapindex>\n";
			die();
		}
		function sitemap_output($request, $priority)
		{
			echo "\t<url>\n".
				"\t\t<loc>".qa_xml(qa_path($request, null, qa_opt('site_url')))."</loc>\n".
				"\t\t<priority>".max(0, min(1.0, $priority))."</priority>\n".
				"\t</url>\n";
		}
		function sitemap_index_output($request)
		{
			echo "\t<sitemap>\n".
				"\t\t<loc>".qa_xml(qa_path($request, null, qa_opt('site_url')))."</loc>\n".
				"\t</sitemap>\n";
		}
	
	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/