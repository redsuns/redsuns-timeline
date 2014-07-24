<?php
/**
 * Shortcode Tool
 * 
 * Here the magical happens
 * @since 0.1
 */

/**
 * Provides the structure to build items for timeline.
 * 
 * Here are the skeleton of json to build timeline
 * 
 * @return array
 */
function array_initial_structure()
{
    return array(
        'timeline' => array(
            'headline' => '',
            'type' => 'title',
            'text' => 'text',
            'startDate' => '',
            'date' => array(),
        )
    );
}

/**
 * Put the first item as a cover into timeline
 * 
 * @param string $title
 * @param string $content
 * @param string $initial_date
 * @param array $atts
 * @return array
 */
function first_item($title, $content, $initial_date, $atts = null)
{
    $end_json_content = array_initial_structure();
    
    $end_json_content['timeline']['headline'] = $title;
    $end_json_content['timeline']['type'] = 'default';
    $end_json_content['timeline']['text'] = $content;
    $end_json_content['timeline']['startDate'] = date('Y,m,d', strtotime($initial_date));
    
    if ( !empty($atts) ) {
        
        $term = get_term_by('slug', current($atts), 'timeline-category');
        
        $end_json_content['timeline']['headline'] = $term->name;
        $end_json_content['timeline']['type'] = 'default';
        $end_json_content['timeline']['text'] = $term->description;
        $end_json_content['timeline']['startDate'] = date('Y,m,d');
        
    }
    
    return $end_json_content;
}

/**
 * @param string $image
 * @return boolean
 */
function media_is_image($image = null)
{
    if ( !empty($image) ) {
        return true;
    }
    return false;
}

/**
 * 
 * @param string $image
 * @param string $video
 */
function parse_media($image, $video)
{
    $media = '';
    if ($video) {
        $media = $video;
    }

    if ($image) {
        $media = $image['sizes']['medium'];
    }
    
    return $media;
}

/**
 * Converts an array to a json string with right use from the tested PHP versions
 * >5.3, >5.4 and >5.5
 * 
 * @param array $end_json_content
 * @return string
 */
function to_json($end_json_content)
{
    if( 5.4 > (float) phpversion() ) {
        return str_replace('\/', '/', json_encode($end_json_content));
    }
    
    return json_encode($end_json_content, JSON_UNESCAPED_SLASHES);
}


/**
 * Show the timeline as is it
 * 
 * @param array $atts
 * @since 0.1
 */
function shortcode_timeline( $atts = null )
{
    $end_json_content = array_initial_structure();
    $count = 0;
    $items = array();
    
    $args = array(
        'post_type' => 'timeline',
        'orderby' => 'id',
        'order' => 'ASC',
    );
    
    if( !empty($atts) ) {
        $args['timeline-category'] = current($atts);
    }
    
    query_posts($args);
    
    if ( have_posts() ) : while( have_posts() ) : the_post(); 
        
        if ( 0 === $count ) {
            $end_json_content = first_item(get_the_title(), get_the_content(), get_field('initial_date'), $atts);
        }
        
        $video = get_field('video');
        $image = get_field('image');
        
        $items[$count] = array(
           'startDate' => date('Y,m,d', strtotime(get_field('initial_date'))),
           'endDate' => date('Y,m,d', strtotime(get_field('final_date'))),
           'headline' => get_the_title(),
           'text' => get_the_content(),
           'asset' => array(
               'media' => parse_media($image, $video),
               'credit' => get_field('media_credit'),
               'caption' => get_field('media_caption'),
           ),
        );
        
        if (media_is_image($image) ) {
            $items[$count]['asset']['thumbnail'] = $image['sizes']['thumbnail'];
        }
        
        $count++;
        
    endwhile;
    
        $end_json_content['timeline']['date'] = $items; 
    ?>
        
        <div id="timeline-embed"></div>
        <script>
            var timeline_config = {
                width: '100%',
                type: 'timeline',
                height: '650',
                source: <?php echo to_json($end_json_content); ?>,
                debug: true,
                lang: 'pt-br',
                start_at_slide: <?php echo !empty($atts) ? 0 : 1; ?>,
                font: 'PT'
               }
        </script>
        <script type="text/javascript" src="http://cdn.knightlab.com/libs/timeline/latest/js/storyjs-embed.js"></script>

    <?php else : ?>
        
        <div class="no-content">
            <h3>
                <?php echo __('Sorry, no items to show', 'redsuns-timeline'); ?>
            </h3>
        </div>
    <?php endif; 
}

add_shortcode( 'timeline', 'shortcode_timeline' );