<?php
/**
 * Child theme override for banner-layout-1.php
 */
global $post;
$magazinemax_post_layout = esc_html(get_post_meta($post->ID, 'magazinemax_post_layout', true));
if (empty($magazinemax_post_layout)) {
    $magazinemax_post_layout = 'layout-1';
}
if ($magazinemax_post_layout == "layout-1") { ?>
    <header class="single-banner-header single-banner-default">
        <?php
        // Featured Image with Caption (retain original classes)
        if (has_post_thumbnail()) {
            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail_caption = get_post($thumbnail_id)->post_excerpt;
            ?>
            <div class="entry-image">
                <?php the_post_thumbnail(); ?>
                <?php if ($thumbnail_caption): ?>
                    <div class="featured-image-caption">
                        <?php echo esc_html($thumbnail_caption); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php } ?>

        <?php
        the_title('<h1 class="entry-title entry-title-big">', '</h1>');

        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <?php
                magazinemax_posted_on();
                echo '<span class="meta-separator">|</span>'; // Use a span for better control
                if (function_exists('coauthors_posts_links')) {
                    coauthors_posts_links(', ', ' | ', '', '', true);
                } else {
                    magazinemax_posted_by();
                }
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->
<?php } ?>