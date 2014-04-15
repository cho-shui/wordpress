<?php
/*
Template Name: Espace candidat
 */
$wpdb->hide_errors(); auth_redirect_login(); nocache_headers();
global $userdata; get_currentuserinfo(); // grabs the user info and puts into vars
// check to see if the form has been posted. If so, validate the fields
if(!empty($_POST['action']))
{
require_once(ABSPATH . 'wp-admin/includes/user.php');
require_once(ABSPATH . WPINC . '/registration.php');
check_admin_referer('update-profile_' . $user_ID);
$errors = edit_user($user_ID);
if ( is_wp_error( $errors ) ) {
foreach( $errors->get_error_messages() as $message )
$errmsg = "$message";
//exit;
}
// if there are no errors, then process the ad updates
if($errmsg == '')
{
do_action('personal_options_update');
$d_url = $_POST['dashboard_url'];
wp_redirect( get_option("siteurl").'?page_id='.$post->ID.'&updated=true' );
}
else {
$errmsg = '<div class="box-red">** ' . $errmsg . ' **</div>';
$errcolor = 'style="background-color:#FFEBE8;border:1px solid #CC0000;"';
}
}
?>
<?php get_header() ?>
<div id="container">
	<div id="contentfull">
		<div id="entry-wide">
		<h2 class="page-title">Espace candidat</h2>
			<div class="entry-content">
			<h2 class="h2top"><?php echo $GLOBALS['_LANG']['_accinfo']; ?></h2>

<?php if ( isset($_GET['updated']) ) {
	$d_url = $_GET['d'];?>
	<p class="message"><?php _e('Your profile has been updated.','cp')?></p>
<?php } ?>
<?php echo $errmsg; ?>
<form name="profile" action="" method="post">
<?php wp_nonce_field('update-profile_' . $user_ID) ?>
<input type="hidden" name="from" value="profile" />
<input type="hidden" name="action" value="update" />
<input type="hidden" name="checkuser_id" value="<?php echo $user_ID ?>" />
<input type="hidden" name="dashboard_url" value="<?php echo get_option("dashboard_url"); ?>" />
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
<table class="form-table" style="640px;">
<tr>
<th><label for="user_login"><?php _e('Login','cp'); ?></label></th>
<td><input type="text" name="user_login" class="mid2" id="user_login" value="<?php echo $userdata->user_login; ?>" size="35" maxlength="100" disabled /></td>
</tr>
<tr>
<th><label for="first_name"><?php _e('Prénom','cp') ?></label></th>
<td><input type="text" name="first_name" class="mid2" id="first_name" value="<?php echo $userdata->first_name ?>" size="35" maxlength="100" /></td>
</tr>
<tr>
<th><label for="last_name"><?php _e('Nom','cp') ?></label></th>
<td><input type="text" name="last_name" class="mid2" id="last_name" value="<?php echo $userdata->last_name ?>" size="35" maxlength="100" /></td>
</tr>
<tr>
<th><label for="email"><?php _e('Email','cp') ?></label></th>
<td><input type="text" name="email" class="mid2" id="email" value="<?php echo $userdata->user_email ?>" size="35" maxlength="100" /></td>
</tr>
<tr>
<th><label for="url"> Website URL</label></th>
<td><input type="text" name="url" class="mid2" id="url" value="<?php echo $userdata->user_url ?>" size="35" maxlength="100" /></td>
</tr>
<tr>
<th><label for="description"><?php echo $GLOBALS['_LANG']['_accme']; ?></label></th>
<td><textarea name="description" class="mid2" id="description" rows="8" cols="50"><?php echo $userdata->description ?></textarea></td>
</tr>
<tr>
<th><label for="description">Resume</label></th>
<input type="submit" class="button" value="Update Profile" name="submit" />
<br>
<br>
<?php
	$value = get_cimyFieldValue($user_ID, 'RESUME');
?>
	<td><textarea name="resume" class="mid2" id="resume" rows="8" cols="50"><?php echo cimy_uef_sanitize_content($value); ?></textarea></td>
</tr>
</table>
<p class="CheckoutBtn"><?php _e('Update Profile »', 'cp')?></p>

<!--<h2 class="h2top">Personal Information </h2>
<table class="form-table" style="640px;">-->
<?php
	do_action('profile_personal_options');
?>
<!--</table>-->
<h2 class="h2top"><?php echo $GLOBALS['_LANG']['_password']; ?></h2>
<table class="form-table" style="640px;">

<?php
	$show_password_fields = apply_filters('show_password_fields', true);
	if ( $show_password_fields ) :
?>
<tr>
<th><label for="pass1"><?php _e('New Password','cp'); ?></label></th>
<td>
<input type="password" name="pass1" class="mid2" id="pass1" size="35" maxlength="50" value="" />
<small><?php _e('Leave this field blank unless you\'d like to change your password.','cp'); ?></small>
</td>
</tr>
<tr>
<th><label for="pass1"><?php _e('Password Again','cp'); ?></label></th>
<td>
<input type="password" name="pass2" class="mid2" id="pass2" size="35" maxlength="50" value="" />
<small><?php _e('Type your new password again.','cp'); ?></small></td>
</tr>
<tr>
</tr>
<?php endif; ?>
</table>

	<p class="CheckoutBtn"><?php _e('Update Profile »', 'cp')?></p>
<?php
		if(function_exists('userphoto_exists')){
			echo '<h2 class="h2top">Website Photo </h2>
				';
			do_action('show_user_profile');

			echo "<div id='user-photo'>";
			if(userphoto_exists($user_ID))
				userphoto($user_ID);
			else
				echo get_avatar($userdata->user_email, 96);
			echo "</div>";
?>
<?php if($userdata->userphoto_image_file): ?>
<table class="form-table" style="640px;">
<tr>
<th> </th>
<td>
<p><label><input type="checkbox" name="userphoto_delete" id="userphoto_delete" /> <?php _e('Delete existing photo?','cp') ?></label></p>
</td>
</tr>
</table>
<?php endif; ?>
<p class="CheckoutBtn"><?php _e('Update Profile »', 'cp')?></p>
<?php } ?>
</form>
			</div>
		</div>
	</div>
</div>
<?php get_footer() ?>
