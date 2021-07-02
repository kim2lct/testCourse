

<div class="course">
	<div class="course-wrapper wrap">
		<h1>Course Scrape API</h1>
		<form action="" method="POST">
			<table class="form-table">
				<tbody>
					<tr>
	<th scope="row"><label for="link">Scrape URL</label></th>
	<td><input name="url" type="text" id="url" value="<?=$url ?>" class="regular-text" required></td>
</tr>
				</tbody>
			</table>
			<?php submit_button(__('Import','pxa')); ?>	
		</form> <!-- end form -->
	</div> <!-- end wrap -->
</div>

<?php 

	$url = (isset($_POST['url'])?$_POST['url']:'');
	if(isset($_POST['submit']))
		$this->scrape_api($url);
 ?>