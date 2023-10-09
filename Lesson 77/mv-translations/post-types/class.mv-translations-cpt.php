<?php

if( ! class_exists( 'MV_Translations_Post_Type' )){
    class MV_Translations_Post_Type{
        public function __construct(){
            add_action( 'init', array( $this, 'create_post_type' ) );
            add_action( 'init', array( $this, 'create_taxonomy' ) );
            add_action( 'init', array( $this, 'register_metadata_table' ) );
            add_action(  'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        }

        public function create_post_type(){
            register_post_type(
                'mv-translations',
                array(
                    'label' => esc_html__( 'Translation', 'mv-translations' ),
                    'description'   => esc_html__( 'Translations', 'mv-translations' ),
                    'labels' => array(
                        'name'  => esc_html__( 'Translations', 'mv-translations' ),
                        'singular_name' => esc_html__( 'Translation', 'mv-translations' ),
                    ),
                    'public'    => true,
                    'supports'  => array( 'title', 'editor', 'author' ),
                    'rewrite'   => array( 'slug' => 'translations' ),
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
                    'menu_icon' => 'dashicons-admin-site',
                )
            );
        }

        public function create_taxonomy(){
            register_taxonomy(
                'singers',
                'mv-translations',
                array(
                    'labels' => array(
                        'name'  => __( 'Singers', 'mv-translations' ),
                        'singular_name' => __( 'Singer', 'mv-translations' ),
                    ),
                    'hierarchical' => false,
                    'show_in_rest' => true,
                    'public'    => true,
                    'show_admin_column' => true
                )
            );
        }

        public function register_metadata_table(){
            global $wpdb;
            $wpdb->translationmeta = $wpdb->prefix . 'translationmeta';
        }

        public function add_meta_boxes(){
            add_meta_box(
                'mv_translations_meta_box',
                esc_html__( 'Translations Options', 'mv-translations' ),
                array( $this, 'add_inner_meta_boxes' ),
                'mv-translations',
                'normal',
                'high'
            );
        }

        public function add_inner_meta_boxes( $post ){
            require_once( MV_TRANSLATIONS_PATH . 'views/mv-translations_metabox.php' );
        }
    }
}
