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
 * @todo Register fields in English and translate it when is need
 * @todo Improve these postmeta updates generating own hash to name fields
 * @todo Fix the ID from post_type... I have to discover how it works...
 */
function register_fields_to_previous_inserted_post($inserted_post)
{
    update_post_meta($inserted_post, 'field_53cd1a6133396', 'a:11:{s:3:"key";s:19:"field_53cd1a6133396";s:5:"label";s:12:"Data Inicial";s:4:"name";s:12:"data_inicial";s:4:"type";s:11:"date_picker";s:12:"instructions";s:0:"";s:8:"required";s:1:"1";s:11:"date_format";s:6:"yymmdd";s:14:"display_format";s:8:"dd/mm/yy";s:9:"first_day";s:1:"0";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:0;}');
    update_post_meta($inserted_post, 'field_53cd1a8833397', 'a:11:{s:3:"key";s:19:"field_53cd1a8833397";s:5:"label";s:10:"Data Final";s:4:"name";s:10:"data_final";s:4:"type";s:11:"date_picker";s:12:"instructions";s:0:"";s:8:"required";s:1:"1";s:11:"date_format";s:6:"yymmdd";s:14:"display_format";s:8:"dd/mm/yy";s:9:"first_day";s:1:"0";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:1;}');
    update_post_meta($inserted_post, 'field_53cd4b73ac22e', 'a:11:{s:3:"key";s:19:"field_53cd4b73ac22e";s:5:"label";s:6:"Imagem";s:4:"name";s:6:"imagem";s:4:"type";s:5:"image";s:12:"instructions";s:116:"A imagem tem preferência de exibição. Caso seja adicionado um video no mesmo post somente a imagem será exibida.";s:8:"required";s:1:"0";s:11:"save_format";s:6:"object";s:12:"preview_size";s:6:"medium";s:7:"library";s:3:"all";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:2:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:2;}');
    update_post_meta($inserted_post, 'field_53cd4ba8ac22f', 'a:14:{s:3:"key";s:19:"field_53cd4ba8ac22f";s:5:"label";s:6:"Vídeo";s:4:"name";s:5:"video";s:4:"type";s:4:"text";s:12:"instructions";s:178:"Cole o link direto para o video, exemplo: <strong>https://www.youtube.com/watch?v=Rar21SPvYuc</strong>. Se uma imagem foi adicionada anteriromente este vídeo não será exibida.";s:8:"required";s:1:"0";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"none";s:9:"maxlength";s:0:"";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:2:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:3;}');
    update_post_meta($inserted_post, 'field_53cd4c1eac230', 'a:14:{s:3:"key";s:19:"field_53cd4c1eac230";s:5:"label";s:18:"Crédito da mídia";s:4:"name";s:13:"credito_midia";s:4:"type";s:4:"text";s:12:"instructions";s:83:"Informe os créditos da imagem ou do vídeo que ficará disposto na linha do tempo.";s:8:"required";s:1:"1";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"none";s:9:"maxlength";s:3:"255";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:4;}');
    update_post_meta($inserted_post, 'field_53cd4c63ac231', 'a:14:{s:3:"key";s:19:"field_53cd4c63ac231";s:5:"label";s:16:"Nome Alternativo";s:4:"name";s:16:"nome_alternativo";s:4:"type";s:4:"text";s:12:"instructions";s:110:"Informe o nome alternativo. Este aparecerá sempre que a imagem ou vídeo não for carregado por algum motivo.";s:8:"required";s:1:"1";s:13:"default_value";s:0:"";s:11:"placeholder";s:0:"";s:7:"prepend";s:0:"";s:6:"append";s:0:"";s:10:"formatting";s:4:"html";s:9:"maxlength";s:3:"255";s:17:"conditional_logic";a:3:{s:6:"status";s:1:"0";s:5:"rules";a:1:{i:0;a:3:{s:5:"field";s:4:"null";s:8:"operator";s:2:"==";s:5:"value";s:0:"";}}s:8:"allorany";s:3:"all";}s:8:"order_no";i:5;}');

    //TODO Fix the ID from post_type... I have to discover how it works...
    update_post_meta($inserted_post, 'rule', 'a:5:{s:5:"param";s:9:"post_type";s:8:"operator";s:2:"==";s:5:"value";s:8:"timeline";s:8:"order_no";i:0;s:8:"group_no";i:0;}');
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