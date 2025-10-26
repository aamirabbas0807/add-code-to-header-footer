<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="wrap">
    <h1>Add Code to Header &amp; Footer</h1>

    <form method="post" action="options.php">
        <?php
            // Output nonce, settings fields, and error messages
            settings_fields( 'achf_settings_group' );
            do_settings_sections( 'achf_settings_group' );
        ?>

        <table class="form-table" role="presentation">
            <tr>
                <th scope="row"><label for="achf_header_code">Header Code</label></th>
                <td>
                    <textarea
                        name="achf_header_code"
                        id="achf_header_code"
                        rows="8"
                        cols="80"
                        style="width:100%;"
                    ><?php echo esc_textarea( get_option( 'achf_header_code', '' ) ); ?></textarea>
                    <p class="description">This code will be added inside the &lt;head&gt; tag.</p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="achf_footer_code">Footer Code</label></th>
                <td>
                    <textarea
                        name="achf_footer_code"
                        id="achf_footer_code"
                        rows="8"
                        cols="80"
                        style="width:100%;"
                    ><?php echo esc_textarea( get_option( 'achf_footer_code', '' ) ); ?></textarea>
                    <p class="description">This code will appear before the closing &lt;/body&gt; tag.</p>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
</div>
