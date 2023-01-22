<?php

class AG_Login {


    public function init() {
	    wp_register_script(
			'ag-script',
		    plugin_dir_url( __FILE__ ) . 'js/get-token.js',
		    '',
		    strtotime("now"),
	    );

	    $admin_script = array( 'ajax_url' => admin_url( 'admin-ajax.php' ) );
	    wp_localize_script( 'ag-script', 'wpp', $admin_script );
	    wp_enqueue_script( 'ag-script' );

	    // Add defer load on script
	    add_filter( 'script_loader_tag', [$this, 'setTypeAttrToScript'], 10, 3 );
	}

	public function setTypeAttrToScript( $tag, $handle, $src ) {
		if ( 'ag-script' === $handle ) {
			$tag = '<script defer src="'. $src .'"></script>';
		}
		return $tag;
	}



}

$ag_login = new AG_Login();
$ag_login->init();
