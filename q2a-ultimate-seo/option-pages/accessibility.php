<h2 class="heading">Site Accessibility</h2>
<div class="useo-option-header-content">You can choose to stop your site from being indexed by search engines. if you activate this settings it can remove your site from search engines.</div>
<div class="useo-option-container">
	<div class="useo-option-detail">Stop indexing the site on search engines:</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_access_noindex" name="useo_access_noindex" <?php echo (qa_opt('useo_access_noindex') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_access_noindex"></label>
		</div>
		<div class="useo-option-not-recommended"> * Not Recommended </div>
	</div>
	<div class="useo-option-extra-detail">Make site "No-Index", so search engines won't show it in search results.</div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Stop search engines form following your links:</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_access_nofollow" name="useo_access_nofollow" <?php echo (qa_opt('useo_access_nofollow') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_access_nofollow"></label>
		</div>
		<div class="useo-option-not-recommended"> * Not Recommended </div>
	</div>
	<div class="useo-option-extra-detail">Make site "No-Follow", so search engines won't any of the links on your site.</div>
</div>
<hr>
<h2 class="heading">Question Page Accessibility</h2>
<div class="useo-option-header-content">Many SEO experts believe that short content on a site can damage it's Search Engine Rank. unless the page(and site) has a high authority or it contains media(pictures, videos, ...) that can be the focus of the page.</div>
<div class="useo-option-header-content">since in most questions, main focus of the content is on words not media, you can decide to hide pages with short content from search engines.</div>
<div class="useo-option-container">
	<div class="useo-option-detail">Don't index short pages:</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_access_length_enable" name="useo_access_length_enable" <?php echo (qa_opt('useo_access_length_enable') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_access_length_enable"></label>
		</div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Minimum number of words to let page get indexed:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input id="" class="useo-text" type="text" name="useo_access_length" value="<?php echo qa_opt('useo_access_length'); ?>">
			<div class="useo-option-suffix"> words </div>
		</div>
	</div>
</div>
<hr>

