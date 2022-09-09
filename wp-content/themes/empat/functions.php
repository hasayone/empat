<?php

// Dump helper function
if ( ! function_exists( 'wp_dump' ) ) {
	function wp_dump( ...$params ) {
		echo '<pre style="text-align: left; font-family: \'Courier New\'; font-size: 12px;line-height: 20px;background: #efefef;border: 1px solid #777;border-radius: 5px;color: #333;padding: 10px;margin: 30px 0;overflow: auto;overflow-y: hidden;">';
		var_dump( $params );
		echo '</pre>';
	}
}

// Dump to log helper function
if ( ! function_exists( 'wp_log' ) ) {
	function wp_log( $var, $desc = ' >> ', $clear_log = false ) {
		$log_file_destination = WP_CONTENT_DIR . '/wp_log.log';
		if ( $clear_log ) {
			file_put_contents( $log_file_destination, '' );
		}
		error_log( '[' . date( "H:i:s" ) . ']' . '-------------------------' . PHP_EOL, 3, $log_file_destination );
		error_log( '[' . date( "H:i:s" ) . ']' . $desc . ' : ' . print_r( $var, true ) . PHP_EOL, 3, $log_file_destination );
	}
}

// autoloader
spl_autoload_register( function ( $class ) {

	$prefix = 'empat\\';

	$base_dir = __DIR__ . '/app/';

	$len = strlen( $prefix );
	if ( strncmp( $prefix, $class, $len ) !== 0 ) {
		return;
	}

	$relative_class = substr( $class, $len );
	$file = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';

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
