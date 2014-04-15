<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="text" value="<?php _e("Recherche"); ?>" name="s" id="searchbox" onfocus="if (this.value == '<?php _e("Recherche"); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Recherche"); ?>';}" />
	<input type="submit" id="searchsubmit" value="<?php _e("0k"); ?>" />
</form>
