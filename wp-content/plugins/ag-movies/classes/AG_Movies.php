<?php

/**
 * Class is used for general customizations
 * It's treated as a main class from where we include all other classes and modules in this folder
 */
class AG_Movies
{

    public function main() {

	    add_action('init', [$this, 'jobPostType'], 10 );

	    // Custom metabox
	    add_action('init', [$this, 'customMetaBox'], 20 );

        // Load modules
        $this->loadModules();
    }


	/**
	 * Create a new custom post type
	 * @return void
	 */
	public function jobPostType() {
		global $textDomain;

		register_post_type( 'movie',
			array(
				'labels' => array(
					'name' => __('Movies', $textDomain),
					'singular_name' => __('Movie', $textDomain),
					'add_new' => __('Add New Movie', $textDomain),
					'add_new_item' => __('Add New Movie', $textDomain),
					'edit_item' => __('Edit Movie', $textDomain),
					'new_item' => __('New Movie', $textDomain),
					'view_item' => __('Viev Movie', $textDomain),
					'view_items' => __('View Movies', $textDomain),
					'all_items' => __('All Movies', $textDomain),
				),
				'menu_position' => 10,
				'supports' => array('title', 'editor', 'thumbnail', 'author'),
				'hierarchical'          => true,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => false,
				'has_archive'           => true,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'post',
				'show_in_rest'          => true,
			)
		);
	}

	public function customMetaBox() {
		$metabox = new WordpressMetabox( 'Movie settings', 'extra_settings', [ 'movie'], 'normal' );
		$metabox->add_field(
			[
				'type' => 'text',
				'name' => 'movie_title',
				'title' => 'Movie Title',
			]
		);
	}


    /**
     * Load all modules
     * @return void
     */
    public function loadModules() {
        $path = AG_MOVIES_MODULES . '/*';
        foreach ( glob($path) as $folder ) {
            $folderPath = glob($folder . '/module.php');
            if ( !empty($folderPath) ) {
                foreach ( $folderPath as $filePath ) {
                    require $filePath;
                }
            }
        }
    }

}