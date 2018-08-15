
                    </section>                     
                </div>                 
            </div>             
            <!-- Sidebar -->             
            <div id="sidebar"> 
                <div class="inner"> 
                    <!-- Search -->                     
                    <section id="search" class="alt"> 
                        <form method="get" action="<?php echo esc_url( home_url() ); ?>"> 
                            <input type="text" name="s" id="query" placeholder="Search"/> 
                        </form>                         
                    </section>                     
                    <!-- Menu -->                     
                    <nav id="menu"> 
                        <header class="major"> 
                            <h2><?php _e( 'Menu', 'editorial' ); ?></h2> 
                        </header>                         
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <?php wp_nav_menu( array(
                                    'menu' => 'primary',
                                    'menu_class' => 'menu',
                                    'menu_id' => 'menu-primary',
                                    'container' => ''
                            ) ); ?>
                        <?php endif; ?> 
                    </nav>                     
                    <!-- Section -->                     
                    <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
                        <section>
                            <?php dynamic_sidebar( 'sidebar' ); ?>
                        </section>
                    <?php endif; ?> 
                    <!-- Section -->                     
                    <section> 
                        <header class="major"> 
                            <h2><?php echo get_theme_mod( 'ta_contact_title', __( 'Get in touch', 'editorial' ) ); ?></h2> 
                        </header>                         
                        <p><?php echo get_theme_mod( 'ta_contact_text', __( 'Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.', 'editorial' ) ); ?></p> 
                        <ul class="contact"> 
                            <?php if ( get_theme_mod( 'ta_contact_email' ) ) : ?>
                                <li class="fa-envelope-o">
                                    <a href="#"><?php echo get_theme_mod( 'ta_contact_email', __( 'information@untitled.tld', 'editorial' ) ); ?></a>
                                </li>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'ta_contact_phone' ) ) : ?>
                                <li class="fa-phone">
                                    <?php echo get_theme_mod( 'ta_contact_phone' ); ?>
                                </li>
                            <?php endif; ?> 
                            <?php if ( get_theme_mod( 'ta_contact_address' ) ) : ?>
                                <li class="fa-home">
                                    <?php echo get_theme_mod( 'ta_contact_address' ); ?>
                                </li>
                            <?php endif; ?> 
                        </ul>                         
                    </section>                     
                    <!-- Footer -->                     
                    <footer id="footer"> 
                        <p class="copyright">
                            <span><?php echo get_theme_mod( 'ta_footer_copyright', __( 'Untitled. All rights reserved.', 'editorial' ) ); ?></span>
                        </p> 
                    </footer>                     
                </div>                 
            </div>             
        </div>         
        <!-- Scripts -->                                                      
        <?php wp_footer(); ?>
    </body>     
</html>