<?php 

/** Module Loader */
function module_loader () {
    $modules = glob( get_stylesheet_directory() . '/modules/*' , GLOB_ONLYDIR );

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

add_action( 'after_setup_theme', 'module_loader' );