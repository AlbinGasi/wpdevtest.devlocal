<?php

function ag_custom_loader( $class_name ) {

    $file = dirname( __DIR__ ) . '/classes/'. $class_name .'.php';

	// If a file is found
	if ( file_exists( $file ) ) {
		// Then load it up!
		require( $file );
	}
}

spl_autoload_register( 'ag_custom_loader' );
