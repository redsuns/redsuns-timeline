<?php
/**
 * Installer tool
 * 
 * Creates the structure to work with Advanced Custom Fields
 * @since 0.1
 */

/**
 * @returns int $inserted_post
 * @since 0.1
 */
function register_advanced_custom_fields_post()
{
    $inserted_post = 0;
    $post_exists = query_posts(array(
        'post_type' => 'acf',
        'name' => 'acf_timeline_details'
    ));

    if ( !$post_exists ) {
        $postarr = array(
            'post_name'         => 'acf_timeline_details',
            'post_title'        => 'Timeline Details',
            'post_status'       => 'publish',
            'post_type'         => 'acf',
            'post_author'       => 1,
            'ping_status'       => 'closed',
            'post_date'         => date('Y-m-d H:i:s'),
            'post_date_gmt'     => date('Y-m-d H:i:s'),
            'comment_status'    => 'closed',
        );

        $inserted_post = wp_insert_post($postarr);
    }
    
    return $inserted_post;
}

/**
 * Add fields to work with Advanced Custom Fields
 * 
 * @param type $inserted_post
 * @since 0.1
 */
function register_fields_to_previous_inserted_post($inserted_post)
{
    $initial_date_name = 'field_' . substr(md5('redsuns-timeline-initial-date'), 0, 13);
    $initial_date_options = array(
        'key' => $initial_date_name,
        'label' => 'Initial Date',
        'name' => 'initial_date',
        'type' => 'date_picker',
        'instructions' => '',
        'required' => 1,
        'date_format' => 'yymmdd',
        'display_format' => 'dd/mm/yy',
        'first_day' => 0,
        'conditional_logic' => array(
            'status' => 0,
            'rules' => array(
                0 => array(
                    'field' => null,
                    'operator' => '==',
                    'value' => ''
                )
            ),
            'allorany' => 'all',
        ),
        'order_no' => 0
    );
    update_post_meta($inserted_post, $initial_date_name, serialize($initial_date_options));
    
    $final_date_name = 'field_' . substr(md5('redsuns-timeline-final-date'), 0, 13);
    $final_date_options = array(
        'key' => $final_date_name,
        'label' => 'Final Date',
        'name' => 'final_date',
        'type' => 'date_picker',
        'instructions' => '',
        'required' => 1,
        'date_format' => 'yymmdd',
        'display_format' => 'dd/mm/yy',
        'first_day' => 0,
        'conditional_logic' => array(
            'status' => 0,
            'rules' => array(
                0 => array(
                    'field' => null,
                    'operator' => '==',
                    'value' => ''
                )
            ),
            'allorany' => 'all',
        ),
        'order_no' => 1
    );
    update_post_meta($inserted_post, $final_date_name, serialize($final_date_options));
    
    $image_name = 'field_' . substr(md5('redsuns-timeline-image'), 0, 13);
    $image_options = array(
        'key' => $image_name,
        'label' => 'Image',
        'name' => 'image',
        'type' => 'image',
        'instructions' => 'The image is more relevant than video, so if an image and a video is provided to same post only the image will appear.',
        'required' => 0,
        'save_format' => 'object',
        'preview_size' => 'medium',
        'library' => 'all',
        'conditional_logic' => array(
            'status' => 0,
            'rules' => array(
                0 => array(
                    'field' => null,
                    'operator' => '=='
                ),
            ),
            'allorany' => 'all',
        ),
        'order_no' => 2
    );
    update_post_meta($inserted_post, $image_name, serialize($image_options));
    
    $video_name = 'field_' . substr(md5('redsuns-timeline-video'), 0, 13);
    $video_options = array(
        'key' => $video_name,
        'label' => 'Video',
        'name' => 'video',
        'type' => 'text',
        'instructions' => 'Paste here the Youtube/Vimeo link. If an image was provided for this post just THE IMAGE will appear.',
        'required' => 0,
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
        'conditional_logic' => array(
            'status' => 0,
            'rules' => array(
                0 => array(
                    'field' => null,
                    'operator' => '==',
                ),
            ),
            'allorany' => 'all',
        ),
        'order_no' => 3
    );
    update_post_meta($inserted_post, $video_name, serialize($video_options));
    
    $media_credit_name = 'field_' . substr(md5('redsuns-timeline-media-credit'), 0, 13);
    $media_credit_options = array(
        'key' => $media_credit_name,
        'label' => 'Media Credits',
        'name' => 'media_credit',
        'type' => 'text',
        'instructions' => 'Provide here the credits for Image/Video used on this timeline event',
        'required' => 1,
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => 255,
        'conditional_logic' => array(
            'status' => 0,
            'rules' => array(
                0 => array(
                    'field' => null,
                    'operator' => '==',
                    'value' => '',
                ),
            ),
            'allorany' => 'all',
        ),
        'order_no' => 4,
    );
    update_post_meta($inserted_post, $media_credit_name, serialize($media_credit_options));
    
    
    $media_caption_name = 'field_' . substr(md5('redsuns-timeline-media-caption'), 0, 13);
    $media_caption_options = array(
        'key' => $media_caption_name,
        'label' => 'Media Caption',
        'name' => 'media_caption',
        'type' => 'text',
        'instructions' => 'The media caption',
        'required' => 1,
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => 255,
        'conditional_logic' => array(
            'status' => 0,
            'rules' => array(
                0 => array(
                    'field' => null,
                    'operator' => '==',
                    'value' => '',
                ),
            ),
            'allorany' => 'all',
        ),
        'order_no' => 5,
    );
    update_post_meta($inserted_post, $media_caption_name, serialize($media_caption_options));

    
    $rule = array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'timeline',
        'order_no' => 0,
        'group_no' => 0,
    );
    update_post_meta($inserted_post, 'rule', serialize($rule));
    update_post_meta($inserted_post, '_edit_last', '1');
    update_post_meta($inserted_post, 'position', 'normal');
    update_post_meta($inserted_post, 'layout', 'default');
    update_post_meta($inserted_post, 'hide_on_screen', '');
    update_post_meta($inserted_post, 'slide_template', 'default');
    update_post_meta($inserted_post, '_edit_lock', '1405963505:1');
}

/**
 * The very beggining
 */
function start_install()
{
    $inserted_post = register_advanced_custom_fields_post();
    if ( $inserted_post ) {
        register_fields_to_previous_inserted_post($inserted_post);
    }
}