<div id="sidebar">
	<ul class="xoxo">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : // begin first sidebar widgets ?>
		<?php wp_list_bookmarks('title_before=<h3 class="widget-title">&title_after=</h3>&show_images=0') // Ici les widgets s'ajoutent ?>
		<?php endif; // end first sidebar widgets ?>
	</ul>
</div><!-- #sidebar -->
