<h2 class="heading">HTML Meta Tags</h2>
<div class="useo-option-header-content">Meta Descriptions nor Meta Keywords factor into Google's ranking algorithms for web search. However the preview snippets on search result pages and many other applications such as feed readers are pulled from your meta tags. So they can still play a major role in attracting visitors to your site.</div>
<h3 class="heading">Answer Content for Meta Description </h3>
<div class="useo-option-container">
	<div class="useo-option-detail"> Use top voted answer's content for Meta Descriptions for questions.</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_meta_desc_ans_enable" name="useo_meta_desc_ans_enable" <?php echo (qa_opt('useo_meta_desc_ans_enable') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_meta_desc_ans_enable"></label>
		</div>
	</div>
</div>
<h3 class="heading">Selected Answer Content for Meta Description</h3>
<div class="useo-option-container">
	<div class="useo-option-detail"> if this option is enabled content of best answer, or top voted answer will be used.</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_meta_desc_sel_ans_enable" name="useo_meta_desc_sel_ans_enable" <?php echo (qa_opt('useo_meta_desc_sel_ans_enable') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_meta_desc_sel_ans_enable"></label>
		</div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Length of automatic meta description:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input id="" class="useo-text" type="text" name="useo_meta_desc_length" value="<?php echo qa_opt('useo_meta_desc_length'); ?>">
			<div class="useo-option-recommended"> Recommended length is between 140 to 160 Characters </div>
		</div>
	</div>
</div>
<hr>
<h3 class="heading">Meta Tag Editor</h3>
<div class="useo-option-container">
	<div class="useo-option-detail"> Enable Meta Tag editor in questions</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_meta_editor_enable" name="useo_meta_editor_enable" <?php echo (qa_opt('useo_meta_editor_enable') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_meta_editor_enable"></label>
		</div>
	</div>
	<div class="useo-option-extra-detail">Enabling this option will add new fields to question page's sidebar to let you add custom meta descriptions.</div>
</div>
<hr>


