<h2 class="heading">Tag Descriptions</h2>
<div class="useo-option-header-content"> Tag Customizations let's you add new link title and icon to tag links and description to tag's page.</div>
<div class="useo-option-header-content"> To add each tag's description to it's page visit "Layout" page in your admin panel and add "Ultimate SEO Tag Descriptions" Widget to anywhere you like. then you can visit any tag and edit it's title, description or icon in same location.</div>
<h3 class="heading">Tooltips</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Link Title Length
	</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input value="<?php echo (int)qa_opt('useo_tag_desc_max_len'); ?>" type="text" id="" class="useo-text" name="useo_tag_desc_max_len">
			<div class="useo-option-suffix"> characters </div>
		</div>
		<div class="useo-option-header-content"> Tag link's tooltip(link's "title" attribute) Lentgh </div>
		<div class="useo-option-recommended"> Recommended title length between 50 to 250 characters </div>
	</div>
</div>
<hr>
<h3 class="heading">Icon Images</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Allow Icon images to be added inside tags
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
		<input name="useo_tag_desc_enable_icon" id="useo_tag_desc_enable_icon" <?php echo (qa_opt('useo_tag_desc_enable_icon') ? ' checked="" ' : ''); ?> type="checkbox" class="useo-checkbox" value="1">
		<label for="useo_tag_desc_enable_icon"></label>
		</div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Image height:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input value="<?php echo (int)qa_opt('useo_tag_desc_icon_height'); ?>" type="text" id="" class="useo-text" name="useo_tag_desc_icon_height">
			<div class="useo-option-suffix"> Pixels </div>
		</div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Image Width:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input value="<?php echo (int)qa_opt('useo_tag_desc_icon_width'); ?>" type="text" id="" class="useo-text" name="useo_tag_desc_icon_width">
			<div class="useo-option-suffix"> Pixels </div>
		</div>
		<div class="useo-option-header-content">16x16 pixels size is recommended for icons.</div>
	</div>
</div>
<hr>
<h3 class="heading">Description Content</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Enable HTML formatting for description texts
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
		<input name="useo_tag_desc_format" id="useo_tag_desc_format" <?php echo (qa_opt('useo_tag_desc_format') ? ' checked="" ' : ''); ?> type="checkbox" class="useo-checkbox" value="1">
		<label for="useo_tag_desc_format"></label>
		</div>
	</div>
</div>
<hr>
<h3 class="heading">Editing Permissions</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Allow this user groups to edit tag descriptions
	</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
<?php
		$permitoptions=qa_admin_permit_options(QA_PERMIT_USERS, QA_PERMIT_SUPERS, false, false);
		echo '<select class="qa-form-tall-select" name="useo_tag_desc_permit_edit">';
		foreach($permitoptions as $level => $user_group)
			echo '<option ' . (($level==qa_opt('useo_tag_desc_permit_edit')) ? ' selected ' : '') . 'value="' . $level . '">' . $user_group . '</option>';
		echo '</select>';
?>
		</div>
	</div>
</div>
<hr>

