<?php
global $userdata; get_currentuserinfo(); // grabs the user info and puts into vars
if ($userdata->first_name) : $name = $userdata->first_name;
else : $name = $userdata->user_login;
endif;
?>
<?php get_header() ?>
<div class="contentfull">
<br><center>
<?php if(isset($_GET['getok'])) {?>
<script>
function register_close() {
		 var register = document.getElementById('register');register.style.display = ( register.style.display=='block') ? 'none':'block';
}
</script>
<div id="register" style="background-color:rgba(0,0,0,.6);top:0;left:0;bottom:0;right:0;width:100%;position:fixed;">
<div style="margin:0 auto;width:500px;height:200px;padding:50px;border:1px solid black;background:grey;">
Inscription ok<br />
<input type="button" value="fermer" onclick="register_close()">
</div>
</div>
<?php } ?>
<?php if(is_user_logged_in()) : echo '<div class="page-title">Bienvenue à 42, ' . $name . '</div>'; ?>
<?php else : echo '<div class="page-title">Bienvenue à 42</div>'; endif ?>
<br></center>
	<center><img src="http://www.42.fr/wp-content/uploads/2013/03/rendu-exterieur-42.jpg" alt="Heart of Code" width="600px" height="400px"></center>
</div>
<?php get_footer() ?>
