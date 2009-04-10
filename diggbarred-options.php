
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
			<textarea name="diggbarred_message" rows="5" cols="50" id="diggbarred_message" type="text"><?php echo get_option('diggbarred_message'); ?></textarea>
		</td>
	</tr>
	<tr valign="top">
		<th><label for="diggbarred_style">Message Style: </label><p style="font-size:10px; color: #666;">This will be applied to the &lt;div&gt; element that contains your message.</p></th>
		<td>
			<textarea name="diggbarred_style" id="diggbarred_style" rows="5" cols="50" type="text"><?php echo get_option('diggbarred_style'); ?></textarea>
		</td>
	</tr>
</table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="diggbarred_message, diggbarred_style" />
<p class="submit">
	<input type="submit" name="submit" class="button-primary" value="Save Changes" />
</p>
</form>
</div>