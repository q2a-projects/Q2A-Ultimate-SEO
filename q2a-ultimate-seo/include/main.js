$(document).ready(function(){
	$("#verticalTab").easyResponsiveTabs({
	   type: "vertical",
	   width: "auto",
	   fit: true
	});

});

var next_link_criteria = 1;
function addNetworkSite(){
	jQuery("#useo-link-criteria").append('<div class="useo-option-container" id="useo-criteria-container"><div class="useo-option-detail">Criteria:</div><div class="useo-option-content"><div class="useo-text-container"><input type="text" name="useo_link_url[]" placeholder="ie. http://website.com" class="useo-text" id=""></div><div class="useo-list-container"><select name="useo_link_rel[]" class="useo-list"><option value="1">Nofollow</option><option value="2">External</option><option value="3">Nofollow - External</option><option value="4" selected="">Dofollow</option></select></div><div class="useo-button-container"><input type="button" value="Remove Criteria" onclick="remove_link_criteria(this)"></div></div></div>');
}
function remove_link_criteria(e){
	$(e).parents('#useo-criteria-container').remove();
}