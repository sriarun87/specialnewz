<?php 
if ( ! function_exists( 'editorial_customize_register' ) ) :

function editorial_customize_register( $wp_customize ) {


    $wp_customize->add_section( 'ta_footer', array(
        'title' => __( 'footer', 'editorial' )
    ));

    $wp_customize->add_section( 'ta_contact', array(
        'title' => __( 'sidebar Get in touch info', 'editorial' )
    ));

    $wp_customize->add_section( 'ta_features', array(
        'title' => __( 'services', 'editorial' )
    ));

    $wp_customize->add_section( 'ta_general', array(
        'title' => __( 'general settings', 'editorial' )
    ));

    $wp_customize->add_setting( 'ta_general_logo', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'ta_general_logo', array(
        'label' => __( 'site logo', 'editorial' ),
        'type' => 'media',
        'mime_type' => 'image',
        'section' => 'ta_general'
    ) ) );

    $wp_customize->add_setting( 'ta_general_twitter', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( 'ta_general_twitter', array(
        'label' => __( 'twitter link', 'editorial' ),
        'type' => 'url',
        'section' => 'ta_general'
    ));

    $wp_customize->add_setting( 'ta_general_facebook', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( 'ta_general_facebook', array(
        'label' => __( 'facebook link', 'editorial' ),
        'type' => 'url',
        'section' => 'ta_general'
    ));

    $wp_customize->add_setting( 'ta_general_instagram', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( 'ta_general_instagram', array(
        'label' => __( 'instagram link', 'editorial' ),
        'type' => 'url',
        'section' => 'ta_general'
    ));

    $wp_customize->add_setting( 'ta_general_github', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( 'ta_general_github', array(
        'label' => __( 'github link', 'editorial' ),
        'type' => 'url',
        'section' => 'ta_general'
    ));

    $wp_customize->add_setting( 'ta_general_featured_post', array(
        'type' => 'theme_mod',
        'default' => __( '1', 'editorial' )
    ));

    $wp_customize->add_control( 'ta_general_featured_post', array(
        'label' => __( 'featured post ID', 'editorial' ),
        'type' => 'text',
        'section' => 'ta_general'
    ));

    $wp_customize->add_setting( 'ta_features_show', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( 'ta_features_show', array(
        'label' => __( 'Show/hide services section', 'editorial' ),
        'type' => 'checkbox',
        'section' => 'ta_features'
    ));

    $wp_customize->add_setting( 'ta_features_title', array(
        'type' => 'theme_mod',
        'default' => __( 'Erat lacinia', 'editorial' )
    ));

    $wp_customize->add_control( 'ta_features_title', array(
        'label' => __( 'title', 'editorial' ),
        'type' => 'text',
        'section' => 'ta_features'
    ));

    $wp_customize->add_setting( 'ta_contact_title', array(
        'type' => 'theme_mod',
        'default' => __( 'Get in touch', 'editorial' )
    ));

    $wp_customize->add_control( 'ta_contact_title', array(
        'label' => __( 'title', 'editorial' ),
        'type' => 'text',
        'section' => 'ta_contact'
    ));

    $wp_customize->add_setting( 'ta_contact_text', array(
        'type' => 'theme_mod',
        'default' => __( 'Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.', 'editorial' )
    ));

    $wp_customize->add_control( 'ta_contact_text', array(
        'label' => __( 'text', 'editorial' ),
        'type' => 'textarea',
        'section' => 'ta_contact'
    ));

    $wp_customize->add_setting( 'ta_contact_email', array(
        'type' => 'theme_mod',
        'default' => __( 'information@untitled.tld', 'editorial' )
    ));

    $wp_customize->add_control( 'ta_contact_email', array(
        'label' => __( 'email address', 'editorial' ),
        'type' => 'text',
        'section' => 'ta_contact'
    ));

    $wp_customize->add_setting( 'ta_contact_phone', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( 'ta_contact_phone', array(
        'label' => __( 'phone number', 'editorial' ),
        'type' => 'text',
        'section' => 'ta_contact'
    ));

    $wp_customize->add_setting( 'ta_contact_address', array(
        'type' => 'theme_mod'
    ));

    $wp_customize->add_control( 'ta_contact_address', array(
        'type' => 'textarea',
        'section' => 'ta_contact'
    ));

    $wp_customize->add_setting( 'ta_footer_copyright', array(
        'type' => 'theme_mod',
        'default' => __( 'Untitled. All rights reserved.', 'editorial' )
    ));

    $wp_customize->add_control( 'ta_footer_copyright', array(
        'label' => __( 'copyright statement', 'editorial' ),
        'type' => 'text',
        'section' => 'ta_footer'
    ));


}
add_action( 'customize_register', 'editorial_customize_register' );
endif;