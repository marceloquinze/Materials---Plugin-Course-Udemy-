<?php

if( !class_exists('MV_Testimonials_Post_Type')){
    class MV_Testimonials_Post_Type{
        public function __construct(){
            add_action( 'init', array( $this, 'create_post_type' ) );
        }

        public function create_post_type(){
            register_post_type(
                'mv-testimonials',
                array(
                    'label' => esc_html__( 'Testimonial', 'mv-testimonials' ),
                    'description'   => esc_html__( 'Testimonials', 'mv-testimonials' ),
                    'labels' => array(
                        'name'  => esc_html__( 'Testimonials', 'mv-testimonials' ),
                        'singular_name' => esc_html__( 'Testimonial', 'mv-testimonials' ),
                    ),
                    'public'    => true,
                    'supports'  => array( 'title', 'editor', 'thumbnail' ),
                    'hierarchical'  => false,
                    'show_ui'   => true,
                    'show_in_menu'  => true,
                    'menu_position' => 5,
                    'show_in_admin_bar' => true,
                    'show_in_nav_menus' => true,
                    'can_export'    => true,
                    'has_archive'   => true,
                    'exclude_from_search'   => false,
                    'publicly_queryable'    => true,
                    'show_in_rest'  => true,
                    'menu_icon' => 'dashicons-testimonial',
                )
            );
        }
    }  
}
