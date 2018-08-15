<!doctype HTML> 
<html <?php language_attributes(); ?>> 
    <head>          
        <meta charset="<?php bloginfo( 'charset' ); ?>"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>          
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-38947711-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-38947711-1');
		</script>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
		  (adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "ca-pub-1964447680057278",
			enable_page_level_ads: true
		  });
		</script>
    </head>     
    <body class="is-preload <?php echo implode(' ', get_body_class()); ?>"> 
        <!-- Wrapper -->         
        <div id="wrapper"> 
            <!-- Main -->             
            <div id="main"> 
                <div class="inner"> 
                    <!-- Header -->                     
                    <header id="header"> 
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
                            <?php if ( get_theme_mod( 'ta_general_logo' ) ) : ?>
                                <img src="<?php echo wp_get_attachment_image_url( get_theme_mod( 'ta_general_logo' ), 'large' ) ?>">
                            <?php endif; ?>
                            <?php bloginfo( 'name' ); ?>
							<span class="desc">To get the latest technology news</span>
                        </a>                         
                        <ul class="icons"> 
                            <li>
                                <a href="https://www.linkedin.com/in/sriarun87/" class="icon fa-linkedin" target="_blank"><span class="label"><?php _e( 'LinkedIn', 'editorial' ); ?></span></a>
                            </li>
							<li>
                                <a href="<?php echo get_theme_mod( 'ta_general_github', '#' ); ?>" class="icon fa-github"><span class="label"><?php _e( 'github', 'editorial' ); ?></span></a>
                            </li>
                            <li>
                                <a href="<?php echo get_theme_mod( 'ta_general_twitter', '#' ); ?>" class="icon fa-twitter"><span class="label"><?php _e( 'Twitter', 'editorial' ); ?></span></a>
                            </li>
                            <li>
                                <a href="<?php echo get_theme_mod( 'ta_general_facebook', '#' ); ?>" class="icon fa-facebook"><span class="label"><?php _e( 'facebook', 'editorial' ); ?></span></a>
                            </li>
                        </ul>                         
                    </header>                     
                    <!-- Banner -->                     
                    <?php if ( get_theme_mod( 'ta_general_featured_post' ) && (is_home() || is_front_page() )) : ?>
                        <section id="banner"> 
                            <div class="content"> 
                                <header> 
                                    <h1><?php echo get_the_title(get_theme_mod('ta_general_featured_post')) ?></h1> 
                                </header>                                 
                                <p><?php echo get_the_excerpt(get_theme_mod('ta_general_featured_post')) ?></p> 
                                <ul class="actions"> 
                                    <li>
                                        <a href="<?php echo esc_url( get_permalink( get_theme_mod('ta_general_featured_post') ) ); ?>" class="button big"><?php _e( 'Learn More', 'editorial' ); ?></a>
                                    </li>                                     
                                </ul>                                 
                            </div>                             
                            <span class="image object"> <?php echo get_the_post_thumbnail( get_theme_mod('ta_general_featured_post'), 'large' ); ?> </span> 
                        </section>
                    <?php endif; ?> 
                    <!-- Section -->                     
                    <?php if ( is_home() || is_front_page() || get_theme_mod( 'ta_features_show' ) ) : ?>
                        <?php
                            $services_args = array(
                                'post_type' => 'services',
                                'posts_per_page' => '4',
                                'order' => 'ASC',
                                'orderby' => 'date'
                            )
                        ?>
                        <?php $services = new WP_Query( $services_args ); ?>
                        <?php if ( $services->have_posts() ) : ?>
                            <section <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                                <header class="major"> 
                                    <h2><?php echo get_theme_mod( 'ta_features_title', __( 'Erat lacinia', 'editorial' ) ); ?></h2> 
                                </header>                                 
                                <div class="features"> 
                                    <?php while ( $services->have_posts() ) : $services->the_post(); ?>
                                        <article> 
                                            <span class="icon <?php echo get_post_meta( get_the_ID(), 'ta_services_icon', true ); ?>"></span> 
                                            <div class="content"> 
                                                <h3><?php the_title(); ?></h3> 
                                                <?php the_content(); ?> 
                                            </div>                                             
                                        </article>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>                                                                                                                
                                </div>                                 
                            </section>
                        <?php endif; ?>
                    <?php endif; ?> 
                    <!-- Section -->                     
                    <section>