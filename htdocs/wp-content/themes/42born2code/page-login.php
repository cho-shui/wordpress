<?php
/*
Template Name: Zone de connexion
*/
?>
<?php if(is_user_logged_in()) : wp_redirect('?page_id=108'); exit; ?>
<?php else: ?>
<?php get_header() ?>
<div id="wrapper">
	<div id="container">
		<div id="contentfull">
			<div class="entry-wide">
				<h2 class="page-title"><?php the_title() ?></h2>
				<div class="entry-content">
				<?php the_content() ?>
				<?php wp_login_form(); endif ?>
				</div>
			</div><!-- entry -->
		</div><!-- #contentfull -->
	</div><!-- #container -->
</div><!-- #wrapper -->
<?php get_footer() ?>
