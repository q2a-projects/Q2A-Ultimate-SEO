<?php
// just dump content for debuging
if (!(function_exists('v'))) { 
	function v($c){
		echo '<pre style="text-align: left;">';
		var_dump($c);
		echo '</pre>';
	}
}
function useo_get_host($Address) {
   $parseUrl = parse_url(trim($Address));
   return @trim($parseUrl[host] ? $parseUrl[host] : array_shift(explode('/', $parseUrl[path], 2)));
} 
function useo_reset_settings(){
	require_once QA_INCLUDE_DIR.'qa-app-options.php';
	
	// Title section
	qa_opt('useo_title_qa', '');
	qa_opt('useo_title_qa_item', '');
	qa_opt('useo_title_recent', '');
	qa_opt('useo_title_hot', '');
	qa_opt('useo_title_voted', '');
	qa_opt('useo_title_answered', '');
	qa_opt('useo_title_viewed', '');
	qa_opt('useo_title_question', '');
	qa_opt('useo_title_questions', '');
	qa_opt('useo_title_activity', '');
	qa_opt('useo_title_ask', '');
	qa_opt('useo_title_activity', '');
	qa_opt('useo_title_categories', '');
	qa_opt('useo_title_category', '');
	qa_opt('useo_title_tags', '');
	qa_opt('useo_title_tag', '');
	qa_opt('useo_title_unanswered', '');
	qa_opt('useo_title_unselected', '');
	qa_opt('useo_title_unupvoted', '');
	qa_opt('useo_title_search', '');
	qa_opt('useo_title_users', '');
	qa_opt('useo_title_user', '');
	
	// URLs section 
	qa_opt('useo_url_cleanup', 1);
	qa_opt('useo_url_dont_make_empty', 1);
	qa_opt('useo_url_q_uppercase', 0);
	qa_opt('useo_url_tag_uppercase', 0);
	qa_opt('useo_url_q_uppercase_type', 0);
	qa_opt('useo_url_tag_uppercase_type', 0);
	$words = "a ,able ,about ,above ,abroad ,according ,accordingly ,across ,actually ,adj ,after ,afterwards ,again ,against ,ago ,ahead ,ain't ,all ,almost , ,along ,alongside ,already ,also ,although ,always ,am ,amid ,amidst ,among ,amongst ,an ,and ,another ,any ,anybody ,anyhow ,anyone ,anything ,anyway ,anyways ,anywhere ,apart ,appear ,appreciate ,appropriate ,are ,aren't ,around ,as ,a's ,aside ,ask ,asking ,associated ,at ,available ,away ,awfully ,b ,back ,backward ,backwards ,be ,became ,because ,become ,becomes ,becoming ,been ,before ,beforehand ,begin ,behind ,being ,believe ,below ,beside ,besides ,better ,between ,beyond ,both ,brief ,but ,by ,c ,came ,can ,cannot ,cant ,can't ,caption ,cause ,causes ,certain ,certainly ,changes ,clearly ,c'mon ,co ,co. ,com ,come ,comes ,concerning ,consequently ,consider ,considering ,contain ,containing ,contains ,corresponding ,could ,couldn't ,c's ,currently ,d ,dare ,daren't ,definitely ,described ,despite ,did ,didn't ,different ,directly ,do ,does ,doesn't ,doing ,done ,don't ,down ,downwards ,during ,e ,each ,eg ,eight ,eighty ,either ,else ,elsewhere ,end ,ending ,enough ,entirely ,especially ,et ,etc ,even ,ever ,evermore ,every ,everybody ,everyone ,everything ,everywhere ,ex ,exactly ,example ,except ,f ,fairly ,far ,farther ,few ,fewer ,fifth ,first ,five ,followed ,following ,follows ,for ,forever ,former ,formerly ,forth ,forward ,found ,four ,from ,further ,furthermore ,g ,get ,gets ,getting ,given ,gives ,go ,goes ,going ,gone ,got ,gotten ,greetings ,h ,had ,hadn't ,half ,happens ,hardly ,has ,hasn't ,have ,haven't ,having ,he ,he'd ,he'll ,hello ,help ,hence ,her ,here ,hereafter ,hereby ,herein ,here's ,hereupon ,hers ,herself ,he's ,hi ,him ,himself ,his ,hither ,hopefully ,how ,howbeit ,however ,hundred ,i ,i'd ,ie ,if ,ignored ,i'll ,i'm ,immediate ,in ,inasmuch ,inc ,inc. ,indeed ,indicate ,indicated ,indicates ,inner ,inside ,insofar ,instead ,into ,inward ,is ,isn't ,it ,it'd ,it'll ,its ,it's ,itself ,i've ,j ,just ,k ,keep ,keeps ,kept ,know ,known ,knows ,l ,last ,lately ,later ,latter ,latterly ,least ,less ,lest ,let ,let's ,like ,liked ,likely ,likewise ,little ,look ,looking ,looks ,low ,lower ,ltd ,m ,made ,mainly ,make ,makes ,many ,may ,maybe ,mayn't ,me ,mean ,meantime ,meanwhile ,merely ,might ,mightn't ,mine ,minus ,miss ,more ,moreover ,most ,mostly ,mr ,mrs ,much ,must ,mustn't ,my ,myself ,n ,name ,namely ,nd ,near ,nearly ,necessary ,need ,needn't ,needs ,neither ,never ,neverf ,neverless ,nevertheless ,new ,next ,nine ,ninety ,no ,nobody ,non ,none ,nonetheless ,noone ,no-one ,nor ,normally ,not ,nothing ,notwithstanding ,novel ,now ,nowhere ,o ,obviously ,of ,off ,often ,oh ,ok ,okay ,old ,on ,once ,one ,ones ,one's ,only ,onto ,opposite ,or ,other ,others ,otherwise ,ought ,oughtn't ,our ,ours ,ourselves ,out ,outside ,over ,overall ,own ,p ,particular ,particularly ,past ,per ,perhaps ,placed ,please ,pls ,possible ,presumably ,probably ,provided ,provides ,q ,que ,r ,rather ,rd ,re ,really ,reasonably ,recent ,recently ,regarding ,regardless ,regards ,relatively ,respectively ,right ,round ,s ,said ,same ,saw ,say ,saying ,says ,second ,secondly ,see ,seeing ,seem ,seemed ,seeming ,seems ,seen ,self ,selves ,sensible ,serious ,seriously ,seven ,several ,shall ,shan't ,she ,she'd ,she'll ,she's ,should ,shouldn't ,since ,six ,so ,some ,somebody ,someday ,somehow ,someone ,something ,sometime ,sometimes ,somewhat ,somewhere ,soon ,sorry ,specified ,specify ,specifying ,still ,sub ,such ,sup ,sure ,t ,take ,taken ,taking ,tell ,tends ,th ,than ,thank ,thanks ,thanx ,that ,that'll ,thats ,that's ,that've ,the ,their ,theirs ,them ,themselves ,then ,thence ,there ,thereafter ,thereby ,there'd ,therefore ,therein ,there'll ,there're ,theres ,there's ,thereupon ,there've ,these ,they ,they'd ,they'll ,they're ,they've ,thing ,things ,think ,third ,thirty ,this ,thorough ,thoroughly ,those ,though ,three ,through ,throughout ,thru ,thus ,till ,to ,together ,too ,took ,toward ,towards ,tried ,tries ,truly ,try ,trying ,t's ,twice ,two ,u ,un ,under ,underneath ,undoing ,unfortunately ,unless ,unlike ,unlikely ,until ,unto ,up ,upon ,upwards ,us ,use ,used ,useful ,uses ,using ,usually ,v ,value ,various ,versus ,very ,via ,viz ,vs ,w ,want ,wants ,was ,wasn't ,way ,we ,we'd ,welcome ,well ,we'll ,went ,were ,we're ,weren't ,we've ,what ,whatever ,what'll , what've ,whence ,whenever ,whereafter ,whereas ,whereby ,wherein ,where's ,whereupon ,wherever ,whether , whichever ,while ,whilst ,whither ,whoever ,whole ,who'll ,whom ,whomever ,who's ,whose ,why ,will ,willing ,wish ,with ,within ,wonder ,won't ,would ,wouldn't ,x ,y ,yes ,yet ,you ,you'd ,you'll ,your ,you're ,yours ,yourself ,yourselves ,you've ,z ,zero";
	qa_opt('useo_url_words_raw', $words );
	$words_list = implode(',' , preg_split('/'.QA_PREG_BLOCK_WORD_SEPARATOR.'+/', $words, -1, PREG_SPLIT_NO_EMPTY) );
	qa_opt('useo_url_words_list', $words_list);
	
	// SEO Links section
	qa_opt('useo_links_internal_dofollow', 1);
	
	// XML sitemap section
	qa_opt('useo_sitemap_question_count', 10000);
	qa_opt('useo_sitemap_users_enable', 1);
	qa_opt('useo_sitemap_users_count', 10000);
	qa_opt('useo_sitemap_tags_enable', 1);
	qa_opt('useo_sitemap_tags_count', 10000);
	qa_opt('useo_sitemap_categories_enable', 1);
	qa_opt('useo_sitemap_categories_count', 10000);
	qa_opt('useo_sitemap_categoriy_q_enable', 0);
	qa_opt('useo_sitemap_categoriy_q_count', 10000);

	// Accessibility options
	qa_opt('useo_access_noindex', 0);
	qa_opt('useo_access_nofollow', 0);
	qa_opt('useo_access_length_enable', 0);
	qa_opt('useo_access_length', 300);


	// Meta Tags
	qa_opt('useo_meta_desc_ans_enable', 1);
	qa_opt('useo_meta_desc_sel_ans_enable', 1);
	qa_opt('useo_meta_desc_length', 160);
	qa_opt('useo_meta_editor_enable', 0);

	// Social Tags
	qa_opt('useo_social_og_enable_auto', 1);
	qa_opt('useo_social_og_desc_length', 140);
	qa_opt('useo_social_og_image', '');
	qa_opt('useo_social_tc_enable', 1);
	qa_opt('useo_social_tc_desc_length', 120);
	qa_opt('useo_social_tc_image', '');
	qa_opt('useo_social_tc_handler', '');
	qa_opt('useo_social_schema_enable', 1);
	qa_opt('useo_social_schema_page_type', 1);
	qa_opt('useo_social_gp_thumbnail', '');
	qa_opt('useo_social_enable_editor', 0);
	
	// Tags
	qa_opt('useo_tag_desc_max_len', 250);
	qa_opt('useo_tag_desc_enable_icon', 1);
	qa_opt('useo_tag_desc_icon_height', 16);
	qa_opt('useo_tag_desc_icon_width', 16);
	qa_opt('useo_tag_desc_format', 1);
	qa_opt('useo_tag_desc_permit_edit', QA_PERMIT_EXPERTS);
	
	// Categories
	qa_opt('useo_cat_title_qlist_enable', 0);
	qa_opt('useo_cat_title_nav_enable', 0);
	qa_opt('useo_cat_desc_max_len', 250);
	qa_opt('useo_cat_desc_format', 1);
	qa_opt('useo_cat_desc_permit_edit', QA_PERMIT_ADMINS);
	qa_opt('useo_cat_canonical_enable', 1);
}

function useo_get_excerpt($str, $startPos=0, $maxLength=160) {
	if(strlen($str) > $maxLength) {
		$excerpt   = substr($str, $startPos, $maxLength-3);
		$lastSpace = strrpos($excerpt, ' ');
		$excerpt   = substr($excerpt, 0, $lastSpace);
		$excerpt  .= '...';
	} else {
		$excerpt = $str;
	}
	return $excerpt;
}
// return category slug if current page is a category, return false if it's not
function useo_get_current_category_slug() {
	global $useo_category_slug;
	if(isset($useo_category_slug))
		return $useo_category_slug;
	else{ // check if it's a category or not
		$requestparts=qa_request_parts();
		$requestlower=strtolower(qa_request());
		$firstlower=strtolower($requestparts[0]);
		$routing=qa_page_routing();
		// unanswered & questions pages may contain categories.
		unset($routing['activity/']);
		unset($routing['unanswered/']);
		unset($routing['questions/']);
		if ( (isset($routing[$requestlower])) or (isset($routing[$firstlower.'/'])) or (is_numeric($requestparts[0])) ){
			$useo_category_slug = false;
			return false;
		}
		$explicitqa=(strtolower($requestparts[0])=='qa' or strtolower($requestparts[0])=='unanswered' or strtolower($requestparts[0])=='questions' or strtolower($requestparts[0])=='activity');
		
		if ($explicitqa)
			$useo_category_slug = array_slice($requestparts, 1);
		elseif (strlen($requestparts[0]))
			$useo_category_slug = $requestparts;
		else
			$useo_category_slug = false;
			
		return $useo_category_slug;
	}
}