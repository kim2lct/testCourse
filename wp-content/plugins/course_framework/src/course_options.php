<?php 

$logo = (get_option('logo'))?get_option('logo'):'';
$banner = (get_option('banner'))?get_option('banner'):'';
$copyright = (get_option('copyright'))?get_option('copyright'):'';
$special_content = (get_option('special_content'))?get_option('special_content'):'';
$placeholder_search = (get_option('placeholder_search'))?get_option('placeholder_search'):'';
$qs_banner = (get_option('qs_banner'))?get_option('qs_banner'):'';

$id = get_the_ID();				
$value = isset($post_meta[0])?$post_meta[0]:'';		
$upload_link = esc_url( get_upload_iframe_src( 'image', $id ) );
	

?>

<style>
	a.browse-img {
    padding: 10px 12px;
    background: #e2e2e2;
    color: #000;
    text-decoration: none;
    border-radius: 5px;
    box-shadow: 0 0 2px #0000007d;
}

.pxa-metabox input.images-metabox{
	display: block;
	margin-left:10px;
	width: 	600px;

}
</style>

<div class="course">
	<div class="course-wrapper wrap">
		<h1>Setting API</h1>
		<form action="options.php" method="POST">
			<?php settings_fields( 'course_options' ); ?>
			<?php do_settings_sections( 'course_options' ); ?>
		<table class="form-table">
			<tbody>
				<tr>
<th scope="row"><label for="logo">Logo</label></th>
<td class="pxa_course">
	<div class="custom-img-container">		
		<p class="hide-if-no-js pxa_metabox_hide_if_no_js">
		<a class="browse-img upload-custom-img" data-image="logo" href="<?=$upload_link?>">Browser Image</a>		
		<input class="regular-text images-metabox" id="logo" name="logo" type="text" value="<?=$logo ?>">	
		</p>		
		<?php 
				if ( $logo ){ ?>
			    	<img class="image_pxa" src="<?=$logo?>" alt="" style="max-width:100px"/>
			    <?php  }
			 ?>
</td>
</tr><tr>
<th scope="row"><label for="banner">Default Banner</label></th>
<td class="pxa_course">
	<div class="custom-img-container">		
		<p class="hide-if-no-js pxa_metabox_hide_if_no_js">
		<a class="browse-img upload-custom-img" data-image="banner" href="<?=$upload_link?>">Browser Image</a>		
		<input class="regular-text images-metabox" name="banner" id="banner" type="text" value="<?=$banner ?>">	
		</p>
		<?php 
				if ( $banner ){ ?>
			    	<img class="image_pxa" src="<?=$banner?>" alt="" style="max-width:100px"/>
			    <?php  }
			 ?>
</td>
</tr>
<tr>
	<th scope="row"><label for="copyright">Copyright</label></th>
	<td><input name="copyright" type="text" id="copyright" aria-describedby="tagline-description" value="<?=$copyright ?>" class="regular-text"></td>
</tr><tr>
	<th scope="row"><label for="searching">Searching</label></th>
	<td><?=wp_editor( $special_content, 'special_content')?></td>
</tr>
<tr>
	<th scope="row"><label for="placeholder_search">Placehoder Search</label></th>
	<td><input name="placeholder_search" type="text" id="placeholder_search" aria-describedby="tagline-description" value="<?=$placeholder_search ?>" class="regular-text"></td>
</tr>
<tr>
<th scope="row"><label for="qs_banner">QS Banner</label></th>
<td class="pxa_course">
	<div class="custom-img-container">		
		<p class="hide-if-no-js pxa_metabox_hide_if_no_js">
		<a class="browse-img upload-custom-img" data-image="qs_banner" href="<?=$upload_link?>">Browser Image</a>		
		<input class="regular-text images-metabox" name="qs_banner" id="qs_banner" type="text" value="<?=$qs_banner ?>">	
		</p>
		<?php 
				if ( $banner ){ ?>
			    	<img class="image_pxa" src="<?=$qs_banner?>" alt="" style="max-width:100px"/>
			    <?php  }
			 ?>
</td>
</tr>
			</tbody>
		</table>

				<?php submit_button(); ?>	
		
		</form> <!-- end form -->
	</div> <!-- end wrap -->
</div>