<?php
/**
 * Shortcode Tool
 * 
 * Here the magical happens
 * @since 0.1
 */

/**
 * Show the timeline as is it
 * 
 * @param array $atts
 * @since 0.1
 */
function shortcode_timeline( $atts = null )
{
    $end_json_content = array(
        'timeline' => array(
            'headline' => '',
            'type' => 'title',
            'text' => 'text',
            'startDate' => '',
            'date' => array(), //to be filled with the elements to timeline
        )
    );
    $count = 0;
    $itens = array();
    
    query_posts(array('post_type' => 'timeline', 'orderby' => 'id', 'order' => 'ASC'));
    
    if ( have_posts() ) : while( have_posts() ) : the_post(); 
        if ( 0 === $count ) {

            $end_json_content['timeline']['headline'] = get_the_title();
            $end_json_content['timeline']['type'] = 'default';
            $end_json_content['timeline']['text'] = get_the_content();
            $end_json_content['timeline']['startDate'] = date('Y,m,d', strtotime(get_field('data_inicial')));

        }
        
        $media = '';
        $video = get_field('video');
        $image = get_field('imagem');
        $media_is_image = false;

        if ( $video ) {
            $media = $video;
        }

        if ( $image ) {
            $media = $image['sizes']['medium'];
            $media_is_image = true;
        }
        
        $itens[$count] = array(
           'startDate' => date('Y,m,d', strtotime(get_field('data_inicial'))),
           'endDate' => date('Y,m,d', strtotime(get_field('data_final'))),
           'headline' => get_the_title(),
           'text' => get_the_content(),
           'asset' => array(
               'media' => $media,
               'credit' => get_field('credito_midia'),
               'caption' => get_field('nome_alternativo'),
           ),
        );
        
        if ( $media_is_image ) {
            $itens[$count]['asset']['thumbnail'] = $image['sizes']['thumbnail'];
        }
        
        $count++;
        
    endwhile;
    
        $end_json_content['timeline']['date'] = $itens; 
        
        // For PHP >5.4
        //$end_json_content = json_encode($end_json_content, JSON_UNESCAPED_SLASHES); 
        
        // For PHP <5.4
        $end_json_content = json_encode($end_json_content);
    ?>
        
        <div id="timeline-embed"></div>
        <script>
            var timeline_config = {
                width: '100%',
                type: 'timeline',
                height: '650',
                source: <?php echo str_replace('\/', '/', $end_json_content); ?>,
                debug: true,
                lang: 'pt-br',
                start_at_slide: 1,
                font: 'PT'
               }
        </script>
        <script type="text/javascript" src="http://cdn.knightlab.com/libs/timeline/latest/js/storyjs-embed.js"></script>

    <?php else : ?>
        
        <div class="no-content">
            <h3>
                <?php echo __('Sorry, no items to show'); ?>
            </h3>
        </div>
    <?php endif; 
}

add_shortcode( 'timeline', 'shortcode_timeline' );