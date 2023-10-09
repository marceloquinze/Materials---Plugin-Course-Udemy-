if (isset($_POST['action']) && $_POST['action'] == 'editpost') {

    $old_occupation = get_post_meta( $post_id, 'mv_testimonials_occupation', true ); 
    $new_occupation = $_POST['mv_testimonials_occupation'];
    $old_company    = get_post_meta( $post_id, 'mv_testimonials_company', true ); 
    $new_company    = $_POST['mv_testimonials_company'];
    $old_user_url   = get_post_meta( $post_id, 'mv_testimonials_user_url', true ); 
    $new_user_url   = $_POST['mv_testimonials_user_url']; 

    update_post_meta( $post_id, 'mv_testimonials_occupation', sanitize_text_field( $new_occupation ), $old_occupation );
    update_post_meta( $post_id, 'mv_testimonials_company', sanitize_text_field( $new_company ), $old_company );
    update_post_meta( $post_id, 'mv_testimonials_user_url', esc_url_raw( $new_user_url ), $old_user_url );
}



$occupation = get_post_meta( $post->ID, 'mv_testimonials_occupation', true );
$company = get_post_meta( $post->ID, 'mv_testimonials_company', true );
$user_url = get_post_meta( $post->ID, 'mv_testimonials_user_url', true );
