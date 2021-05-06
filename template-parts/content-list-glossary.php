<li class="wp-block-column is-style-column-iphan-secondary">
    <div class="glossary-term-name">
        <?php the_title(); ?>
    </div>
    <?php echo '<p class="text-black">' . wp_trim_words(get_the_excerpt(), 28, '...') . '</p>'; ?>
</li>