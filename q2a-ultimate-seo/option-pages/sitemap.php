<?php
	$siteurl=qa_opt('site_url');
?>
<h2 class="heading">XML Sitemaps</h2>
<div class="useo-option-header-content">It's recommended that you enable this module to divide your site-map into smaller files which are preferred to a single large site map file by search engines.</div>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Enable Ultimate SEO Sitemap
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input name="useo_sitemap_enable" id="useo_sitemap_enable" <?php echo (qa_opt('useo_sitemap_enable') ? ' checked="" ' : ''); ?> type="checkbox" class="useo-checkbox" value="1">
			<label for="useo_sitemap_enable"></label>
		</div>
	</div>
</div>
<h3 class="heading">Sitemap for all Questions</h3>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Number of Questions per sitemap:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input value="<?php echo (int)qa_opt('useo_sitemap_question_count'); ?>" type="text" id="" class="useo-text" name="useo_sitemap_question_count">
			<div class="useo-option-suffix"> Links per page </div>
		</div>
		<div class="useo-option-header-content">It's recommended that you keep maximum number of links in each sitemap between 1000 to 40000 links.</div>
		<div class="useo-option-header-content">Also make sure that size of your XML sitemap is less than 10MB.</div>
	</div>
</div>
<hr>
<h3 class="heading">Sitemap for User Profiles</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Enable Sitemap for users
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input name="useo_sitemap_users_enable" id="useo_sitemap_users_enable" <?php echo (qa_opt('useo_sitemap_users_enable') ? ' checked="" ' : ''); ?> type="checkbox" class="useo-checkbox" value="1">
			<label for="useo_sitemap_users_enable"></label>
		</div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Number of User Profiles per sitemap:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input value="<?php echo (int)qa_opt('useo_sitemap_users_count'); ?>" type="text" id="" class="useo-text" name="useo_sitemap_users_count">
			<div class="useo-option-suffix"> Links per page </div>
		</div>
	</div>
</div>
<hr>
<h3 class="heading">Sitemap for Tags</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Enable Sitemap for users
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input <?php echo (qa_opt('useo_sitemap_tags_enable') ? ' checked="" ' : ''); ?> type="checkbox" name="useo_sitemap_tags_enable" id="useo_sitemap_tags_enable" class="useo-checkbox" value="1">
			<label for="useo_sitemap_tags_enable"></label>
		</div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Number of list per sitemap:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input value="<?php echo (int)qa_opt('useo_sitemap_tags_count'); ?>" type="text" id="" class="useo-text" name="useo_sitemap_tags_count">
			<div class="useo-option-suffix"> Links per page </div>
		</div>
	</div>
</div>
<hr>
<h3 class="heading">Sitemap for Categories</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Enable Sitemap for users
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input <?php echo (qa_opt('useo_sitemap_categories_enable') ? ' checked="" ' : ''); ?> type="checkbox" name="useo_sitemap_categories_enable" id="useo_sitemap_categories_enable" class="useo-checkbox" value="1">
			<label for="useo_sitemap_categories_enable"></label>
		</div>
	</div>
</div>
<hr>
<h3 class="heading">Sitemap for Questions based on Categories</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Enable Sitemap for Category Questions
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input <?php echo (qa_opt('useo_sitemap_categoriy_q_enable') ? ' checked="" ' : ''); ?> type="checkbox" name="useo_sitemap_categoriy_q_enable" id="useo_sitemap_categoriy_q_enable" class="useo-checkbox" value="1">
			<label for="useo_sitemap_categoriy_q_enable"></label>
		</div>
		<div class="useo-option-not-recommended"> * Not Recommended </div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Number of list per sitemap:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input value="<?php echo (int)qa_opt('useo_sitemap_categoriy_q_count'); ?>" type="text" id="" class="useo-text" name="useo_sitemap_categoriy_q_count">
			<div class="useo-option-suffix"> Links per page </div>
		</div>
	</div>
</div>
<hr>
<h3 class="heading">Generated Sitemaps</h3>
<h4>Sitemap Indexes</h4>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Index for important sitemap files:</div>
	<div class="useo-option-content">
		<?php
			echo '<p><a href="' . $siteurl .  'sitemap-index.xml">sitemap-index.xml' . '</a></p>';
		?>
		<div class="useo-option-recommended"> * Recommended to submit this file to search engines as your primary sitemap</div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Index for sitemap files for Questions</div>
	<div class="useo-option-content">
		<?php
			echo '<p><a href="' . $siteurl .  'sitemap.xml">sitemap.xml' . '</a></p>';
		?>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Index for all generated sitemap files:</div>
	<div class="useo-option-content">
		<?php
			echo '<p><a href="' . $siteurl .  'sitemap-all.xml">sitemap-all.xml' . '</a></p>';
		?>
	</div>
</div>
<h4>All generated Sitemap files</h4>
<?php
// question list sitemap
$q_sitemaps=qa_db_read_one_assoc(qa_db_query_sub(
	"SELECT count(*) as total from ^posts WHERE type='Q'"
));
$count=qa_opt('useo_sitemap_question_count');
$q_sitemap_count = ceil($q_sitemaps['total'] / $count);
for ($i = 0; $i < $q_sitemap_count; $i++){
	echo '<p><a href="' . $siteurl .  'sitemap-'. $i . '.xml">'. 'sitemap-'. $i . '.xml' . '</a></p>';
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
		echo '<p><a href="' . $siteurl .  'sitemap-users-'. $i . '.xml">'. 'sitemap-users-'. $i . '.xml' . '</a></p>';
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
		echo '<p><a href="' . $siteurl .  'sitemap-tags-'. $i . '.xml">'. 'sitemap-tags-'. $i . '.xml' . '</a></p>';
	}				
}
// categories's list sitemap
if( qa_opt('useo_sitemap_categories_enable') )
{
	echo '<p><a href="' . $siteurl .  'sitemap-category.xml">sitemap-category.xml' . '</a></p>';
}
if( qa_opt('useo_sitemap_categoriy_q_enable') )
{
	
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
			echo '<p><a href="' . $siteurl .  'sitemap-category-'. $category_slug . '-' . $i . '.xml">'. 'sitemap-category-' . $category_slug . '-' . $i . '.xml' . '</a></p>';
		}
	}
}

?>
