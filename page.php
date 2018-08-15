<?php
get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <header class="main"> 
                <h1><?php the_title(); ?></h1> 
            </header>
            <span class="image main"><?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'normal' );
                    }
                 ?></span>
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.', 'editorial' ); ?></p>
<?php endif; ?>                         

<?php get_footer(); ?>