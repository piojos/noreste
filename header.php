<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width" />

	<title><?php wp_title(); ?></title>

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" />
	<meta name="author" content="Raidho Aesthetics">

	<?php wp_head(); ?>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css"/>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/shame.css"/>

	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/responsiveslides.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/masonry.pkgd.min.js"></script>
	<script>
		$(function () {
			$("#slider1").responsiveSlides({
				pager: false,
				auto: false,
				nav: false,
				manualControls: '#slider3-pager'
			});
			$("#slider2").responsiveSlides({
				pager: false,
				auto: true,
				nav: false,
				manualControls: '#slider2-pager'
			});
		});
	</script>

	<script>
		$(document).ready(function() {
			$(window).scroll( function(){
				$('.hide_half').each( function(i){
		            var bottom_of_object = $(this).offset().top + 100;
		            var bottom_of_window = $(window).scrollTop() + $(window).height();
					if( bottom_of_window > bottom_of_object ){
						$(this).animate({'opacity':'1'},500);
					}
		        });
		    });
			$(window).scroll( function(){
				$('.white_title').each( function(i){
		            var bottom_of_object = $(this).offset().top + 300;
		            var bottom_of_window = $(window).scrollTop() + $(window).height();
					if( bottom_of_window > bottom_of_object ){
						$(this).addClass( "display_title" );
					}
		        });
		    });
		});
	</script>

	<script>
		$(document).ready(function(){
			$window = $(window);
			$('.slide .img[data-type="background"]').each(function(){
				var $bgobj = $(this);
				$(window).scroll(function() {
					var yPos = -($window.scrollTop() / $bgobj.data('speed'));
					var coords = '50% '+ yPos + 'px';
					$bgobj.css({ backgroundPosition: coords });
				});
			});
		});
	</script>

</head>

<body <?php body_class(); ?>>
	<header>
		<div class="logo">
			<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo_black.svg"></a>
		</div>

		<a href="javascript:void(0)" class="burger">
			<div></div><div></div><div></div>
		</a><?php


		$post_objects = get_field('menu', 'options');
		if($post_objects) : ?>

		<nav>
			<ul class="st-menu"><?php
			foreach ($post_objects as $post) :
				setup_postdata($post); ?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li><?php
				wp_reset_postdata();

			endforeach; ?>
			</ul>
		</nav><?php

		endif; ?>
	</header>
