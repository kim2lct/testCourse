<?php 

namespace PXA\Application;

class Helper{
	public static function rating($number){
		for($i = 1;$i<=5;$i++){
								if($i <= $number):?>
									<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="currentColor">
  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
</svg>
									
<?php 
								else : ?> 

									<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
</svg>
								<?php endif;								
						} 
	}

	public static function course($post){ 
		$args = [
			'post_type'=>'post',
			'posts_per_page'=>4,
			'post_status'=>'publish'
		];
		$posts = new \WP_Query($args);		
		?>
		<div class="container">
			<h3 class="text-bold text-center">Courses you may like</h3>
			<div class="course_box">
				<?php if($posts->have_posts()) : ?>
					<?php while($posts->have_posts()) : $posts->the_post();?>
						<div class="box flex">
							<div class="imgbox">
								<?=get_the_post_thumbnail()?>
								<i class="far fa-heart"></i>
							</div>

							<div class="descbox">
								<div class="title"><h3><?=get_the_title();?></h3></div>
								<div class="rating"><?=self::rating(0);?></div>
								<div class="trainer"><?=the_content()?></div>
							</div>
						</div>	
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php }
	
}