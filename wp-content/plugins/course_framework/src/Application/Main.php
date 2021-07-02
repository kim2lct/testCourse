<?php 
namespace PXA\Application;

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class Main{

	public function __construct(){	
		// overwrite home
		add_filter('template_include', function ($template) {
  if (is_front_page()) {
    return PXA_PLUGIN_DIR . 'src/Home.php';
  }
  	return $template;
}
	);	
	
	add_action('admin_menu',array($this,'add_admin_menu'));
	add_action('admin_init',function(){
		register_setting( 'course_options', 'logo' );      
		register_setting( 'course_options', 'banner' ); 
		register_setting( 'course_options', 'copyright' ); 
		register_setting( 'course_options', 'special_content' ); 
		register_setting( 'course_options', 'placeholder_search' ); 
		register_setting( 'course_options', 'qs_banner' ); 

     
	}); 

	add_filter('acf/format_value/type=textarea', 'do_shortcode');

	add_shortcode('icon',array($this,'icon_function')); 
	add_shortcode('icons',array($this,'icons_function')); 

	add_action( 'widgets_init', function(){
		register_sidebar( array(
        'name'          => __( 'Social Sidebar', 'pxa' ),
        'id'            => 'social-sidebar',
        'description'   => __( 'Widgets in this area will be shown on footer social media.', 'pxa' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	});




	}

	public function add_admin_menu(){
		add_menu_page(
				'Theme Option',
				'Theme Option',
				'manage_options',
				'course_options',
				array($this,'course_options'),
				'dashicons-store',
				110
			);
		add_submenu_page(
			'course_options',
			'Scrape Course',
			'Scrape Course',
			'manage_options',
			'course_scrape',
			array($this,'course_scrape')
		);
	}

	public function course_options(){
		return require_once PXA_PLUGIN_DIR.'src/course_options.php';
	}

	public function course_scrape(){
		return require_once PXA_PLUGIN_DIR.'src/course_scrape.php';
	}

	public function scrape_api($url){
		
		$client = new Client(HttpClient::create(['timeout' => 60]));
		$crawler = $client->request('GET', $url);
		$courseArr = [];
		try {
			$crawler->filter('.courseCarouselBestPrice .itemContent')->each(function($node,$i){
			if($i >= 10){
				return false;
			}
			$title = $node->filter('.courseCarouselMeta1 a')->text();
			$trainer = $node->filter('.courseCarouselMeta1 small')->text();
			$image = $node->filter('.courseCarouselImage')->attr('style');
			preg_match('/\((.*?)\)/',$image,$data);
			$image = $data[1];	

			$post = array(
			  'post_title'    => wp_strip_all_tags( $title ),
			  'post_content'  => wp_strip_all_tags($trainer),
			  'post_status'   => 'publish',
			  'post_author'   => get_current_user_id(),			  
			);
			$attach_id = $this->createImg($image);
			$post_id = wp_insert_post($post);
			if($post_id){				
				set_post_thumbnail( $post_id, $attach_id);				
			}

		});
			echo 'success import !';
		} catch (\Exception $e) {
			echo 'error';
		}
		

	}


	public function icon_function($attr){		
		return '<li><a class="soc '.$attr['title'].'" href="'.$attr['link'].'"><i class="fab fa-'.$attr['title'].'"></i></a></li>';
	}

	public function icons_function($attr,$content = null){
		$html = '<ul class="icons">';		
		$html .= do_shortcode($content);
		$html .= '</ul>';		
		return $html;
	}

	private function createImg($images){
		$wp_upload_dir = wp_upload_dir();		
		$checkType = wp_check_filetype(basename($images),null);			
		$ext = $checkType['ext'];
		$mimes = $checkType['type'];
		$file = file_get_contents($images);
		$name = basename($images);	
		
		if ( wp_mkdir_p( $wp_upload_dir['path'] ) ) {
			  $filewp = $wp_upload_dir['path'] . '/' .$name;
			}
			else {
			  $filewp = $wp_upload_dir['basedir'] . '/' .$name;
			}

		file_put_contents( $filewp, $file );

		$attachment_data = array(
			    'post_mime_type' => $mimes,
			    'post_title' =>  $name,
			    'post_content' => '',
			    'post_status' => 'inherit',
			    'guid' => $wp_upload_dir['url'].'/'.$name
			);			

			$attach_id = wp_insert_attachment( $attachment_data, $filewp, 0 );
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
			$attach_data = wp_generate_attachment_metadata( $attach_id, $filewp );
			wp_update_attachment_metadata( $attach_id, $attach_data );

			return $attach_id;
	}


}