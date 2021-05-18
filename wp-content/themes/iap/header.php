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
		<a href="/"><img src="<?= get_stylesheet_directory_uri() . "/images/logo.svg" ?>" /></a>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">Find a doctor</a></li>
			<li><a href="#">Apps</a></li>
			<li><a href="#">Testimonials</a></li>
			<li><a href="#">About us</a></li>
		</ul>
	</div>
</header>