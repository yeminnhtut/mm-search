<?php

function mm_search_settings() {

	if(isset($_POST) && current_user_can('manage_options') && wp_verify_nonce($_POST['mm-search-update-option'], 'update-action') && isset($_POST['submit']))
	{
		update_option(MM_SEARCH_OPTION_WRITTEN_FONT, sanitize_text_field(wp_unslash($_POST['font'])));
	}

	?>

	<div class="settings-main" style="font-size: 1.1em">
		<h2>MM Search Settings</h2>
		<hr>

		<form action="admin.php?page=mm-search-settings" method="post" style="margin-top: 40px;">
			<?php wp_nonce_field('update-action', 'mm-search-update-option'); ?>
			<table>
				<tr>
					<td rowspan="2" style="padding: 8px 8px 8px 0;">
						Posts are written in
					</td>
					<td>
						<input type="radio" name="font" value="<?php echo MM_SEARCH_OPTION_ZAWGYI ?>" 
						<?php if(get_option(MM_SEARCH_OPTION_WRITTEN_FONT, MM_SEARCH_OPTION_ZAWGYI)==MM_SEARCH_OPTION_ZAWGYI) echo 'checked'?>>Zawgyi<br>
					</td>
				</tr>
				<tr>
					<td><input type="radio" name="font" value="<?php echo MM_SEARCH_OPTION_UNICODE ?>"
						<?php if(get_option(MM_SEARCH_OPTION_WRITTEN_FONT, MM_SEARCH_OPTION_ZAWGYI)==MM_SEARCH_OPTION_UNICODE) echo 'checked'?>>Unicode<br></td>
				</tr>
				<tr>
					<td style="padding-top: 40px;">
						<input type="submit" name="submit" class="button button-primary" value="<?php _e('Save Changes') ?>" />
					</td>
				</tr>
			</table>
		</form>
	</div>
	<?php
}