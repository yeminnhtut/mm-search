<?php

function mm_search_settings() {

	if(isset($_POST) && isset($_POST['submit']))
	{
		update_option(OPTION_WRITTEN_FONT, $_POST['font']);
	}

	?>

	<div class="settings-main" style="font-size: 1.1em">
		<h2>MM Search Settings</h2>
		<hr>

		<form action="admin.php?page=mm-search-settings" method="post" style="margin-top: 40px;">
			<table>
				<tr>
					<td rowspan="2" style="padding: 8px 8px 8px 0;">
						Posts are written in
					</td>
					<td>
						<input type="radio" name="font" value="<?php echo OPTION_ZAWGYI ?>" 
						<?php if(get_option(OPTION_WRITTEN_FONT, OPTION_ZAWGYI)==OPTION_ZAWGYI) echo 'checked'?>> Zawgyi<br>
					</td>
				</tr>
				<tr>
					<td><input type="radio" name="font" value="<?php echo OPTION_UNICODE ?>"
						<?php if(get_option(OPTION_WRITTEN_FONT, OPTION_ZAWGYI)==OPTION_UNICODE) echo 'checked'?>> Unicode<br></td>
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