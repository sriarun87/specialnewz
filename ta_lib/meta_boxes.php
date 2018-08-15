<?php 
function add_custom_meta_box()
{
    // services
    // add_meta_box("ta_single_bgImage", "single post title background image", "custom_meta_box_markup", array("post","page"), "advanced", "high", null);
    add_meta_box("ta_services_icon", "services icon", "ta_services_icon_markup", "services", "advanced", "high", null);
    // add_meta_box("ta_services_where", " Section of the homepage where to display this post", "ta_services_where_markup", "services", "advanced", "high", null);

    //testimonials
}

add_action("add_meta_boxes", "add_custom_meta_box");


// ############################################# markups

//-----------services

function ta_services_icon_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-servicesicon");

    ?>
        <div>
           <select style="padding: 0px 20px;font-family: 'fontawesome';" name="ta_services_icon">
                <?php 
                $icon = get_icons();
                foreach ($icon as $key => $value) {
                echo "<option value='".$key."' ".selected( get_post_meta($object->ID, "ta_services_icon", true), $key )."> ".$value." </option>";
                }
                ?>
                </select>

            <br>
        </div>
    <?php  
}

function ta_services_where_markup($object)
{

    wp_nonce_field(basename(__FILE__), "meta-box-serviceswhere");

    ?>
        <div>
            
            <select style="padding: 0px 20px;" name="ta_services_where">
              <option value="services" <?php selected( get_post_meta($object->ID, "ta_services_where", true), "services" ); ?>>services section</option>
              <option value="about" <?php selected( get_post_meta($object->ID, "ta_services_where", true), "about" ); ?>>about us section</option>
               
                </select>
            <br>
        </div>
    <?php  
}


//# single post background image
function custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="backgroundImage-link">single post title background image :</label> <br>
            <input name="backgroundImage-link" class="widefat input_url1" type="text" value="<?php echo get_post_meta($object->ID, "backgroundImage-link", true); ?>">

            <br>
        </div>
        <input type='button' class='button button-primary button1' id='button1' value='Add Image'/>
    <?php  
}



// ############################################ Updates

function save_custom_meta_box($post_id, $post, $update)
{
    // services icon
    $new_meta_box_services_icon = "fa fa-wordpress";
	if(isset($_POST["ta_services_icon"]))
        {
            $new_meta_box_services_icon = $_POST["ta_services_icon"];
        } 
    update_post_meta($post_id, "ta_services_icon", $new_meta_box_services_icon);

    //     // services where
    // $new_meta_box_services_where = "services";
    // if(isset($_POST["ta_services_where"]))
    //     {
    //         $new_meta_box_services_where = $_POST["ta_services_where"];
    //     } 
    // update_post_meta($post_id, "ta_services_where", $new_meta_box_services_where);

    // // single post bg img
    // $backgroundImage_value = "";


    // if(isset($_POST["backgroundImage-link"]))
    // {
    //     $backgroundImage_value = $_POST["backgroundImage-link"];
    // }   
    // update_post_meta($post_id, "backgroundImage-link", $backgroundImage_value);

}

add_action("save_post", "save_custom_meta_box", 10, 3);


// if (is_admin()){

// add_action('admin_enqueue_scripts', 'wst_admin_scripts');
// function wst_admin_scripts() {
//     wp_enqueue_media();
//     wp_enqueue_script('widget_script', get_template_directory_uri() .
//         '/js/widget.js', false, '1.0', true);
//     }

//       // <input type='button' class='button button-primary button1' id='button1' value='Add Image'/>

// }