<?php
get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <header class="main"> 
                <h1><?php the_title(); ?></h1>
				<?php do_action( 'editorial_post_categories' ); ?>
            </header>
			<div class="entry-meta">
				<?php editorial_posted_on(); ?>
				<?php editorial_post_comment(); ?>
			</div>
			<!-- Article Ads Starts -->
			<!-- Article Ads Ends -->
            <span class="image main">
				<?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'normal' );
                    }
				?>
			</span>
            <?php the_content(); ?>
        </div>
		<footer class="entry-footer">			
			<?php editorial_entry_footer(); ?>
		</footer><!-- .entry-footer -->

		<!-- Post Navigation Starts -->
		<div class="clear u__padding-bottom-45">
			<?php the_post_navigation(); ?>		 
		</div>
		<!-- Post Navigation Ends -->

		<!-- Related Articles Starts -->
		<?php do_action( 'editorial_related_articles' ); ?>
		<!-- Related Articles Ends -->
		
		<div class="clear related-articles-wrapper">
			<div class="widget-title-wrapper">
				<h2 class="related-title">Recent Posts</h2>
			</div>
		</div>
		<?php echo do_shortcode("[pt_view id=9c170a8l0a]"); ?>
    <?php endwhile; ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.', 'editorial' ); ?></p>
<?php endif; ?>                         

<?php get_footer(); ?>