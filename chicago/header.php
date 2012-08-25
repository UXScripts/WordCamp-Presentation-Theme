<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<title><?php 
			wp_title( '|', true, 'right' );
			bloginfo( 'name' );
	
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";

		?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<?php wp_head(); ?>
		<script type="text/javascript" src="//use.typekit.net/wed2azx.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	</head>
	<body <?php body_class(); ?>>
		<section id="wrap">
			<header id="header">
				<hgroup>
					<?php $tag = is_home() || is_front_page() ? 'h1' : 'p'; ?>
					<<?php echo $tag; ?> id="title">Using AJAX in Your Plugins (The Right Way)</<?php echo $tag; ?>>
				</hgroup>
			</header>
			<section id="presentation">
				<div class="wrap">