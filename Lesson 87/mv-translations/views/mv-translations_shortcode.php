<?php

if( ! is_user_logged_in() ){
    mvt_register_user();
    return;
}

if( isset( $_POST['mv_translations_nonce'] ) ){
    if( ! wp_verify_nonce( $_POST['mv_translations_nonce'], 'mv_translations_nonce' ) ){
        return;
    }
}

$errors = array();
$hasError = false;

if( isset( $_POST['submitted'])){
    $title              = $_POST['mv_translations_title'];
    $content            = $_POST['mv_translations_content'];
    $singer             = $_POST['mv_translations_singer'];
    $transliteration    = $_POST['mv_translations_transliteration'];
    $video              = $_POST['mv_translations_video_url'];

    if( trim( $title ) === '' ){
        $errors[] = esc_html__( 'Please, enter a title', 'mv-translations' );
        $hasError = true;
    }

    if( trim( $content ) === '' ){
        $errors[] = esc_html__( 'Please, enter some content', 'mv-translations' );
        $hasError = true;
    }

    if( trim( $singer ) === '' ){
        $errors[] = esc_html__( 'Please, enter some singer', 'mv-translations' );
        $hasError = true;
    }

    if( $hasError === false ){
        $post_info = array(
            'post_type' => 'mv-translations',
            'post_title'    => sanitize_text_field( $title ),
            'post_content'  => wp_kses_post( $content ),
            'tax_input' => array(
                'singers'   => sanitize_text_field( $singer )
            ),
            'post_status'   => 'pending'
        );

        $post_id = wp_insert_post( $post_info );

        global $post;
        MV_Translations_Post_Type::save_post( $post_id, $post );        
    }

}
?>
<div class="mv-translations">
    <form action="" method="POST" id="translations-form">
        <h2><?php esc_html_e( 'Submit new translation' , 'mv-translations' ); ?></h2>

        <?php 
            if( $errors != '' ){
                foreach( $errors as $error ){
                    ?>
                        <span class="error">
                            <?php echo $error; ?>
                        </span>
                    <?php
                }
            }
        ?>
        
        <label for="mv_translations_title"><?php esc_html_e( 'Title', 'mv-translations' ); ?> *</label>
        <input type="text" name="mv_translations_title" id="mv_translations_title" value="<?php if( isset( $title ) ) echo $title; ?>" required />
        <br />
        <label for="mv_translations_singer"><?php esc_html_e( 'Singer', 'mv-translations' ); ?> *</label>
        <input type="text" name="mv_translations_singer" id="mv_translations_singer" value="<?php if( isset( $singer ) ) echo $singer; ?>" required />

        <br />
        <?php 
        if( isset( $content )){
            wp_editor( $content, 'mv_translations_content', array( 'wpautop' => true, 'media_buttons' => false ) );
        }else{
            wp_editor( '', 'mv_translations_content', array( 'wpautop' => true, 'media_buttons' => false ) );
        }
        ?>
        </br />
        
        <fieldset id="additional-fields">
            <label for="mv_translations_transliteration"><?php esc_html_e( 'Has transliteration?', 'mv-translations' ); ?></label>
            <select name="mv_translations_transliteration" id="mv_translations_transliteration">
                <option value="Yes" <?php if( isset( $transliteration ) ) selected( $transliteration, "Yes" ); ?>><?php esc_html_e( 'Yes', 'mv-translations' ); ?></option>
                <option value="No" <?php if( isset( $transliteration ) ) selected( $transliteration, "No" ); ?>><?php esc_html_e( 'No', 'mv-translations' ); ?></option>
            </select>
            <label for="mv_translations_video_url"><?php esc_html_e( 'Video URL', 'mv-translations' ); ?></label>
            <input type="url" name="mv_translations_video_url" id="mv_translations_video_url" value="<?php if( isset( $video ) ) echo $video; ?>" />
        </fieldset>
        <br />
        <input type="hidden" name="mv_translations_action" value="save">
        <input type="hidden" name="action" value="editpost">
        <input type="hidden" name="mv_translations_nonce" value="<?php echo wp_create_nonce( 'mv_translations_nonce' ); ?>">
        <input type="hidden" name="submitted" id="submitted" value="true" />
        <input type="submit" name="submit_form" value="<?php esc_attr_e( 'Submit', 'mv-translations' ); ?>" />
    </form>
</div>
<div class="translations-list">
            <table>
                <caption><?php esc_html_e( 'Your Translations', 'mv-translations' ); ?></caption>
                <thead>
                    <tr>
                        <th><?php esc_html_e( 'Date', 'mv-translations' ); ?></th>
                        <th><?php esc_html_e( 'Title', 'mv-translations' ); ?></th>
                        <th><?php esc_html_e( 'Transliteration', 'mv-translations' ); ?></th>
                        <th><?php esc_html_e( 'Edit?', 'mv-translations' ); ?></th>
                        <th><?php esc_html_e( 'Delete?', 'mv-translations' ); ?></th>
                        <th><?php esc_html_e( 'Status', 'mv-translations' ); ?></th>
                    </tr>
                </thead>  
                <tbody>  
                    <tr>
                        <td>Date</td>
                        <td>Title</td>
                        <td>Transliteraton</td>
                        <td>Edit</td>
                        <td>Delete</td>
                        <td>Status</td>
                    </tr>
            </tbody>
        </table>
</div>