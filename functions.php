<?php

function theme_updated_setup() {

	add_theme_support( 'automatic-feed-links' );

	
	add_theme_support( 'title-tag' );

	
	add_theme_support( 'post-thumbnails' );

	
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'theme-updated' ),
		)
	);


	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


	add_theme_support(
		'custom-background',
		apply_filters(
			'theme_updated_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );


	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'theme_updated_setup' );


function theme_updated_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'theme_updated_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme_updated_content_width', 0 );


function theme_updated_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'theme-updated' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'theme-updated' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'theme_updated_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_updated_scripts() {



	wp_enqueue_script( 'theme-updated-navigation', get_template_directory_uri() . '/js/navigation.js', array(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_updated_scripts' );
