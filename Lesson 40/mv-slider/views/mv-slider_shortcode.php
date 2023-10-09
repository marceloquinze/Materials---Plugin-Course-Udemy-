<h3><?php echo ( ! empty ( $content ) ) ? esc_html( $content ) : esc_html( MV_Slider_Settings::$options['mv_slider_title'] ); ?></h3>
<div class="mv-slider flexslider ">
    <ul class="slides">
    <?php 
    
    $args = array(
        'post_type' => 'mv-slider',
        'post_status'   => 'publish',
        'post__in'  => $id,
        'orderby' => $orderby
    );

    $my_query = new WP_Query( $args );

    ?>
        <li>
            <div class="mvs-container">
                <div class="slider-details-container">
                    <div class="wrapper">
                        <div class="slider-title">
                            <h2>Slider Title</h2>
                        </div>
                        <div class="slider-description">
                            <div class="subtitle">Subtitle</div>
                            <a class="link" href="#">Button text</a>
                        </div>
                    </div>
                </div>              
            </div>
        </li>
    </ul>
</div>