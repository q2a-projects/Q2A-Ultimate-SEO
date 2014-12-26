<h2 class="heading">Link Optimization</h2>
<h3 class="heading">internal Links</h3>
<div class="useo-option-container">
	<div class="useo-option-detail">
		Make internal links "Dofollow" to improve internal linking
	</div>
	<div class="useo-option-content">
		<div class="useo-checkbox-container">
		<input name="useo_links_internal_dofollow" id="useo_links_internal_dofollow" <?php echo (qa_opt('useo_links_internal_dofollow') ? ' checked="" ' : ''); ?> type="checkbox" class="useo-checkbox" value="1">
		<label for="useo_links_internal_dofollow"></label>
		</div>
		<div class="useo-option-recommended">
		* Recommended
		</div>
	</div>
</div>
<hr>
<h3 class="heading">External Links</h3>
<div class="useo-option-container">
	<div class="useo-option-header-content">
		Using Criteria in this section you can change the relation of links to certain sites. it's very useful to set friendly site's to "DoFollow" to pass them SEO Juice.
	</div>
	<div class="useo-option-header-content">
		<input type="button" value="add site" onclick="addNetworkSite()" class="useo-btn useo-right">
	</div>
	<div id="useo-link-criteria" class="useo-link-criteria">
	</div>
</div>
<?php
$relations = json_decode(qa_opt('useo_link_relations'),true);
if (is_array($relations)) {
	foreach($relations as $key => $value){
		$rel[$value['rel']] = 'selected=""';
		'selected=""';
		?>
		<div class="useo-option-container" id="useo-criteria-container">
			<div class="useo-option-detail">Criteria:</div>
			<div class="useo-option-content">
				<div class="useo-text-container">
					<input value="<?php echo @$value['url']; ?>" type="text" name="useo_link_url[]" placeholder="ie. http://website.com" class="useo-text" id="">
				</div>
			<div class="useo-list-container">
				<select name="useo_link_rel[]" class="useo-list">
					<option <?php echo @$rel[1]; ?> value="1">Nofollow</option>
					<option <?php echo @$rel[2]; ?> value="2">External</option>
					<option <?php echo @$rel[3]; ?> value="3">Nofollow - External</option>
					<option <?php echo @$rel[4]; ?> value="4">Dofollow</option>
				</select>
			</div>
			<div class="useo-button-container">
				<input type="button" value="Remove Criteria" onclick="remove_link_criteria(this)"></div>
			</div>
		</div>
		<?php
		$rel[$value['rel']] = '';
	}
}
?>
