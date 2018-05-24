<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="ru-RU">
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo get_template_directory_uri(); ?>/favicon.png" rel="icon"          type="image/png">
    <link href="<?php echo get_template_directory_uri(); ?>/favicon.png" rel="shortcut icon" type="image/png">
    <noscript><link href="https://fonts.googleapis.com/css?family=Istok+Web" async="async" rel="stylesheet"></noscript>
	<script>
	(function(){
		function addFont() {
			var style = document.createElement('style');
			style.rel = 'stylesheet';
			document.head.appendChild(style);
			style.textContent = localStorage.sourceSansPro;
		}
		try {
			if (localStorage.sourceSansPro) {
				addFont();
			} else {
				var request = new XMLHttpRequest();
				request.open('GET', 'https://fonts.googleapis.com/css?family=Istok+Web', true);

				request.onload = function() {
					if (request.status >= 200 && request.status < 400) {
						localStorage.sourceSansPro = request.responseText;
						addFont();
					}
				}
				request.send();
			}
		} catch(ex) {
		}
	}());
	</script>

    <?php wp_head(); ?> 
</head>

<body id="to-top" <?php body_class(); ?>>
    <?php the_field('option_code_top','option'); ?>
    <?php edit_post_link(); ?>
    <span class="hidden" id="sait_url"><?php echo get_template_directory_uri(); ?></span>
    <div class="mmenu">
        <nav class="navbar navbar_peak" role="navigation">
            <div class="container">
                <div class="mmenu-items">
                    <div class="mmenu__logo ">
                      <?php if (is_front_page()) { ?>
                      <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo">
                      <?php } else { ?>
                      <a href="<?php echo home_url(); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo"></a>
                      <?php } ?>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-collapse"><i class="fa fa-bars"></i></button>
                    </div>
                    <!--noindex-->
                        <?php
                            wp_nav_menu( array(
                                'menu'              => 'primary',
                                'theme_location'    => 'primary',
                                'depth'             => 3,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse',
                                'container_id'      => 'menu-collapse',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new wp_bootstrap_navwalker())
                            );
                        ?>
                    <!--/noindex-->
                    <div class="mmenu__btel">
                        <div class="mmenu__tel">
                            <a href="tel:<?php echo preg_replace("/[^0-9]/","",get_field('option_tel','option')); ?>" class="mmenu__tel-link"><?php the_field('option_tel','option'); ?></a>
                            <div class="mmenu__search">
                                <form action="<?php echo home_url(); ?>/" method="post">
                                    <input type="text" name="s" placeholder="Поиск по сайту " class="mmenu__search-control">
                                </form>
                                <a class="mmenu__search-btn"></a>
                            </div>                            
                        </div>
                        <a href="#popup-form" class="link-popup link-popup_call fancybox">Заказать звонок</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

<?php setPostViews(get_the_ID()); ?>