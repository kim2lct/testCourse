<?php 
namespace PXA\Application;

class Style{
	public function __construct(){			
			add_action('wp_enqueue_scripts',function(){
				    wp_enqueue_style( 'course', PXA_PLUGIN_URL . 'course.css',);
				    
			},20);

			add_action( 'admin_enqueue_scripts', function(){
				wp_enqueue_media();
				wp_enqueue_script('course',PXA_PLUGIN_URL . 'course.js' );
			});
		}
}