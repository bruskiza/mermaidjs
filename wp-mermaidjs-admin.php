<?php
    if($_POST['wpmjs_hidden'] == 'Y') {
        //Form data sent
        $wpmjs_debug = $_POST['wpmjs_debug'];
        update_option('wpmjs_debug', $wpmjs_debug);

        ?>
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
    } else {
        //Normal page display
        $wpmjs_debug = get_option('wpmjs_debug');

    }
?>
<div class="wrap">
    <?php    echo "<h2>" . __( 'MermaidJS for Wordpress Options', 'wpmjs_trdom' ) . "</h2>"; ?>

    <form name="wpmjs_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="wpmjs_hidden" value="Y">
        <?php    echo "<h4>" . __( 'MermaidJS Database Settings', 'wpmjs_trdom' ) . "</h4>"; ?>
        <p><?php _e("Debug log: " ); ?><input type="text" name="wpmjs_debug" value="<?php echo $wpmjs_debug; ?>" size="20"><?php _e(" ex: localhost" ); ?></p>


        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'wpmjs_trdom' ) ?>" />
        </p>
    </form>
</div>
