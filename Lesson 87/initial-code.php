<h3><?php esc_html_e( 'Create your account', 'mv-translations' ); ?></h3>
<form action="" method="post" name="user_registeration">
    <label for="username"><?php esc_html_e( 'Username', 'mv-translations' ); ?> *</label>  
    <input type="text" name="username" required /><br />
    <label for="firstname"><?php esc_html_e( 'First Name', 'mv-translations' ); ?> *</label>  
    <input type="text" name="firstname" required /><br />
    <label for="lastname"><?php esc_html_e( 'Last Name', 'mv-translations' ); ?> *</label>  
    <input type="text" name="lastname" required /><br />
    <label for="useremail"><?php esc_html_e( 'Email address', 'mv-translations' ); ?> *</label>
    <input type="text" name="useremail" required /> <br />
    <label for="password"><?php esc_html_e( 'Password', 'mv-translations' ); ?> *</label>
    <input type="password" name="password" required /> <br />
    <input type="submit" name="user_registeration" value="<?php echo esc_attr__( 'Sign Up', 'mv-translations' ); ?>" />

    <input type="hidden" name="mv_translations_register_nonce" value="<?php echo wp_create_nonce( 'mv_translations_register_nonce' ); ?>">
    <input type="hidden" name="submitted" id="submitted" value="true" />
</form>
<h3><?php esc_html_e( 'Or login', 'mv-translations' ); ?></h3>
Login form goes here...