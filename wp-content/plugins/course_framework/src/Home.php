
<!-- Header -->
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css
">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	
	
		<div class="main_menu">
			<div class="logo">
				<a href="<?=home_url()?>">
				<?php $logo = (get_option('logo'))?get_option('logo'):''; ?>
				<?php if($logo): ?>
					<img src="<?=$logo?>" alt="logo">
				<?php else :  ?>
					<p>Logo Course</p>
				<?php endif; ?>
				</a>
			</div>
			<div class="category_search">
				<div class="categories flex">
					<button>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
</svg>
</button>
<span>Categories</span>
				<div class="categories_menu hidden">
					<?php  
					wp_nav_menu( array(
					    'menu' => 'categories'
					) );
					?>
				</div>
				</div>
				<div class="search">
					<form id="searchform" method="get" action="<?php echo home_url('/'); ?>">
					<input type="text" name="s" value="<?php the_search_query(); ?>">
					<button class="btn"><svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
					<input type="hidden" name="post_type" value="post" />
					</form>
				</div>
			</div>
			<div class="menu_primary">
				<?php 
					wp_nav_menu( array(
					    'menu' => 'primary'
					) );
					wp_nav_menu( array(
					    'menu' => 'login'
					) );
				 ?>
			</div>
		</div>	
			<main id="main" role="main">
				<?php 
				 
				 $id = get_the_ID();
				 $meta = get_post_custom($id);
				 $rating_top = ($meta['rating_top'][0]?$meta['rating_top'][0]:'');	 
				 $course_objectives = ($meta['course_objectives'][0]?$meta['course_objectives'][0]:'');	 
				 $left_banner = ($meta['left_banner'][0]?$meta['left_banner'][0]:'');	 
				 $request_for_quotation_ = ($meta['request_for_quotation_'][0]?$meta['request_for_quotation_'][0]:'');	 
				 $profile_user = ($meta['profile_user'][0]?$meta['profile_user'][0]:'');	 
				 $title_user = ($meta['title_user'][0]?$meta['title_user'][0]:'');	 
				 $rating_user = ($meta['rating_user'][0]?$meta['rating_user'][0]:'');	 
				 $user_description = ($meta['user_description'][0]?$meta['user_description'][0]:'');	 
				 $link_user = ($meta['link_user'][0]?$meta['link_user'][0]:'');	 
				 ?>
				<div class="bfr_banner">
					<div class="live_training">
						<a href="https://quorse.com/live-virtual-training/">Live Virtual Training (Most Popular!)</a>
					</div>
				</div>
				<?php $banner = (get_option('banner'))?get_option('banner'):''; ?>
				<div class="banner" style="background-image: url(<?=($banner?$banner:'') ?>);">
					<div class="container">
					<div class="breadcrumb">
							<span><a href="https://quorse.com/live-virtual-training/">Live Virtual Training (Most Popular!)</a></span>
							<span> > </span>
							<span>Supplier Quality Management (Online Training)</span>						
					</div>	
					<div class="title">
						<h1><?php the_title() ?></h1>
					</div>
					<?php if($rating_top) : ?>
					<div class="rating"><?=PXA\Application\Helper::rating($rating_top)?><span><?=$rating_top[0]?></span></div>
				<?php endif; ?>
					</div>
				</div>

				<div class="course_objective">
					<div class="container">
						<div class="flex">
							<div class="left">
							<?=wpautop($course_objectives)?>
							</div>
							<div class="right">
								<div class="wrapper">
							<?=$left_banner?>
							</div>
							<div class="request">
								<a href="<?=$request_for_quotation_ ?>">Request For Questation</a>
							</div>
							<div class="term">
								*T&C Applies
							</div>
							</div>
							
						</div>
						</div>
					</div>
					<div class="know_trainer">
						<div class="container">
						<h2 class="text-bold">Get To Know The Trainer</h2>
						<div class="profile">
							<div class="photo_trainer">
								<img src="<?=wp_get_attachment_image_url($profile_user) ?>" alt="trainer">								
							</div>
							<div class="trainer_desc">
								<h3>Trainer <?=$title_user?></h3>
								<div class="rating"><?=PXA\Application\Helper::rating($rating_user)?><span><?=$rating_user[0]?></span></div>
								<div class="desc"><?=wpautop($user_description)?></div>
								<a href="<?=$link_user?>">View Profile</a>
							</div>
						</div>
						</div>
					</div>
					<?= PXA\Application\Helper::course(4); ?>
					<div class="question_search">
						<?php 
						$placeholder_search = (get_option('placeholder_search'))?get_option('placeholder_search'):'';
						$qs_banner = (get_option('qs_banner'))?get_option('qs_banner'):''; 
						$special_content = (get_option('special_content'))?get_option('special_content'):'';
						?>						
						<div class="qs_banner text-center" style="background-image: url(<?=$qs_banner ?>);">
							<div class="container">
							<div class="qs_desc">
								<?= wpautop($special_content)?>
							</div>
							<form class="qs_search" method="POST">
								<input type="text" name="s" placeholder="<?=$placeholder_search?>">
								<input type="submit" value="Start Searching">
								<input type="hidden" name="post_type" value="post" />
							</form>
						</div>
						</div>

					</div>


<!-- Footer -->

			</main><!-- #main -->		

	<footer id="colophon" role="footer-info">
		<?php $copyright = (get_option('copyright'))?get_option('copyright'):''; ?>
		<div class="container">
		<div class="footer flex">
			<div class="desc_footer">
				<?php dynamic_sidebar('footer') ?>
			</div>
			<div class="menu_footer flex">
				<div class="main">
					<h3>Main</h3>
					<?php wp_nav_menu( array(
					    'menu' => 'main'
					) ); ?>
				</div>
				<div class="main">
					<h3>Legal</h3>
					<?php wp_nav_menu( array(
					    'menu' => 'legal'
					) ); ?>
				</div>
			</div>
			<div class="social_media">
				<?php dynamic_sidebar('social-sidebar') ?>
			</div>
		</div>
		<div class="copyright">
			<?=$copyright?$copyright:'All contents 2021. All rights reserved.'?>
		</div>
	</footer><!-- #colophon -->
	</div>

</div><!-- #page -->
<script defer="">
	categories = document.querySelector('.categories');	
	categories.addEventListener('click',e=>{
		document.querySelector('.categories_menu').classList.toggle('hidden');
	})
</script>
<?php wp_footer(); ?>

</body>
</html>

