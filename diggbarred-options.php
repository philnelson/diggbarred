
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
<h2>Diggbarred Settings</h2>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<h3>General Settings</h3>
<table class="form-table">
	<tr valign="top">
		<th><label for="diggbarred_message">Your Message: </label></th>
		<td>
			<input name="diggbarred_message" id="diggbarred_message" type="text" value="<?php echo get_option('diggbarred_message'); ?>" class="regular-text" />
		</td>
	</tr>
</table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="diggbarred_message" />
<p class="submit">
	<input type="submit" name="submit" class="button-primary" value="Save Changes" />
</p>
</form>
</div>