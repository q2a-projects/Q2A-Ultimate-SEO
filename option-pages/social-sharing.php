<?php
$useo_social_schema_page_type[qa_opt('useo_social_schema_page_type')] = 'selected=""';
?>
<h2 class="heading">Social Sharing Meta Tags</h2>
<div class="useo-option-header-content">Social Sharing Meta Tags are used by social networks such as Facebook, Twitter, Google+ to generate content for shared pages link.</div>
<h3 class="heading">Open Graph(FaceBook)</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">Auto Generate Open Graph from Page content</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_social_og_enable_auto" name="useo_social_og_enable_auto" <?php echo (qa_opt('useo_social_og_enable_auto') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_social_og_enable_auto"></label>
		</div>
		<div class="useo-option-recommended"> * Recommended </div>
	</div>
	<div class="useo-option-extra-detail">By Activating this option Open Graph will be automatically be generated from question title and meta description</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Length of description content</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input id="useo_social_og_desc_length" class="useo-text" type="text" name="useo_social_og_desc_length" value="<?php echo qa_opt('useo_social_og_desc_length'); ?>">
			<div class="useo-option-recommended"> Recommended length is between 100 to 140 Characters </div>
		</div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Image URL</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input id="useo_social_og_image" class="useo-text" type="text" name="useo_social_og_image" value="<?php echo qa_opt('useo_social_og_image'); ?>">
			<div class="useo-option-recommended"> Recommended image size is 200px × 200px or 316px × 316px </div>
		</div>
	</div>
</div>
<hr>
<h3 class="heading">Twitter Card</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">Enable Twitter Cards meta tag</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_social_tc_enable" name="useo_social_tc_enable" <?php echo (qa_opt('useo_social_tc_enable') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_social_tc_enable"></label>
		</div>
		<div class="useo-option-recommended"> * Recommended </div>
	</div>
	<div class="useo-option-extra-detail">By Activating this option Twitter Cards will be automatically be generated from question title and meta description</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Length of description content for tweets</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input id="useo_social_tc_desc_length" class="useo-text" type="text" name="useo_social_tc_desc_length" value="<?php echo qa_opt('useo_social_tc_desc_length'); ?>">
			<div class="useo-option-recommended"> Recommended length is between 120 to 130 Characters </div>
		</div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Tweet Image URL</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input id="useo_social_tc_image" class="useo-text" type="text" name="useo_social_tc_image" value="<?php echo qa_opt('useo_social_tc_image'); ?>">
			<div class="useo-option-recommended"> Image must be larger than 120px × 120px and less than 1MB. it will be cropped to create a square thumbnail. </div>
		</div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Website's Twitter handler</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input id="useo_social_tc_handler" class="useo-text" type="text" name="useo_social_tc_handler" value="<?php echo qa_opt('useo_social_tc_handler'); ?>">
		</div>
	</div>
	<div class="useo-option-extra-detail">you can add your website's Twitter Handler(with "@" at the beginning such as @q2a_themes) to include in the twitter cards</div>
</div>

<hr>
<h3 class="heading">Google+ Schemas</h3>
<div class="useo-option-header-content">if Open Graph is activated on the page they will be used by Google+. How ever adding "Schema.org's microdata" can give Google+ a better understanding of your page and if it will be used by Google+.</div>
<div class="useo-option-container">
	<div class="useo-option-detail">Enable Google+ Schema meta tags</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_social_schema_enable" name="useo_social_schema_enable" <?php echo (qa_opt('useo_social_schema_enable') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_social_schema_enable"></label>
		</div>
	</div>
	<div class="useo-option-extra-detail">By Activating this option Google+ Schema meta tags will be automatically be generated from question title and meta description</div>
</div>
<div class="useo-option-container">
	<div class="useo-option-detail">Page Type</div>
	<div class="useo-list-container">
		<select class="useo-list" name="useo_social_schema_page_type">
			<option <?php echo @$useo_social_schema_page_type[1]; ?> value="1">None</option>
			<option <?php echo @$useo_social_schema_page_type[2]; ?> value="2">Question</option>
			<option <?php echo @$useo_social_schema_page_type[3]; ?> value="3">Article</option>
		</select>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">Google+ thumbnail image</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input id="" class="useo-text" type="text" name="useo_social_gp_thumbnail" value="<?php echo qa_opt('useo_social_gp_thumbnail'); ?>">
			<div class="useo-option-recommended"> Recommended image size is 250px × 250px </div>
		</div>
	</div>
</div>


<hr>
<h3 class="heading">Meta Tag Editor</h3>
<div class="useo-option-container">
	<div class="useo-option-detail"> Enable Meta Tag editor in questions</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_social_enable_editor" name="useo_social_enable_editor" <?php echo (qa_opt('useo_social_enable_editor') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_social_enable_editor"></label>
		</div>
	</div>
	<div class="useo-option-extra-detail">Enabling this option will add new fields to question page's sidebar to let you add custom meta descriptions.</div>
</div>


