<?php
$useo_url_q_uppercase_type[qa_opt('useo_url_q_uppercase_type')] = 'selected=""';
$useo_url_tag_uppercase_type[qa_opt('useo_url_tag_uppercase_type')] = 'selected=""';
$useo_url_words_raw = qa_opt('useo_url_words_raw');
?>
<h2>URL Customizer</h2>
<h3 class="heading">URL CleanUp</h3>
<div class="useo-option-container">
	<div class="useo-option-detail"> Enable URL CleanUp </div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_url_cleanup" class="useo-checkbox" <?php echo (qa_opt('useo_url_cleanup') ? ' checked="" ' : ''); ?>  type="checkbox" value="1" name="useo_url_cleanup">
			<label for="useo_url_cleanup"></label>
		</div>
	</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">
	<div class="useo-option-detail">remove these words from question's URL and links to question</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<textarea class="qa-form-tall-text" cols="40" rows="4" name="useo_url_words_raw"><?php echo $useo_url_words_raw; ?></textarea>
		</div>
	</div>
	<div class="useo-option-extra-detail">You can separate words by commas, spaces, or new line.</div>
</div>
<div id="useo-criteria-container" class="useo-option-container">	
	<div class="useo-option-detail"> Use original URL if it's going to be empty after clean up </div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_url_dont_make_empty" name="useo_url_dont_make_empty" <?php echo (qa_opt('useo_url_dont_make_empty') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_url_dont_make_empty"></label>
		</div>
		<div class="useo-option-recommended"> * Recommended </div>
	</div>

</div>
<hr>
<h3 class="heading">URL Customizations</h3>
<div class="useo-option-container">
	<div class="useo-option-detail"> Uppercase Question URL</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_url_q_uppercase" name="useo_url_q_uppercase" <?php echo (qa_opt('useo_url_q_uppercase') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_url_q_uppercase"></label>
		</div>
	</div>
	<div class="useo-option-detail"> Uppercase type</div>
	<div class="useo-list-container">
		<select name="useo_url_q_uppercase_type" class="useo-list">
			<option <?php echo @$useo_url_q_uppercase_type[1]; ?> value="1">First word's first letter</option>
			<option <?php echo @$useo_url_q_uppercase_type[2]; ?> value="2">all word's first letter</option>
			<option <?php echo @$useo_url_q_uppercase_type[3]; ?> value="3">all letters in title</option>
		</select>
	</div>

</div>
<div class="useo-option-container">
	<div class="useo-option-detail"> Uppercase Tag URL</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
			<input id="useo_url_tag_uppercase" name="useo_url_tag_uppercase" <?php echo (qa_opt('useo_url_tag_uppercase') ? ' checked="" ' : ''); ?> class="useo-checkbox" type="checkbox" value="1">
			<label for="useo_url_tag_uppercase"></label>
		</div>
	</div>
	<div class="useo-option-detail"> Uppercase type</div>
	<div class="useo-list-container">
		<select name="useo_url_tag_uppercase_type" class="useo-list">
			<option <?php echo @$useo_url_tag_uppercase_type[1]; ?> value="1">First word's first letter</option>
			<option <?php echo @$useo_url_tag_uppercase_type[2]; ?> value="2">all word's first letter</option>
			<option <?php echo @$useo_url_tag_uppercase_type[3]; ?> value="3">all letters in title</option>
		</select>
	</div>

</div>
 