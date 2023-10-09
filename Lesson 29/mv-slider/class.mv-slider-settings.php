<?php 

if( ! class_exists( 'MV_Slider_Settings' )){
    class MV_Slider_Settings{

        public static $options;

        public function __construct(){
            self::$options = get_option( 'mv_slider_options' );
            add_action( 'admin_init', array( $this, 'admin_init') );
        }

        public function admin_init(){
            add_settings_section(
                'mv_slider_main_section',
                'How does it work?',
                null,
                'mv_slider_page1'
            );

            add_settings_field(
                'mv_slider_shortcode',
                'Shortcode',
                array( $this, 'mv_slider_shortcode_callback' ),
                'mv_slider_page1',
                'mv_slider_main_section'
            );
        }

        public function mv_slider_shortcode_callback(){
            ?>
            <span>Use the shortcode [mv_slider] to display the slider in any page/post/widget</span>
            <?php
        }

    }
}

