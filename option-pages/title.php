<?php
/*
qa_lang_html('main/recent_qs_title')
hot_qs_title
voted_qs_title
answered_qs_title
unanswered_qs_title
unselected_qs_title
recent_activity_title
browse_categories
recent_qs_as_in_x
popular_tags
user_x
*/
?>
<h2 class="heading">Page Title</h2>
<div class="useo-option-header-content">
	Page Title options let you customize page titles based on available variables in each page or any custom text you like.
	to set them to default leave the field empty.
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Home Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_qa'); ?>" name="useo_title_qa" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Question's Item Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_qa_item'); ?>" name="useo_title_qa_item" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%question-title%</strong>, <strong>%category-name%</strong>
	<div class="useo-option-recommended"> Recommended Title while using categories: <strong>%category-name%: %question-title%</strong></div>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Question's List Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_recent'); ?>" name="useo_title_recent" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%recent-qs-title%</strong>, <strong>%category-name%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Hot Questions Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_hot'); ?>" name="useo_title_hot" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%hot-qs-title%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Most Voted Questions Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_voted'); ?>" name="useo_title_voted" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%voted-qs-title%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Most answered questions" Page:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_answered'); ?>" name="useo_title_answered" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%answered-qs-title%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Most viewed questions" Page:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_viewed'); ?>" name="useo_title_viewed" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%viewed-qs-title%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Unanswered Questions" Page:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_unanswered'); ?>" name="useo_title_unanswered" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%unanswered-qs-title%</strong>, <strong>%category-name%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "No selected answer" Page:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_unselected'); ?>" name="useo_title_unselected" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%unselected-qs-title%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "No upvoted answer" Page:</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_unupvoted'); ?>" name="useo_title_unupvoted" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%unupvoteda-qs-title%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Activity Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_activity'); ?>" name="useo_title_activity" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%recent-activity-title%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Ask Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_ask'); ?>" name="useo_title_ask" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%ask-title%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Categories Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_categories'); ?>" name="useo_title_categories" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%browse-categories%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Categories Item Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_category'); ?>" name="useo_title_category" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%recent-qs-as-in-x%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Tags List Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_tags'); ?>" name="useo_title_tags" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%popular-tags%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Tag Item Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_tag'); ?>" name="useo_title_tag" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%questions-tagged-x%</strong>, <strong>%current-tag%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "Search Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_search'); ?>" name="useo_title_search" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%results-for-x%</strong>, <strong>%current-term%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "User's List Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_users'); ?>" name="useo_title_users" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%highest-users%</strong>
  </div>
</div>
<hr>
<div class="useo-option-container">
	<div class="useo-option-detail">Title for "User's Profile Page":</div>
	<div class="useo-option-content">
		<div class="useo-text-container">
			<input type="text" value="<?php echo qa_opt('useo_title_user'); ?>" name="useo_title_user" class="useo-text" id="">
		</div>
	</div>
  <div class="useo-option-extra-detail">
	available title variables for this page: <strong>%site-title%</strong>, <strong>%user-x%</strong>, <strong>%current-user%</strong>
  </div>
</div>
