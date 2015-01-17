<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php bloginfo('name'); ?></title>
        <meta name="viewport" content="width=device-width">

        <?php wp_head(); ?>
    </head>
    <body>
	
	<!-- FACEBOOK SDK -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=164029243682261";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

    <div id="pageWrapper">
        <!-- START header -->
        <header>
        	
        	<!-- Social Nav -->
        	<?php wp_nav_menu( array( 'menu' => 'Social Nav Menu' )); ?>
        	<?php wp_nav_menu( array( 'menu' => 'Main Nav Menu' )); ?>
        	
        	<!-- Branding -->
        	<div id="branding" class="container_12">
        		<hgroup class="grid_12 alpha omega">
	        		<h1 id="berrysLogo"><a href="<?php echo home_url('/'); ?>" title="Berry's Greenhouses Inc."><img src="<?php bloginfo('template_directory'); ?>/img/logo.jpg" alt="Berry's Greenhouses Inc." /></a></h1>
	        		<p>Wholesale foliage & flowering plants</p>
		        	<div id="searchBox">
		        		<form id="searchForm" action="<?php bloginfo('url'); ?>/">
		        			<input type="text" name="s" value="" placeholder="Search Products" />
		        			<input type="hidden" name="post_type" value="product" />
		        			<input type="submit" name="search" id="productSearch_submit" />
		        		</form>
		        	</div>
        		</hgroup>
        	</div>
        	
		</header>
        <!-- END header-->
