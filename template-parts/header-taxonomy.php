<?php

/**
 * This template adss Collections details to the header
 *
 * It will only work with tainacan plugin enabled.
 *
 */
$current_wpterm = tainacan_get_term();

?>
<!-- Get the banner to display -->
<div class="row alignfull">
    <div class="col col-sm-6 col-11">
        <h2 class="is-style-title-iphan-underscore"><?php tainacan_the_term_name();?></h2>
        <?php $tainacan_term_description = tainacan_the_term_description(); ?>
        <?php if (!empty($tainacan_term)) : ?>
            <p>
                <?php tainacan_the_term_description(); ?>
            </p>
        <?php endif; ?>
    </div>
</div>