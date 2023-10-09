<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    
            <?php

            while( have_posts() ): 
                the_post();

            ?>
                    <article id="post-<?php the_ID(); ?>">
                        <div class="translation-item">                   
                            <div class="content">
                                <h1>Title</h1>
                                <div class="meta">
                                    <span class="singer"><strong><?php _e( 'Singer', 'mv-translations' ); ?>:</strong>
                                        Singer list
                                    </span>
                                    <span class="author"><strong><?php _e( 'Author', 'mv-translations' ); ?>: </strong>
                                        Author link
                                    </span>
                                    <span class="the-date"><strong><?php _e( 'Published on', 'mv-translations' ); ?>: </strong>
                                        Date
                                    </span>                            
                                </div>
                                <div class="content">
                                    Content                            
                                </div>
                                <div class="video">
                                    Video
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </main>
        </div>
    </div>
<?php
get_footer();