<?php
/**
 * Child theme override for author-info.php
 */

// Check if this is an author archive
if (is_author()) {
    // Get the author object for the archive
    $author = get_queried_object();
    $authors = array((object) array(
        'ID' => $author->ID,
        'display_name' => $author->display_name,
        'website' => $author->user_url,
        'description' => $author->description,
    ));
} else {
    // Fallback to single post author(s)
    global $post;
    $post_id = $post->ID;

    // Use Co-Authors Plus if available
    if (function_exists('get_coauthors')) {
        $authors = get_coauthors($post_id);
    } else {
        // Fallback to single author
        $authors = array((object) array(
            'ID' => get_the_author_meta('ID'),
            'display_name' => get_the_author_meta('display_name'),
            'website' => get_the_author_meta('url'),
            'description' => get_the_author_meta('description'),
        ));
    }
}

foreach ($authors as $author) :
    $author_id = $author->ID;
    $author_url = get_author_posts_url($author_id);
    $author_name = $author->display_name;
    $author_site = $author->website;
    $author_desc = $author->description;
    ?>
    <div class="single-author-info-area theme-single-post-component">
        <div class="single-author-info-wrapper">
            <div class="author-image">
                <a href="<?php echo esc_url($author_url); ?>" title="<?php echo esc_attr($author_name); ?>">
                    <?php echo get_avatar($author_id, 500); ?>
                </a>
            </div>

            <div class="author-details">
                <?php do_action('magazinemax_author_detail_start'); ?>

                <a href="<?php echo esc_url($author_url); ?>" title="<?php echo esc_attr($author_name); ?>" class="author-name">
                    <?php echo esc_html($author_name); ?>
                </a>

                <?php if ($author_site): ?>
                    <a href="<?php echo esc_url($author_site); ?>" target="_blank" class="author-site color-accent">
                        <?php echo esc_html($author_site); ?>
                    </a>
                <?php endif; ?>

                <?php if ($author_desc): ?>
                    <div class="author-desc">
                        <?php echo wpautop($author_desc); ?>
                    </div>
                <?php endif; ?>

                <?php do_action('magazinemax_author_detail_end'); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>