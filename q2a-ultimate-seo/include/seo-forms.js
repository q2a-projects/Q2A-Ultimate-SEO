$(document).ready(function(){
	$("#useo_save_meta").click(function (e) {
		qa_show_waiting_after(document.getElementById('useo_buttons_container'), true);
		var metas = new Array();
		if($('#useo-meta-editor-title').val().length !== 0){
			var title = $('#useo-meta-editor-title').val();
		}
		if($('#useo-meta-editor-description').val().length !== 0){
			var description = $('#useo-meta-editor-description').val();
		}
		if($('#useo-meta-editor-keywords').val().length !== 0){
			var keywords = $('#useo-meta-editor-keywords').val();
		}
		var meta_info = JSON.stringify({title: title, description: description, keywords: keywords});
		$.ajax({
			url: useo_ajax_url,
			data: { action: "meta-save", postid: useo_postid,data: meta_info },
			type: "POST"
		}).done(function(data) {

			qa_hide_waiting(document.getElementById('useo_buttons_container'));
		});
		e.preventDefault();
	});

});