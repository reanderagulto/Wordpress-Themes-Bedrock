<?php 

if(!function_exists('UR_Loader')) {

    class UR_Loader {
        
        private $stylesheet_dir;
        private $modules_dir;

        public function __construct() {

            $this->stylesheet_dir = get_stylesheet_directory();
            $this->modules_dir = $this->stylesheet_dir . '/modules';

            $this->actions();
        }

        public function actions() {
            add_action( 'after_setup_theme', [$this, 'module_loader'] );
        }

        public function module_loader () {
            $modules = glob( $this->modules_dir . '/*' , GLOB_ONLYDIR );

            if ( $modules ) {
                
                foreach ( $modules as $module ) {
                    if ( file_exists( $module . '/module.php' ) ) {
                        require_once( $module . '/module.php' );
                    }
                    
                    if ( file_exists( $module . '/shortcodes.php' ) ) {
                        require_once( $module . '/shortcodes.php' );
                    }
                }
            }
        }
    }

    new UR_Loader();

}