<?php 

namespace PXA;

	class Bootstrap{

		public static function services(){
			return [
				Application\Style::class,
				Application\Main::class,
				Application\Helper::class,
			];
		}

		public static function run(){			
			foreach (self::services() as $class) {
				self::intial($class);
			}
		}


		public static function intial($class){
			return new $class();
		}
	}