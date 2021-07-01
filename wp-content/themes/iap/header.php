<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header class="header">
		<div class="container">
			<?php if ( has_custom_logo() ) : ?>
				<div class="site-logo"><?php the_custom_logo(); ?></div>
			<?php endif; ?>

			<span class="menu-trigger js-menu-trigger">
				<svg width="30" height="30" viewBox="0 -53 384 384" xmlns="http://www.w3.org/2000/svg"><path d="M368 154.668H16c-8.832 0-16-7.168-16-16s7.168-16 16-16h352c8.832 0 16 7.168 16 16s-7.168 16-16 16zm0 0M368 32H16C7.168 32 0 24.832 0 16S7.168 0 16 0h352c8.832 0 16 7.168 16 16s-7.168 16-16 16zm0 0M368 277.332H16c-8.832 0-16-7.168-16-16s7.168-16 16-16h352c8.832 0 16 7.168 16 16s-7.168 16-16 16zm0 0"/></svg>
			</span>

			<?php if (has_nav_menu('menu')): ?>
				<nav class="menu">
					<?php
					wp_nav_menu([
						'theme_location' => 'menu'
					]);
					?>
				</nav>
			<?php endif ?>
		</div>
		<script>
		(function($) {
			$('.js-menu-trigger').on('click', function() {
				$(this).toggleClass('is-active');
				$('.header .menu').toggleClass('is-visible');
			})
		})(jQuery);
		</script>
	</header>

	