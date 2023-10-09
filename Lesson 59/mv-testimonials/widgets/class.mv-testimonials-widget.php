<?php

class MV_Testimonials_Widget extends WP_Widget{
    public function __construct(){
        $widget_options = array(
            'description'   => __( 'Your most beloved testimonials', 'mv-testimonials' )
        );

        parent::__construct(
            'mv-testimonials',
            'MV Testimonials',
            $widget_options
        );

        add_action(
            'widgets_init', function(){
                register_widget(
                    'MV_Testimonials_Widget'
                );
            }
        );
    }

    public function form( $instance ){

    }

    public function widget( $args, $instance ){

    }

    public function update( $new_instance, $old_instance ){

    }
}