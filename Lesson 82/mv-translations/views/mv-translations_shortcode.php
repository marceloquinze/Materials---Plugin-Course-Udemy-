<div class="mv-translations">
    <form action="" method="POST" id="translations-form">
        <h2><?php esc_html_e( 'Submit new translation' , 'mv-translations' ); ?></h2>
        
        <label for="mv_translations_title"><?php esc_html_e( 'Title', 'mv-translations' ); ?> *</label>
        <input type="text" name="mv_translations_title" id="mv_translations_title" value="" required />
        <br />
        <label for="mv_translations_singer"><?php esc_html_e( 'Singer', 'mv-translations' ); ?> *</label>
        <input type="text" name="mv_translations_singer" id="mv_translations_singer" value="" required />

        <br />
        <?php wp_editor( '', 'mv_translations_content', array( 'wpautop' => true, 'media_buttons' => false ) ); ?>
        </br />
        
        <fieldset id="additional-fields">
            <label for="mv_translations_transliteration"><?php esc_html_e( 'Has transliteration?', 'mv-translations' ); ?></label>
            <select name="mv_translations_transliteration" id="mv_translations_transliteration">
                <option value="Yes"><?php esc_html_e( 'Yes', 'mv-translations' ); ?></option>
                <option value="No"><?php esc_html_e( 'No', 'mv-translations' ); ?></option>
            </select>
            <label for="mv_translations_video_url"><?php esc_html_e( 'Video URL', 'mv-translations' ); ?></label>
            <input type="url" name="mv_translations_video_url" id="mv_translations_video_url" value="" />
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