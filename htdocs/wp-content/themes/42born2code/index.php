<?php
global $userdata; get_currentuserinfo(); // grabs the user info and puts into vars
if ($userdata->first_name) : $name = $userdata->first_name;
else : $name = $userdata->user_login;
endif;
?>
<?php get_header() ?>
<div class="contentfull">
<br><center>
<?php if(is_user_logged_in()) : echo '<div class="page-title">Bienvenue à 42, ' . $name . '</div>'; ?>
<?php else : echo '<div class="page-title">Bienvenue à 42</div>'; endif ?>
<br></center>
	<center><img src="http://www.42.fr/wp-content/uploads/2013/03/rendu-exterieur-42.jpg" alt="Heart of Code" width="600px" height="400px"></center>
</div>
<?php get_footer() ?>
