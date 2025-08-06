<?php
/**
 * Custom search results template for child theme
 */

get_header();

// Get original page layout
$page_layout = magazinemax_get_page_layout();
?>

<main id="site-content" role="main">
    <div class="wrapper">
        <div id="primary" class="content-area theme-sticky-component">

            <?php if (have_posts()) : ?>
                <header class="custom-archive-header">
                    <h1 class="archive-title">
                        <?php
                        printf(
                            esc_html__('Search Results for: %s', 'magazinemax'),
                            '<span>' . get_search_query() . '</span>'
                        );
                        ?>
                    </h1>
                </header>

                <div class="custom-archive-list">
                    <?php while (have_posts()) : the_post(); ?>
                        <article <?php post_class('archive-post-item'); ?>>
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="post-content-wrapper">
                                <div class="post-meta-top">
                                    <?php
                                    // Display categories with home page style (max 2)
                                    ob_start();
                                    magazinemax_posted_categories();
                                    $categories = ob_get_clean();
                                    echo preg_replace('/<a(.*?)<\/a>/', '$0', $categories, 2); // Limit to 2 categories
                                    ?>
                                </div>

                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <div class="post-meta-bottom">
                                    <span class="post-date">
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    
                                    <?php if (function_exists('coauthors_posts_links')) : ?>
                                        <span class="post-authors">
                                            <?php coauthors_posts_links(' | '); ?>
                                        </span>
                                    <?php else : ?>
                                        <span class="post-author">
                                            <?php the_author_posts_link(); ?>
                                        </span>
                                    <?php endif; ?>

                                    <?php if (comments_open()) : ?>
                                        <span class="post-comments">
                                            <?php magazinemax_comments_icon(); ?>
                                            <?php comments_number('0', '1', '%'); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>

                        </article>
                    <?php endwhile; ?>
                </div><!-- .custom-archive-list -->

                <?php get_template_part('template-parts/pagination'); ?>

            <?php else : ?>
                <div class="no-results">
                    <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'magazinemax'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>

        </div><!-- #primary -->

        <?php if ('no-sidebar' != $page_layout) : ?>
            <?php get_sidebar(); ?>
        <?php endif; ?>
        
    </div><!-- .wrapper -->
</main>

<?php
get_footer();