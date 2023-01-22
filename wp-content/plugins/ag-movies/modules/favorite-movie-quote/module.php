<?php

function ag_movies_block_register_block() {
	register_block_type( 'ag-movies/favorite-movie-quote', array(
		'editor_script' => 'ag-movies',
		'render_callback' => 'ag_movies_render_block',
		'attributes' => array(
			'quote' => array(
				'type' => 'string',
				'default' => '',
			),
		),
	) );
}
add_action( 'init', 'ag_movies_block_register_block' );

function ag_movies_render_block( $attributes ) {
	return '<blockquote>' . esc_html( $attributes['quote'] ) . '</blockquote>';
}

function ag_movies_block_enqueue_editor_assets() {
	wp_enqueue_script(
		'fav-movie-quote',
		plugins_url( 'js/fav-movie-quote.js', __FILE__ ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'js/fav-movie-quote.js' )
	);
}
add_action( 'enqueue_block_editor_assets', 'ag_movies_block_enqueue_editor_assets' );