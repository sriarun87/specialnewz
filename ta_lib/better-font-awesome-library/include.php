<?php

// enqueue font-awesome icons into admin dashboard
function get_icons()
    {
        require_once ( dirname( __FILE__ ) . '/better-font-awesome-library.php' );

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
        wp_register_style( 'custom_wp_admin_css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css', false, '4.6.3' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
 
 add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );




  // ############################################# meta_boxes  #############################################

 function add_custom_meta_box()
 {
     add_meta_box("ta_features_icon", "features icon (if featured image not used)", "ta_features_icon_markup", "ta_features", "advanced", "high", null);
     add_meta_box("ta_features_color", "features column background color", "ta_features_color_markup", "ta_features", "advanced", "high", null);

     // testimonials
     add_meta_box("ta_testimonials_position", "testimonial author position", "ta_testimonials_position_markup", "ta_testimonials", "advanced", "high", null);
     add_meta_box("ta_testimonials_facebook", "facebook page link", "ta_testimonials_facebook_markup", "ta_testimonials", "advanced", "high", null);
     add_meta_box("ta_testimonials_twitter", "twitter page link", "ta_testimonials_twitter_markup", "ta_testimonials", "advanced", "high", null);
     add_meta_box("ta_testimonials_instagram", "instagram page link", "ta_testimonials_instagram_markup", "ta_testimonials", "advanced", "high", null);

 }

 add_action("add_meta_boxes", "add_custom_meta_box");


 // ############################################# markups

 //-----------features

 function ta_features_icon_markup($object)
 {
     wp_nonce_field(basename(__FILE__), "meta-box-featuresicon");

     ?>
         <div>
            <select style="padding: 0px 20px;font-family: 'fontawesome';" name="ta_features_icon">
                 <?php 
                 $icon = get_icons();
                 foreach ($icon as $key => $value) {
                 echo "<option value='".$key."' ".selected( get_post_meta($object->ID, "ta_features_icon", true), $key )."> ".$value." </option>";
                 }
                 ?>
                 </select>

             <br>
         </div>
     <?php  
 }

function ta_features_color_markup($object)
 {
     wp_nonce_field(basename(__FILE__), "meta-box-featurescolor");

     ?>
         <div>
            <?php $act_color = (get_post_meta($object->ID, "ta_features_color", true)) ? get_post_meta($object->ID, "ta_features_color", true) : "#be7411" ; ?>
            <input type="color" name="ta_features_color" value="<?php echo $act_color; ?>">
                 

             <br>
         </div>
     <?php  
 }


// testimonials

 function ta_testimonials_position_markup($object)
 {
     wp_nonce_field(basename(__FILE__), "meta-box-testimonialsposition");

     ?>
         <div>
            <?php $act_value = (get_post_meta($object->ID, "ta_testimonials_position", true)) ? get_post_meta($object->ID, "ta_testimonials_position", true) : " " ; ?>
            <input type="text" name="ta_testimonials_position" value="<?php echo $act_value; ?>">
                 

             <br>
         </div>
     <?php  
 }

 function ta_testimonials_facebook_markup($object)
 {
     wp_nonce_field(basename(__FILE__), "meta-box-testimonialsfacebook");

     ?>
         <div>
            <?php $act_value = (get_post_meta($object->ID, "ta_testimonials_facebook", true)) ? get_post_meta($object->ID, "ta_testimonials_facebook", true) : "#" ; ?>
            <input type="url" name="ta_testimonials_facebook" value="<?php echo $act_value; ?>">
                 

             <br>
         </div>
     <?php  
 }

function ta_testimonials_twitter_markup($object)
 {
     wp_nonce_field(basename(__FILE__), "meta-box-testimonialstwitter");

     ?>
         <div>
            <?php $act_value = (get_post_meta($object->ID, "ta_testimonials_twitter", true)) ? get_post_meta($object->ID, "ta_testimonials_twitter", true) : "#" ; ?>
            <input type="url" name="ta_testimonials_twitter" value="<?php echo $act_value; ?>">
                 

             <br>
         </div>
     <?php  
 }

 function ta_testimonials_instagram_markup($object)
 {
     wp_nonce_field(basename(__FILE__), "meta-box-testimonialsinstagram");

     ?>
         <div>
            <?php $act_value = (get_post_meta($object->ID, "ta_testimonials_instagram", true)) ? get_post_meta($object->ID, "ta_testimonials_instagram", true) : "#" ; ?>
            <input type="url" name="ta_testimonials_instagram" value="<?php echo $act_value; ?>">
                 

             <br>
         </div>
     <?php  
 }



 // ############################################ Updates

 function save_custom_meta_box($post_id, $post, $update)
 {
     // features icon
     
 	if(isset($_POST["ta_features_icon"]))
         {
             $new_meta_box_features_icon = $_POST["ta_features_icon"];
     		 update_post_meta($post_id, "ta_features_icon", $new_meta_box_features_icon);
         } 

        // features icon
        
    if(isset($_POST["ta_features_color"]))
            {
                $new_meta_box_features_color = $_POST["ta_features_color"];
                 update_post_meta($post_id, "ta_features_color", $new_meta_box_features_color);
            } 


    // testimonials

    if(isset($_POST["ta_testimonials_position"]))
            {
                $new_meta_box_testimonials_position = $_POST["ta_testimonials_position"];
                 update_post_meta($post_id, "ta_testimonials_position", $new_meta_box_testimonials_position);
            } 

    if(isset($_POST["ta_testimonials_facebook"]))
            {
                $new_meta_box_testimonials_facebook = $_POST["ta_testimonials_facebook"];
                 update_post_meta($post_id, "ta_testimonials_facebook", $new_meta_box_testimonials_facebook);
            } 

    if(isset($_POST["ta_testimonials_twitter"]))
            {
                $new_meta_box_testimonials_twitter = $_POST["ta_testimonials_twitter"];
                 update_post_meta($post_id, "ta_testimonials_twitter", $new_meta_box_testimonials_twitter);
            } 
    if(isset($_POST["ta_testimonials_instagram"]))
            {
                $new_meta_box_testimonials_instagram = $_POST["ta_testimonials_instagram"];
                 update_post_meta($post_id, "ta_testimonials_instagram", $new_meta_box_testimonials_instagram);
            } 

 }

 add_action("save_post", "save_custom_meta_box", 10, 3);
