<?php
get_header(); ?>

<div class="full_column--width displayNone">
	<div class="left_column--width">
		<h2 class="no-margin"><?php _e( 'Welcome Home', 'editorial' ); ?></h2>
	</div>
    <div class="right_column--width">
	</div>
</div>
<hr class="displayNone">
<?php echo do_shortcode("[pt_view id=9860f89j9y]"); ?>
<hr>
<div class="posts"> 
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="image"> 
					<?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'thumbnail' );
                        }
                     ?>
				</a>
                <a class="post-title" href="<?php echo esc_url( get_permalink() ); ?>"><h3><?php the_title(); ?></h3></a>
				<?php do_action( 'editorial_post_categories' ); ?>
				<div class="entry-meta">
					<?php editorial_posted_on(); ?>
					<?php editorial_post_comment(); ?>
				</div>
				<?php the_excerpt(); ?>
                <ul class="actions"> 
                    <li>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="button"><?php _e( 'More', 'editorial' ); ?></a>
                    </li>                                             
                </ul>                                         
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'editorial' ); ?></p>
    <?php endif; ?>                                                                                                                                                  
</div>                         
<footer> 
    <?php global $wp_query;  $big = 999999990; $output='';	  $links = paginate_links( array( 	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ), 	'format' => '?paged=%#%', 	'current' => max( 1, get_query_var('paged') ), 	'total' => $wp_query->max_num_pages,'type' => 'list', ) ); if ($links) { 	$output .= '<section class="pagination">'; 	$output .= $links; 	$output .= '</section>'; } echo $output;  ?>
</footer>                        

<?php get_footer(); ?>