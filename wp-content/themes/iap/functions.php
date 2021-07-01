<?php

if (!function_exists('iap_setup') ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function iap_setup() {
        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support( 'title-tag' );

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(343, 235, true);

		// Menu locations
		register_nav_menus(
			array(
				'menu' => __( 'Header', 'iap' ),
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 160,
				'height'      => 41,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);
    }
endif;
add_action( 'after_setup_theme', 'iap_setup' );

/**
 * Enqueue scripts and styles.
 */
function iap_scripts() {
    wp_enqueue_style( 'style', untrailingslashit( get_template_directory_uri() ) . '/dist/css/style.css' );
    wp_enqueue_style( 'font-google', 'https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;600;700&display=swap', false ); 
    wp_enqueue_script( 'slick', untrailingslashit( get_template_directory_uri() ) . '/src/js/slick.js', ['jquery'], true );
}
add_action( 'wp_enqueue_scripts', 'iap_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function iap_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'iap' ),
			'id'            => 'sidebar',
			'description'   => __( 'Add widgets here to appear in your footer.', 'iap' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'iap' ),
			'id'            => 'footer-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'iap' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'iap' ),
			'id'            => 'footer-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'iap' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'iap' ),
			'id'            => 'footer-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'iap' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 4', 'iap' ),
			'id'            => 'footer-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'iap' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'iap_widgets_init' );

/**
 * Filter the except length to 20 words.
 *
 * @link https://developer.wordpress.org/reference/functions/the_excerpt/
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function iap_excerpt_length( $length ) {
    return 15;
}

add_filter('excerpt_length', 'iap_excerpt_length', 999);

/**
 * Gutenberg blocks
 *
 */

use Carbon_Fields\Block;
use Carbon_Fields\Field;

function iap_attach_gutenberg_blocks() {

	Block::make('IAP Demo')
		-> add_fields([
			Field::make('text', 'iap_demo_title', __( 'Title' )),
			Field::make('text', 'iap_demo_description', __( 'Description' )),
		])
		-> set_render_callback( function( $fields, $attributes, $inner_blocks ) { ?>
			<h1><?= $fields['iap_demo_title'] ?></h1>
			<p><?= $fields['iap_demo_description'] ?></p>
		<?php
	});

	Block::make('IAP Hero')
		-> add_fields([
			Field::make('text', 'iap_hero_title', __( 'Title' )),
			Field::make('text', 'iap_hero_content', __( 'Content' )),
			Field::make('text', 'iap_hero_button', __( 'Button' )),
			Field::make('text', 'iap_hero_url', __( 'Url' )),
			Field::make( 'image', 'iap_hero_image', __( 'Imagine' ) ),
			Field::make( 'checkbox', 'iap_hero_big', __( 'Big' ) ),
			Field::make( 'radio', 'iap_hero_layout', __( 'Layout' ) )
				->set_options( array(
					'left' => 'Left',
					'right' => 'Right'
				) )
		])
		-> set_render_callback( function( $fields, $attributes, $inner_blocks ) { ?>
			<div class="hero <?php if ($fields['iap_hero_big']): ?>big<?php endif ?> <?= $fields['iap_hero_layout'] ?>">
				<div class="container">
					<div class="row middle-md">
						<div class="col-xs-12 col-sm-12 col-md-7">
							<?= wp_get_attachment_image( $fields['iap_hero_image'], 'full' ); ?>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-5 <?php if ($fields['iap_hero_layout'] == 'left'): ?>first-md<?php endif ?>">
							<div class="hero-content">
								<h2 class="hero-title"><?= $fields['iap_hero_title'] ?></h2>
								<p class="hero-description"><?= $fields['iap_hero_content'] ?></p>
								<a href="<?= $fields['iap_hero_url'] ?>" class="button hero-button"><?= $fields['iap_hero_button'] ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	});

	Block::make('IAP Services')
		-> add_fields([
			Field::make( 'text', 'iap_services_title', __( 'Title' ) ),
			Field::make( 'text', 'iap_services_content', __( 'Content' ) ),
			Field::make( 'complex', 'iap_services_cards', __( 'Cards' ) )
				-> add_fields(array (
					Field::make( 'image', 'iap_services_cards_image', __( 'Imagine' ) ),
					Field::make( 'text', 'iap_services_cards_title', __( 'Title' ) ),
					Field::make( 'text', 'iap_services_cards_text', __( 'Text' ) ),
					Field::make( 'text', 'iap_services_cards_url', __( 'URL' ) ),
				)),
			Field::make( 'text', 'iap_services_button', __( 'Button' ) ),
			Field::make( 'text', 'iap_services_url', __( 'URL' ) ),
		])
		-> set_render_callback( function( $fields, $attributes, $inner_blocks ) { ?>
			<div class="section">
				<div class="container-sm">
					<h2 class="section-title"><?= $fields['iap_services_title'] ?></h2>
					<p class="section-text"><?= $fields['iap_services_content'] ?></p>
					<div class="row cards">
						<?php  foreach ( $fields['iap_services_cards'] as $field ) :  ?>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<a href="<?= $field['url'] ?>" class="card">
								<div class="card-icon">
									<?= wp_get_attachment_image( $field['iap_services_cards_image'], 'full' ); ?>
								</div>
								<h3 class="card-title"><?= $field['iap_services_cards_title'] ?></h3>
								<p class="card-description"><?= $field['iap_services_cards_text'] ?></p>
							</a>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="section-actions">
					<a href="<?= $fields['iap_services_url'] ?>" class="button secondary"><?= $fields['iap_services_button'] ?></a>
				</div>
			</div>
		<?php
	});

	Block::make('IAP Testimonials')
		-> add_fields([
			Field::make( 'text', 'iap_testimonials_title', __( 'Title' ) ),
			Field::make( 'complex', 'iap_testimonials_items', __( 'Slider' ) )
				-> add_fields(array (
					Field::make( 'image', 'iap_testimonials_items_avatar', __( 'Avatar' ) ),
					Field::make( 'text', 'iap_testimonials_items_name', __( 'Name' ) ),
					Field::make( 'text', 'iap_testimonials_items_position', __( 'Position' ) ),
					Field::make( 'text', 'iap_testimonials_items_testimonial', __( 'Testimonial' ) ),
				)),
		])
		-> set_render_callback( function( $fields, $attributes, $inner_blocks ) { ?>
			<div class="section">
				<div class="container-sm">
					<div class="testimonials">
						<h2 class="section-title"><?= $fields['iap_testimonials_title'] ?></h2>
						<div class="testimonials-list">
							<?php foreach ( $fields['iap_testimonials_items'] as $field ) :  ?>
								<div class="testimonial">
									<div class="testimonial-avatar">
										<?= wp_get_attachment_image( $field['iap_testimonials_items_avatar'], 'full' ); ?>
									</div>
									<div class="testimonial-content">
										<div class="testimonial-author">
											<strong><?= $field['iap_testimonials_items_name'] ?></strong>
											<span><?= $field['iap_testimonials_items_position'] ?></span>
										</div>
										<div class="testimonial-text"><?= $field['iap_testimonials_items_testimonial'] ?></div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
				<script>
				(function($) {
					$('.testimonials-list').slick({
						infinite: false,
						dots: true,
						prevArrow: '<div class="slick-arrow left"><svg width="29" height="19" viewBox="0 0 29 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.691 7.763H5.645l4.624-4.624c.638-.638.638-1.594 0-2.232-.638-.638-1.594-.638-2.232 0L.703 8.24c-.638.638-.638 1.594 0 2.232l7.334 7.334c.638.638 1.594.638 2.232 0 .638-.637.638-1.594 0-2.232l-4.624-4.624h21.046c.797 0 1.595-.637 1.595-1.594 0-.957-.798-1.594-1.595-1.594z" fill="#458FF6"/></svg></div>',
						nextArrow: '<div class="slick-arrow right"><svg width="29" height="19" viewBox="0 0 29 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.737 11.237h21.046l-4.623 4.624c-.638.638-.638 1.595 0 2.232.637.638 1.594.638 2.232 0l7.334-7.334c.638-.638.638-1.594 0-2.232l-7.334-7.334c-.638-.638-1.595-.638-2.232 0-.638.637-.638 1.594 0 2.232l4.623 4.624H1.737c-.797 0-1.594.637-1.594 1.594 0 .957.797 1.594 1.594 1.594z" fill="#458FF6"/></svg></div>'
					});
				})(jQuery);
				</script>
			</div>
		<?php
	});
}

add_action('carbon_fields_register_fields', 'iap_attach_gutenberg_blocks' );