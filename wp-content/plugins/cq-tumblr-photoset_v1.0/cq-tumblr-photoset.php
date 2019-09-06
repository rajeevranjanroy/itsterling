<?php
/*
    Plugin Name: Tumblr Photoset Like Gallery for WordPress
    Description: A plugin help you to add Tumblr Photoset like responsive grid gallery to your post or page via shortcode.
    Author: Sike
    Author URI: http://codecanyon.net/user/sike?ref=sike
    Version: 1.0
*/

class CQ_Tumblr_Photoset {

    public function __construct() {
        $this->register_post_type();
        $this->add_metaboxes();
        $this->add_admin_assets();
        $this->add_shortcode_columns();
        // $this->cq_tumblr_photoset_deactive();
    }



    public function register_post_type(){
        $labels = array(
            'name' => _x("Tumblr Photoset", 'cq_tumblr_photoset'),
            'menu_name' => _x('Tumblr Photoset', 'cq_tumblr_photoset'),
            'singular_name' => _x('Tumblr Photoset', 'cq_tumblr_photoset'),
            'add_new' => _x('Add New Photoset', 'cq_tumblr_photoset'),
            'add_new_item' => __('Add New Photoset'),
            'edit_item' => __('Edit Photoset'),
            'new_item' => __('New Photoset'),
            'view_item' => __('View Photoset'),
            'search_items' => __('Search Photoset'),
            'not_found' =>  __('No Photoset Found'),
            'not_found_in_trash' => __('No Photoset Found in Trash'),
            'parent_item_colon' => ''
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'description' => 'photoset',
            // 'supports' => array('title', 'custom-fields'),
            'supports' => array('title'),
            'public' => false,
            // 'menu_position' => 80,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post'
        );

        register_post_type('cq_tumblr_photoset', $args);
    }

    public function cq_tumblr_photoset_deactive(){
       register_deactivation_hook(__FILE__, 'remove_cq_tumblr_photoset_options');
       function remove_cq_tumblr_photoset_options(){
           delete_option('cq_tumblr_photoset_fields');
       }
    }


    public function add_metaboxes(){
        function cq_tumblr_photoset_change_default_title( $title ){
             $screen = get_current_screen();
             if  ( $screen->post_type == 'cq_tumblr_photoset' ) {
                 echo 'Enter Your Photoset\'s Name';
             }
        }

        add_filter( 'enter_title_here', 'cq_tumblr_photoset_change_default_title');

        add_action('add_meta_boxes', 'cq_tumblr_photoset_add_meta_boxes_func');

        function cq_tumblr_photoset_add_meta_boxes_func(){
            add_meta_box( 'cq_tumblr_photoset_setting', __('Current Photoset Setting', 'cq_tumblr_photoset'), 'cq_tumblr_photoset_setting_func', 'cq_tumblr_photoset');
            add_meta_box('cq_tumblr_photoset_add_spot', __('Add Photoset', 'cq_tumblr_photoset'), 'cq_tumblr_photoset_add_content_func', 'cq_tumblr_photoset', 'normal', 'default');
            add_meta_box('cq_tumblr_photoset_shortcode', __('Get This Photoset\'s Codes', 'cq_tumblr_photoset'), 'cq_tumblr_photoset_codes_func', 'cq_tumblr_photoset' , 'side', 'low');
            global $cq_tumblr_photoset_fields, $post;
            $cq_tumblr_photoset_fields = get_post_meta($post->ID, 'cq_tumblr_photoset_fields', true);
            if($cq_tumblr_photoset_fields){
                add_meta_box('cq_tumblr_photoset_preview', __('Preview Photoset', 'cq_tumblr_photoset'), 'cq_tumblr_photoset_preview_func', 'cq_tumblr_photoset', 'normal', 'low');
            }
        };

        function cq_tumblr_photoset_preview_func(){
            global $cq_tumblr_photoset_fields, $post;
            echo do_shortcode('[tumblr_photoset id='.$post->ID.' /]');
        }

        function cq_tumblr_photoset_add_content_func(){
            global $cq_tumblr_photoset_fields, $post;
            $cq_tumblr_photoset_fields = get_post_meta($post->ID, 'cq_tumblr_photoset_fields', true);
            $output = '<input type="hidden" name="cq_tumblr_setting" value="'. wp_create_nonce(basename(__FILE__)). '" />';
            $output.= '<div class="wrap">';
            $output.= '<a class="button button-primary" id="tumblr_upload_thumbs" href="#">Add Image(s)</a> <span>(Support batch upload)</span>';
            $output.= '<ul class="photoset-admin-container" id="photoset-admin-container">';
            if($cq_tumblr_photoset_fields){
                foreach ($cq_tumblr_photoset_fields as $field) {
                    $output.= '<li class="thumb-item"><div class="admin-thumb-container"><img src="'.aq_resize($field["thumb_url"][0], 80).'" class="admin-thumb-img" alt="thumbnail" /></div>';
                    $output.='<div class="item-container">
                                    <input type="text" class="thumb-url widefat" name="thumb_url" data-name="thumb_url" value="'.$field["thumb_url"][0].'" /> <a class="upload_thumb button" href="#">Browse</a>
                                </div>
                                <a class="remove-item" href="#" title="Remove this thumbnail"></a>
                    </li>';

                }

            }else{

            }
            $output.= '</ul>';
            $output.='<div id="photoset-save-btn" style="display:none"><p><input type="submit" class="button button-primary save-btn" value="Save" /> (preview available after saving)</p>';
            $output.='<p>Note: You can drag each image to re-order it.</p>';
            $output.= '</div></div>';

            echo html_entity_decode($output);
        }


        // the global photoset setting panel
        function cq_tumblr_photoset_setting_func(){
            global $cq_tumblr_photoset_fields, $post;
            $cq_tumblr_photoset_largeimg = array(
                array(
                    'text' => 'Lightbox',
                    'value' => 'lightbox'
                ),
                array(
                    'text' => 'Link',
                    'value' => 'link'
                ),
                array(
                    'text' => 'None',
                    'value' => 'none'
                )
            );

            $output = '<input type="hidden" name="cq_tumblr_setting" value="'. wp_create_nonce(basename(__FILE__)). '" />';
            $output .= '<div>';
            if($cq_tumblr_photoset_fields){
                $output.= '<table class="cq-setting-table">';
                $output.='<tr><td width="40%">Photoset Layout: </td><td><input type="text" class="large-text" name="cq_tumblr_photoset_layout" data-name="cq_tumblr_photoset_layout" value="'.$cq_tumblr_photoset_fields[0]['setting_arr']['cq_tumblr_photoset_layout'].'" /> </td></tr>';
                $output.='<tr><td width="40%"></td><td><span class="note-label">Each number stand for how many images in each row.</span></td></tr>';
                $output.='<tr><td width="40%">Padding Between Each Image: </td><td><input type="text" class="tiny-text" name="cq_tumblr_photoset_gutter" data-name="cq_tumblr_photoset_gutter" value="'.$cq_tumblr_photoset_fields[0]['setting_arr']['cq_tumblr_photoset_gutter'].'" /></td></tr>';
                $output.='<tr><td width="40%">Display High Resolution Image as: </td><td><select name="cq_tumblr_photoset_largeimageas" data-name="cq_tumblr_photoset_largeimageas">';
                for( $i=0; $i<count($cq_tumblr_photoset_largeimg); $i++ ) {
                    $output .= '<option '
                         . ( $cq_tumblr_photoset_fields[0]['setting_arr']['cq_tumblr_photoset_largeimageas'] == $cq_tumblr_photoset_largeimg[$i]['value'] ? 'selected="selected"' : '' ) . ' value="'.$cq_tumblr_photoset_largeimg[$i]['value'].'">'
                         . $cq_tumblr_photoset_largeimg[$i]['text']
                         . '</option>';
                }
                $output.='</select></td></tr>';
                $output.='<tr><td width="40%">Minimal Width of Image: </td><td><input type="text" class="tiny-text" name="cq_tumblr_photoset_miniwidth" data-name="cq_tumblr_photoset_miniwidth" value="'.$cq_tumblr_photoset_fields[0]['setting_arr']['cq_tumblr_photoset_miniwidth'].'" /></td></tr>';
                if($cq_tumblr_photoset_fields[0]['setting_arr']['cq_tumblr_photoset_slideshow']=="true"){
                    $output.= '<tr><td width="40%">Lightbox Auto Delay Slideshow: </td><td><input type="radio" name="cq_tumblr_photoset_slideshow" value="true" checked="checked">yes <input type="radio" name="cq_tumblr_photoset_slideshow" value="false">no <span class="input-label">Delay Time of slideshow</span>: <input type="text" class="small-text" name="cq_tumblr_photoset_delay" value="'.$cq_tumblr_photoset_fields[0]['setting_arr']['cq_tumblr_photoset_delay'].'" /></td></tr>';
                }else{
                    $output.= '<tr><td width="40%">Lightbox Auto delay slideshow: </td><td><input type="radio" name="cq_tumblr_photoset_slideshow" value="true">yes <input type="radio" name="cq_tumblr_photoset_slideshow" value="false" checked="checked">no <span class="input-label">Delay Time of slideshow</span>: <input type="text" class="small-text" name="cq_tumblr_photoset_delay" value="'.$cq_tumblr_photoset_fields[0]['setting_arr']['cq_tumblr_photoset_delay'].'" /></td></tr>';
                }
                $output.= '</table><br /><input type="submit" class="button button-primary metabox_submit" value="Save" />';
            }else{
                $output.= '<table class="cq-setting-table">';
                $output.='<tr><td width="40%">Photoset Layout: </td><td><input type="text" class="large-text" name="cq_tumblr_photoset_layout" data-name="cq_tumblr_photoset_layout" value="213412342321223433212342212" /> </td></tr>';
                $output.='<tr><td width="40%"></td><td><span class="note-label">Each number stand for how many images in each row.</span></td></tr>';
                $output.='<tr><td width="40%">Padding Between Each Image: </td><td><input type="text" class="tiny-text" name="cq_tumblr_photoset_gutter" data-name="cq_tumblr_photoset_gutter" value="0" /></td></tr>';
                $output.='<tr><td width="40%">Display High Resolution Image as: </td><td><select name="cq_tumblr_photoset_largeimageas" data-name="cq_tumblr_photoset_largeimageas">';
                for( $i=0; $i<count($cq_tumblr_photoset_largeimg); $i++ ) {
                    $output .= '<option '
                         . ( 'lightbox' == $cq_tumblr_photoset_largeimg[$i]['value'] ? 'selected="selected"' : '' ) . ' value="'.$cq_tumblr_photoset_largeimg[$i]['value'].'">'
                         . $cq_tumblr_photoset_largeimg[$i]['text']
                         . '</option>';
                }
                $output.='</select></td></tr>';
                $output.='<tr><td width="40%">Minimal Width of Image: </td><td><input type="text" class="tiny-text" name="cq_tumblr_photoset_miniwidth" data-name="cq_tumblr_photoset_miniwidth" value="300" /></td></tr>';
                $output.= '<tr><td width="40%">Lightbox Auto Delay Slideshow: </td><td><input type="radio" name="cq_tumblr_photoset_slideshow" value="true">yes <input type="radio" name="cq_tumblr_photoset_slideshow" value="false" checked="checked">no <span class="input-label">Delay Time of slideshow</span>: <input type="text" class="small-text" name="cq_tumblr_photoset_delay" value="5000" /></td></tr>';
                $output.= '</table><br /><input type="submit" class="button button-primary metabox_submit" value="Save" /></div>';
            }

            echo html_entity_decode($output);
        }

        // the shortcode panel on the right of admin page
        function cq_tumblr_photoset_codes_func(){
            global $post;
            echo '
            <p>Just copy and put it on the post or page editor:</p>
            <span class="code-snip">[tumblr_photoset id=', $post->ID ,' /]</span>
            <div class="clear"></div>
            <p>Or put it on the php file:</p>
            <span class="code-snip">&lt;?php echo do_shortcode(\'[tumblr_photoset id=',$post->ID,' /]\'); ?&gt;</span> <p>And you can view <a href="http://codecanyon.net/user/sike?ref=sike">more works</a> from me.</p>';
        }



        add_action( 'save_post', 'cq_tumblr_photoset_save_post');
        function cq_tumblr_photoset_save_post($id){
            // if(isset($_POST['cq_tumblr_photoset_setting'])){
            //     update_post_meta( $id, 'cq_tumblr_photoset_setting', strip_tags($_POST['cq_tumblr_photoset_setting']));
            // }
            // verify nonce
            // global $cq_tumblr_photoset_fields;

            if (!wp_verify_nonce($_POST['cq_tumblr_setting'], basename(__FILE__))) {
                return $id;
            }

            // check autosave
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return $id;
            }

            // check permissions
            if ('page' == $_POST['post_type']) {
                if (!current_user_can('edit_page', $id)) {
                    return $id;
                }
            } elseif (!current_user_can('edit_post', $id)) {
                return $id;
            }

            $old = get_post_meta($post_id, 'cq_tumblr_photoset_fields', true);
            $new = array();

            $cq_available_cate = $_POST['cq_available_cate'];
            $setting_arr = array(
                'cq_tumblr_photoset_layout' => $_POST['cq_tumblr_photoset_layout'],
                'cq_tumblr_photoset_largeimgas' => $_POST['cq_tumblr_photoset_largeimgas'],
                'cq_tumblr_photoset_miniwidth' => $_POST['cq_tumblr_photoset_miniwidth'],
                'cq_tumblr_photoset_gutter' => $_POST['cq_tumblr_photoset_gutter'],
                'cq_tumblr_photoset_largeimageas' => $_POST['cq_tumblr_photoset_largeimageas'],
                'cq_tumblr_photoset_slideshow' => $_POST['cq_tumblr_photoset_slideshow'],
                'cq_tumblr_photoset_delay' => $_POST['cq_tumblr_photoset_delay'],
            );



            $thumb_url = $_POST['thumb_url'];
            $thumb_lightbox_url = $_POST['thumb_lightbox_url'];
            for ( $j = 0; $j < count( $thumb_url); $j++ ) {
                $new[$j]['thumb_url'] = $thumb_url[$j];
                $new[$j]['thumb_lightbox_url'] = $thumb_lightbox_url[$j];
            }

            $new[0]['setting_arr'] = $setting_arr;

            if ( !empty( $new ) && $new != $old ){
                update_post_meta( $id, 'cq_tumblr_photoset_fields', $new );
            }else if(empty($new) && $old){
                delete_post_meta( $id, 'cq_tumblr_photoset_fields', $old );
            };

        }
    }

    public function add_admin_assets(){
        function cq_tumblr_photoset_admin_scripts() {
            $screen = get_current_screen();
            if($screen->post_type=="cq_tumblr_photoset"){
                wp_enqueue_media();
                wp_enqueue_script( 'cq_tumblr_photoset_admin', plugins_url('js/photoset.admin.js', __FILE__), array('jquery', 'jquery-ui-core', 'jquery-ui-sortable'));
            }
        }
        function cq_tumblr_photoset_admin_styles() {
            $screen = get_current_screen();
            if($screen->post_type=="cq_tumblr_photoset"){
                wp_enqueue_style('cq_tumblr_photoset_admin_css', plugins_url( 'css/photoset.admin.css' , __FILE__ ));
            }
        }
        add_action('admin_print_scripts', 'cq_tumblr_photoset_admin_scripts');
        add_action('admin_print_styles', 'cq_tumblr_photoset_admin_styles');
    }

    public function add_shortcode_columns(){
        add_filter('manage_edit-cq_tumblr_photoset_columns', 'cq_set_custom_edit_cq_tumblr_photoset_columns');
        add_filter('post_updated_messages', 'cq_tumblr_photoset_post_updated_messages');
        add_action('manage_cq_tumblr_photoset_posts_custom_column', 'cq_custom_cq_tumblr_photoset_column', 10, 2);

        function cq_set_custom_edit_cq_tumblr_photoset_columns($columns) {
            return $columns
            + array('tumblr_photoset_shortcode' => __('Shortcode'));
        }

        function cq_tumblr_photoset_post_updated_messages($messages){
            // global $post, $post_ID;
            $messages['cq_tumblr_photoset'] = array(
                0  => '',
                1  => __( 'photoset updated.', 'cq_tumblr_photoset' ),
                2  => __( 'Custom field updated.', 'cq_tumblr_photoset' ),
                3  => __( 'Custom field deleted.', 'cq_tumblr_photoset' ),
                4  => __( 'photoset updated.', 'cq_tumblr_photoset' ),
                5  => __( 'photoset updated.', 'cq_tumblr_photoset' ),
                6  => __( 'photoset created.', 'cq_tumblr_photoset' ),
                7  => __( 'photoset saved.', 'cq_tumblr_photoset' ),
                8  => __( 'photoset updated.', 'cq_tumblr_photoset' ),
                9  => __( 'photoset updated.', 'cq_tumblr_photoset' ),
                10 => __( 'photoset updated.', 'cq_tumblr_photoset' )
            );
            return $messages;

        }

        function cq_custom_cq_tumblr_photoset_column($column, $post_id) {

            $tumblr_photoset_meta = get_post_meta($post_id, "cq_tumblr_photoset", true);
            $tumblr_photoset_meta = ($tumblr_photoset_meta != '') ? json_decode($tumblr_photoset_meta) : array();
            switch ($column) {
                case 'tumblr_photoset_shortcode':
                    echo "[tumblr_photoset id='$post_id' /]";//.\r\n."Just copy the short code to your post or page.";
                    break;
            }
        }

    }


}

    add_action( 'init', 'cq_tumblr_photoset_init');

    function cq_tumblr_photoset_init(){
        new CQ_Tumblr_Photoset();
        include_once dirname(__FILE__).'/cq-tumblrphotoset-shortcode.php';
    }


?>
