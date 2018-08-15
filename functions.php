<?php
if ( ! function_exists( 'editorial_setup' ) ) :

function editorial_setup() {

    load_theme_textdomain( 'editorial', get_template_directory() . '/languages' );
   
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );
    
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );


    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'editorial' ),
        'social'  => __( 'Social Links Menu', 'editorial' ),
    ) );

    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
}
endif; 

add_action( 'after_setup_theme', 'editorial_setup' );


if ( ! function_exists( 'editorial_init' ) ) :

function editorial_init() {

    
    register_post_type('services', array(
        'labels' => 
            array(
                'name' => __( 'service', 'editorial' ),
                'singular_name' => __( 'services', 'editorial' )
            ),
        'public' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes' ),
        'show_in_menu' => true
    ));


}
endif; 

add_action( 'init', 'editorial_init' );


if ( ! function_exists( 'editorial_widgets_init' ) ) :

function editorial_widgets_init() {

    

    register_sidebar( array(
        'name' => __( 'sidebar', 'editorial' ),
        'id' => 'sidebar',
        'before_widget' => '<section id="menu" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<header class="major"><h2 class="widgettitle">',
        'after_title' => '</h2></header>'
    ) );

    
    register_widget( 'WP_Widget_Recent_Posts_custom' );


}
add_action( 'widgets_init', 'editorial_widgets_init' );
endif;



if ( ! function_exists( 'editorial_enqueue_scripts' ) ) :
    function editorial_enqueue_scripts() {
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', false, null, true);

		wp_deregister_script( 'browser' );
		wp_enqueue_script( 'browser', get_template_directory_uri() . '/assets/js/browser.min.js', false, null, true);

		wp_deregister_script( 'breakpoints' );
		wp_enqueue_script( 'breakpoints', get_template_directory_uri() . '/assets/js/breakpoints.min.js', false, null, true);

		wp_deregister_script( 'util' );
		wp_enqueue_script( 'util', get_template_directory_uri() . '/assets/js/util.js', false, null, true);

		wp_deregister_script( 'main' );
		wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', false, null, true);


		wp_deregister_style( 'main' );
		wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', false, null, 'all');
    }
    add_action( 'wp_enqueue_scripts', 'editorial_enqueue_scripts' );
endif;

if ( ! function_exists( 'editorial_posted_on' ) ) :
	function editorial_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on = sprintf(
			esc_html_x( '%s', 'post date', 'editorial' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		$byline = sprintf(
			esc_html_x( '%s', 'post author', 'editorial' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}
endif;

if( ! function_exists( 'editorial_post_comment' ) ) :
	function editorial_post_comment() {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Comment(0)', 'editorial' ), esc_html__( 'Comment(1)', 'editorial' ), esc_html__( 'Comments(%)', 'editorial' ) );
		echo '</span>';
	}
endif;

if ( ! function_exists( 'editorial_entry_footer' ) ) :
	function editorial_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() && is_single() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'editorial' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'editorial' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'editorial' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

add_action( 'editorial_post_categories', 'editorial_post_categories_hook' );
if( ! function_exists( 'editorial_post_categories_hook' ) ):
	function editorial_post_categories_hook() {
		global $post;
		$post_id = $post->ID;
		$categories_list = get_the_category( $post_id );
		if( !empty( $categories_list ) ) {
			echo '<div class="post-cat-list">';
			foreach ( $categories_list as $cat_data ) {
				$cat_name = $cat_data->name;
				$cat_id = $cat_data->term_id;
				$cat_link = get_category_link( $cat_id );
				echo '<span class="category-button mt-cat-'. esc_attr( $cat_id ) .'"><a href="' . esc_url( $cat_link ) .'">' . esc_html( $cat_name ) .'</a>						  </span>';
			}
			echo '</div>';
		}
	}
endif;

/*------------------------------------------------------------------------------------------------*/
/**
 * Related articles
 */
add_action( 'editorial_related_articles', 'editorial_related_articles_hook' );
if( ! function_exists( 'editorial_related_articles_hook' ) ):
	function editorial_related_articles_hook() {
		$editorial_related_option = esc_attr( get_theme_mod( 'editorial_related_articles_option', 'enable' ) );
		$editorial_related_title = get_theme_mod( 'editorial_related_articles_title', __( 'Related Articles', 'editorial' ) );
		if( $editorial_related_option != 'disable' ) {
	?>
			<div class="clear related-articles-wrapper">
				<div class="widget-title-wrapper">
					<h2 class="related-title"><?php echo esc_html( $editorial_related_title ); ?></h2>
				</div>
				<?php
					global $post;
	                if( empty( $post ) ) {
	                    $post_id = '';
	                } else {
	                    $post_id = $post->ID;
	                }

	                $editorial_related_type = get_theme_mod( 'editorial_related_articles_type', 'category' );
	                $related_post_count = 3;
	                $related_post_count = apply_filters( 'related_posts_count', $related_post_count );

	                // Define related post arguments
	                $related_args = array(
	                    'no_found_rows'            => true,
	                    'update_post_meta_cache'   => false,
	                    'update_post_term_cache'   => false,
	                    'ignore_sticky_posts'      => 1,
	                    'orderby'                  => 'rand',
	                    'post__not_in'             => array( $post_id ),
	                    'posts_per_page'           => $related_post_count
	                );

	                
	                if ( $editorial_related_type == 'tag' ) {
	                    $tags = wp_get_post_tags( $post_id );
	                    if ( $tags ) {
	                        $tag_ids = array();
	                        foreach( $tags as $tag_ed ) {
	                        	$tag_ids[] = $tag_ed->term_id;
	                        }
	                        $related_args['tag__in'] = $tag_ids;
	                    }
	                } else {
	                    $categories = get_the_category( $post_id );
	                    if ( $categories ) {
	                        $category_ids = array();
	                        foreach( $categories as $category_ed ) {
	                            $category_ids[] = $category_ed->term_id;
	                        }
	                        $related_args['category__in'] = $category_ids;
	                    }
	                }

	                $related_query = new WP_Query( $related_args );
	                if( $related_query->have_posts() ) {
	                    echo '<div class="related-posts-wrapper clearfix">';
	                    while( $related_query->have_posts() ) {
	                        $related_query->the_post();
				?>
							<div class="single-post-wrap">
	                            <div class="post-thumb-wrapper">
                                    <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                                        <figure><?php the_post_thumbnail( 'editorial-block-medium' ); ?></figure>
                                    </a>
                                </div><!-- .post-thumb-wrapper -->
                                <div class="related-content-wrapper">
                                    <?php do_action( 'editorial_post_categories' ); ?>
                                    <h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                    <div class="entry-meta">
                                    	<?php editorial_posted_on(); ?>
                                    </div>
                                    <?php the_excerpt(); ?>
                                </div><!-- related-content-wrapper -->
	                        </div><!--. single-post-wrap -->
	            <?php
                    	}
                    	echo '</div>';
                	}
                	wp_reset_postdata();
        		?>
			</div><!-- .related-articles-wrapper -->
	<?php
		}
	}
endif;


function get_icons()
    {
        require_once ( dirname( __FILE__ ) . '/ta_lib/better-font-awesome-library/better-font-awesome-library.php' );

        $args = array(
            'version'               => 'latest',
            'minified'              => true,
            'remove_existing_fa'    => false,
            'load_styles'           => false,
            'load_admin_styles'     => false,
            'load_shortcode'        => false,
            'load_tinymce_plugin'   => false
        );

        $bfa        = Better_Font_Awesome_Library::get_instance( $args );
        $bfa_icons  = $bfa->get_icons();
        $bfa_prefix = $bfa->get_prefix() . '-';
        $new_icons  = array();

       

        foreach ( $bfa_icons as $hex => $class ) {
            $unicode = '&#x' . ltrim( $hex, '\\') . ';';
            $new_icons[ $bfa_prefix . $class ] = $unicode . ' ' . $bfa_prefix . $class;
        }

        $new_icons = array_merge( array( 'null' => '- Select -' ), $new_icons );

        return $new_icons;
    }

    function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
    }
    add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

    Include("ta_lib/customizer.php");
    Include("ta_lib/meta_boxes.php");
    Include("ta_lib/class-wp-widget-recent-posts.php");