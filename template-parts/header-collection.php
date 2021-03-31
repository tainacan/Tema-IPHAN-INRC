<?php

/**
 * This template adss Collections details to the header
 *
 * It will only work with tainacan plugin enabled.
 *
 */
?>
<div class="row alignfull">
    <div class="col col-6 col-sm-12">
        <h2 class="is-style-title-iphan-underscore"><?php tainacan_the_collection_name(); ?></h2>
        <?php $tainacan_collection_description = tainacan_get_the_collection_description(); ?>
        <?php if (!empty($tainacan_collection_description)) : ?>
            <p>
                <?php tainacan_the_collection_description(); ?>
            </p>
        <?php endif; ?>
    </div>
</div>