<?php

function mm_search_about_page() {
	?>

	<div class="about">
		<h1>MM Search</h1>
		<h4>Version <?php echo MM_SEARCH_VERSION; ?></h4>

		<div class="description">
			<h3 style="margin-top: 50px;">Description</h3>
			<hr>
			<p style="font-style: normal !important;">
				MM Search is a simple WordPress search plugin for Myanmar language that works with both Unicode and Zawgyi.
			</p>
		</div>

		<div class="credit">
			<h3 style="margin-top: 30px;">Credit</h3>
			<hr>
			<table>
				<tr>
					<td>
						<a href="https://github.com/Rabbit-Converter/Rabbit" style="text-decoration: none;"><b>Rabbit Converter</b></a>
					</td>
					<td style="padding-top:10px;padding-bottom: 10px; padding-left: 10px;">
						For Zawgyi <> Unicode Conversion
					</td>
				</tr>
				<tr>
					<td>
						<a href="https://github.com/htoomyintnaung/mmtext" style="text-decoration: none;"><b>MMText</b></a>
					</td>
					<td style="padding-left: 10px;">
						For detecting Zawgyi
					</td>
				</tr>
			</table>
			</p>
		</div>
		<hr>
		<div class="developer">
			<p>Developed by <a href="https://www.facebook.com/iamyeminhtut" style="text-decoration: none;">Ye Min Htut</a></p>
		</div>
	</div>

	<?php
}