<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    
            <?php

            global $wpdb; 
            $q = $wpdb->prepare(
                "SELECT meta_value
                FROM $wpdb->posts AS p
                INNER JOIN $wpdb->translationmeta AS tm
                ON p.ID = tm.translation_id
                WHERE p.ID = %d",
                get_the_ID()
            );
            $results = $wpdb->get_results( $q, ARRAY_A );
            $has_transliteration = $results[0]['meta_value'] == "Yes" ? "has-transliteration" : "";

            while( have_posts() ): 
                the_post();

            ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( $has_transliteration ); ?>>
                        <div class="translation-item">                   
                            <div class="content">
                                <?php do_action( 'mvt_content' ); ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </main>
        </div>
    </div>
<?php
get_footer();