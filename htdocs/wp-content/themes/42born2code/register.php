<?php
/*
Template Name: Register Page
*/
?>
<?php get_header() ?>
<div id="contentfull">
	<div class="entry-wide">
	<h2 class="page-title">Pré-insription</h2>
		<span><b>Rejoins-nous et tente ta chance !</b></span>
		<div id="register-form">
		<form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
		<input type="text" name="user_login" value="Login" id="user_login" class="input" />
		<input type="text" name="user_email" value="E-Mail" id="user_email" class="input"  />
		<?php do_action('register_form'); ?>
		<input type="submit" value="Register" id="register" />
		<hr />
		<p class="statement">Un mot de passe vous sera envoyé.</p>
		</form>
		</div>
	</div>
</div><!-- #contentfull -->
<?php get_footer() ?>
