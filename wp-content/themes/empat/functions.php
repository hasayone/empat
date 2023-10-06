<?php
// autoloader
spl_autoload_register( function ( $class ) {
	$prefix = 'empat\\';

	$base_dir = __DIR__ . '/app/';

	$len = strlen( $prefix );
	if ( strncmp( $prefix, $class, $len ) !== 0 ) {
		return;
	}

	$relative_class = substr( $class, $len );
	$file           = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';

	if ( file_exists( $file ) ) {
		require $file;
	}
} );

// Global point of enter
if ( ! function_exists( 'EMPATDEV' ) ) {
	function EMPATDEV() {
		return \empat\app::getInstance();
	}
}

// Run the plugin
EMPATDEV()->run();

?>
