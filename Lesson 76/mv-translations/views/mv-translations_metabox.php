<table class="form-table mv-translations-metabox"> 
    <!-- Nonce -->
    <input type="hidden" name="mv_translations_nonce" value="<?php echo wp_create_nonce( 'mv_translations_nonce' ); ?>">
    <tr>
        <th>
            <label for="mv_translations_transliteration"><?php esc_html_e( 'Has transliteration?', 'mv-translations' ); ?></label>
        </th>
        <td>
            <select name="mv_translations_transliteration" id="mv_translations_transliteration">
                <option value="Yes"><?php esc_html_e( 'Yes', 'mv-translations' )?></option>';
                <option value="No"><?php esc_html_e( 'No', 'mv-translations' )?></option>';
            </select>            
        </td>
    </tr>
    <tr>
        <th>
            <label for="mv_translations_video_url"><?php esc_html_e( 'Video URL', 'mv-translations' ); ?></label>
        </th>
        <td>
            <input 
                type="url" 
                name="mv_translations_video_url" 
                id="mv_translations_video_url" 
                class="regular-text video-url"
                value=""
            >
        </td>
    </tr> 
</table>