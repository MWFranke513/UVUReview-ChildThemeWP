<?php
// Exit if accessed directly


if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):

    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'swiper-style' ) );
    }
endif;


add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION
// 

function magazinemax_comments_icon() {
    echo '<svg class="comment-icon" viewBox="0 0 24 24" width="16" height="16">
        <path d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/>
    </svg>';
}

function enqueue_child_assets() {
    // Debugging: Check if the function is called
    error_log('enqueue_child_assets() called');

    // Dequeue parent theme script (replace 'parent-script-handle' with the actual handle)
    wp_dequeue_script('parent-script-handle');

    // Enqueue child theme JavaScript
    wp_enqueue_script(
        'footer-mobile',
        get_stylesheet_directory_uri() . '/footer-mobile.js',
        array('jquery'), // Dependencies
        '1.0.0',
        true // Load in footer
    );

    // Debugging: Check if the script is registered
    error_log('footer-mobile.js enqueued');
}
add_action('wp_enqueue_scripts', 'enqueue_child_assets', 100);



// Register widget area for Off-Canvas
add_action('widgets_init', 'register_offcanvas_widget_area');
function register_offcanvas_widget_area() {
    register_sidebar(array(
        'name'          => __('Off-Canvas Widget Area', 'your-child-theme'),
        'id'            => 'offcanvas-widget-area',
        'description'   => __('Add widgets here to appear in the Off-Canvas Widget area.', 'your-child-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}


function enqueue_font_awesome() {
    // Enqueue Font Awesome from a CDN
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), '6.4.2');
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');

function enqueue_montserrat() {
    wp_enqueue_style('montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
}
add_action('wp_enqueue_scripts', 'enqueue_montserrat');


// CATEGORY TAG COLOR FUNCTIONS - modify_category_links & enqueue_category_styles
function modify_category_links($category_list, $separator = '', $parents = '') {
    // Map category slugs to their respective CSS classes
    $category_classes = [
        'artsculture' => 'category-arts-culture', // Slug for "Arts & Culture"
        'valley-life' => 'category-valley-life',  // Slug for "Valley Life"
        'news'        => 'category-news',          // Slug for "News"
        'sports'      => 'category-sports',       // Slug for "Sports"
        'business'    => 'category-business',     // Slug for "Business"
        'broadcast'   => 'category-broadcast',    // Adding broadcast based on your HTML
    ];
    
    // Loop through each category and modify its link
    foreach ($category_classes as $category_slug => $class_name) {
        // Use a regex pattern to find the category link by its href and add the class
        $pattern = '/(<a\b[^>]*?href=["\'][^"\']*?' . preg_quote($category_slug, '/') . '[^"\']*?["\'][^>]*?)>/i';
        $replacement = '$1 class="' . esc_attr($class_name) . '">';
        $category_list = preg_replace($pattern, $replacement, $category_list);
    }
    return $category_list;
}
add_filter('the_category', 'modify_category_links', 10, 3);

function enqueue_category_styles() {
    // Define the CSS for each category - expanded to cover site-banner-hero structure
    $custom_css = "
        /* Default styling for all category tags that don't have specific styling */
        .entry-meta-item.entry-meta-categories a[rel='category tag']:not([href*='/category/artsculture/']):not([href*='/category/valley-life/']):not([href*='/category/news/']):not([href*='/category/sports/']):not([href*='/category/business/']):not([href*='/category/broadcast/']) { 
            background-color: #000000; /* Default to black */
        }
        .entry-meta-item.entry-meta-categories a[rel='category tag']:not([href*='/category/artsculture/']):not([href*='/category/valley-life/']):not([href*='/category/news/']):not([href*='/category/sports/']):not([href*='/category/business/']):not([href*='/category/broadcast/']):hover { 
            background-color: #1A1A1A; /* Default hover to charcoal */
        }
        
        /* Standard category links */
        .entry-meta-item.entry-meta-categories a.category-arts-culture, 
        a.category-arts-culture { background-color: #595478; }
        
        .entry-meta-item.entry-meta-categories a.category-valley-life, 
        a.category-valley-life { background-color: #007096; }
        
        .entry-meta-item.entry-meta-categories a.category-news, 
        a.category-news { background-color: #E2522F; }
        
        .entry-meta-item.entry-meta-categories a.category-sports, 
        a.category-sports { background-color: #00834d; }
        
        .entry-meta-item.entry-meta-categories a.category-business, 
        a.category-business { background-color: #000000; }
        
        .entry-meta-item.entry-meta-categories a.category-broadcast, 
        a.category-broadcast { background-color: #595478; } /* Using deep purple for broadcast */
        
        /* Hover states */
        .entry-meta-item.entry-meta-categories a.category-arts-culture:hover, 
        a.category-arts-culture:hover { background-color: #453E62; }
        
        .entry-meta-item.entry-meta-categories a.category-valley-life:hover, 
        a.category-valley-life:hover { background-color: #005674; }
        
        .entry-meta-item.entry-meta-categories a.category-news:hover, 
        a.category-news:hover { background-color: #C0391A; }
        
        .entry-meta-item.entry-meta-categories a.category-sports:hover, 
        a.category-sports:hover { background-color: #006830; }
        
        .entry-meta-item.entry-meta-categories a.category-business:hover, 
        a.category-business:hover { background-color: #1A1A1A; }
        
        .entry-meta-item.entry-meta-categories a.category-broadcast:hover, 
        a.category-broadcast:hover { background-color: #453E62; } /* Using darker purple for broadcast hover */
        
        /* Hero carousel specific category styling - target by href pattern */
        .site-banner-hero a[href*='/category/artsculture/'] { background-color: #595478 !important; }
        .site-banner-hero a[href*='/category/artsculture/']:hover { background-color: #453E62 !important; }
        
        .site-banner-hero a[href*='/category/valley-life/'] { background-color: #007096 !important; }
        .site-banner-hero a[href*='/category/valley-life/']:hover { background-color: #005674 !important; }
        
        .site-banner-hero a[href*='/category/news/'] { background-color: #E2522F !important; }
        .site-banner-hero a[href*='/category/news/']:hover { background-color: #C0391A !important; }
        
        .site-banner-hero a[href*='/category/sports/'] { background-color: #00834d !important; }
        .site-banner-hero a[href*='/category/sports/']:hover { background-color: #006830 !important; }
        
        .site-banner-hero a[href*='/category/business/'] { background-color: #000000 !important; }
        .site-banner-hero a[href*='/category/business/']:hover { background-color: #1A1A1A !important; }
        
        .site-banner-hero a[href*='/category/broadcast/'] { background-color: #595478 !important; }
        .site-banner-hero a[href*='/category/broadcast/']:hover { background-color: #453E62 !important; }
        
        /* Default style for any OTHER category in the carousel (using :not selectors) */
        .site-banner-hero a[rel='category tag']:not([href*='/category/artsculture/']):not([href*='/category/valley-life/']):not([href*='/category/news/']):not([href*='/category/sports/']):not([href*='/category/business/']):not([href*='/category/broadcast/']) { 
            background-color: #000000 !important;
            color: white !important;
        }
        .site-banner-hero a[rel='category tag']:not([href*='/category/artsculture/']):not([href*='/category/valley-life/']):not([href*='/category/news/']):not([href*='/category/sports/']):not([href*='/category/business/']):not([href*='/category/broadcast/']):hover { 
            background-color: #1A1A1A !important; 
        }
        
        /* Ensure all category tags have white text */
        .site-banner-hero a[rel='category tag'],
        .entry-meta-item.entry-meta-categories a[rel='category tag'] {
            color: white !important;
        }
    ";
    
    // Add the inline styles to the parent theme's stylesheet
    wp_add_inline_style('chld_thm_cfg_parent', $custom_css);
}
add_action('wp_enqueue_scripts', 'enqueue_category_styles');




function enqueue_dark_mode_scripts() {
    // Get image IDs from media library - UPDATE THESE WITH YOUR ACTUAL IMAGE IDs
    $dark_logo_id = 91992; // Replace with your dark logo attachment ID
    $light_logo_id = 91991; // Replace with your light logo attachment ID

    // Get dark logo URLs
    $dark_logo_src = wp_get_attachment_image_url($dark_logo_id, 'full');
    $dark_logo_srcset = wp_get_attachment_image_srcset($dark_logo_id, 'full');

    // Get light logo URLs
    $light_logo_src = wp_get_attachment_image_url($light_logo_id, 'full');
    $light_logo_srcset = wp_get_attachment_image_srcset($light_logo_id, 'full');

    // Preload logos
    add_action('wp_head', function() use ($dark_logo_src, $light_logo_src) {
        echo '<link rel="preload" href="' . esc_url($dark_logo_src) . '" as="image" media="(prefers-color-scheme: dark)">';
        echo '<link rel="preload" href="' . esc_url($light_logo_src) . '" as="image" media="(prefers-color-scheme: light)">';
    });

    // Pass variables to JavaScript
    wp_localize_script('jquery', 'themeLogos', [
        'dark' => [
            'src' => $dark_logo_src,
            'srcset' => $dark_logo_srcset
        ],
        'light' => [
            'src' => $light_logo_src,
            'srcset' => $light_logo_srcset
        ]
    ]);

    // Add inline script
    add_action('wp_head', function() {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.querySelector("#mode-icon-switch");
            const modeButton = document.querySelector(".theme-button-colormode");
            const logoImg = document.querySelector(".custom-logo-link img");

            if (!modeButton || !logoImg) return;

            // Immediate initial check
            updateLogo(modeButton.ariaLabel);

            // Watch for aria-label changes
            const observer = new MutationObserver(mutations => {
                mutations.forEach(mutation => {
                    if (mutation.attributeName === 'aria-label') {
                        updateLogo(mutation.target.ariaLabel);
                    }
                });
            });

            observer.observe(modeButton, { attributes: true });

            // Toggle click handler
            toggle.addEventListener('click', () => {
                updateLogo(modeButton.ariaLabel);
            });
        });

        function updateLogo(mode) {
            const logoImg = document.querySelector(".custom-logo-link img");
            if (!logoImg) return;

            const isDark = mode === "light"; // Assuming clicking toggle switches to dark mode
            const modeData = isDark ? themeLogos.dark : themeLogos.light;

            logoImg.src = modeData.src;
            logoImg.srcset = modeData.srcset;
        }
        </script>
        <?php
    });
}
add_action('wp_enqueue_scripts', 'enqueue_dark_mode_scripts');




// function enqueue_custom_trending_tags_script() {
//     // Enqueue jQuery (if not already enqueued)
//     wp_enqueue_script('jquery');

//     // Add inline script for trending tags
//     wp_add_inline_script(
//         'jquery', // Attach the script to jQuery
//         '
//         (function($) {
//             // Function to adjust the number of visible tags
//             function adjustTrendingTags() {
//                 const trendingTags = $(".trending-tags-panel a.trending-tags-link");
//                 const mobileLimit = 3; // Number of tags to show on mobile

//                 if (window.innerWidth <= 767) { // Mobile screen size
//                     trendingTags.each(function(index) {
//                         if (index >= mobileLimit) {
//                             $(this).hide(); // Hide tags beyond the limit
//                         } else {
//                             $(this).show(); // Show tags within the limit
//                         }
//                     });
//                 } else {
//                     trendingTags.show(); // Show all tags on larger screens
//                 }
//             }

//             // Run on page load and window resize
//             $(document).ready(adjustTrendingTags);
//             $(window).resize(adjustTrendingTags);
//         })(jQuery);
//         ',
//         'after' // Add the script after jQuery
//     );
// }
// add_action('wp_enqueue_scripts', 'enqueue_custom_trending_tags_script');






function custom_recommended_post_shortcode($atts) {
			// How this works: Enter the following formatted shortcode within one of the Homepage/Front-page widget areas: [recommended_post category="category-slug" title="category-title"]
    // Extract shortcode attributes
    $atts = shortcode_atts(array(
        'category' => '',
        'title' => '',
        'flip_layout' => false
    ), $atts);

    ob_start();

    // Store original theme mod values
    $original_values = array(
        'enable_read_more_post_section' => get_theme_mod('enable_read_more_post_section'),
        'select_cat_for_read_more_post' => get_theme_mod('select_cat_for_read_more_post'),
        'select_cat_for_read_more_list_post' => get_theme_mod('select_cat_for_read_more_list_post'),
        'read_more_post_title' => get_theme_mod('read_more_post_title'),
        'flip_read_more_post_section' => get_theme_mod('flip_read_more_post_section'),
        'enable_banner_cat_meta' => get_theme_mod('enable_banner_cat_meta'),
        'enable_read_more_category_meta' => get_theme_mod('enable_read_more_category_meta'),
        'enable_date_meta' => get_theme_mod('enable_date_meta')
    );

    // Temporarily override theme mods
    set_theme_mod('enable_read_more_post_section', true);
    set_theme_mod('enable_banner_cat_meta', true); // Enable category meta for list area
    set_theme_mod('enable_read_more_category_meta', false); // Disable category meta for main area
    set_theme_mod('enable_date_meta', true);
    if (!empty($atts['category'])) {
        set_theme_mod('select_cat_for_read_more_post', sanitize_text_field($atts['category']));
        set_theme_mod('select_cat_for_read_more_list_post', sanitize_text_field($atts['category']));
    }
    if (!empty($atts['title'])) {
        set_theme_mod('read_more_post_title', sanitize_text_field($atts['title']));
    }
    if (isset($atts['flip_layout'])) {
        set_theme_mod('flip_read_more_post_section', (bool)$atts['flip_layout']);
    }

    // Get category slug
    $category_slug = sanitize_text_field($atts['category']);

    // Query for MAIN POSTS (most recent 4 posts)
    $main_posts_query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'post__not_in' => get_option("sticky_posts"),
        'category_name' => $category_slug,
        'orderby' => 'date',
        'order' => 'DESC' // Prioritize newest posts in main area
    ));

    // Collect IDs of main posts to exclude from the list
    $excluded_post_ids = array();
    if ($main_posts_query->have_posts()) {
        while ($main_posts_query->have_posts()) {
            $main_posts_query->the_post();
            $excluded_post_ids[] = get_the_ID();
        }
        wp_reset_postdata();
    }

    // Query for LIST POSTS (older posts, excluding main posts)
    $list_posts_query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'post__not_in' => array_merge(get_option("sticky_posts"), $excluded_post_ids),
        'category_name' => $category_slug,
        'orderby' => 'date',
        'order' => 'DESC' // Still show newer first, but after excluding main posts
    ));

    // Render the layout
    $counter = 1;
    $order_column_class = get_theme_mod('flip_read_more_post_section') ? "column-order-2" : "column-order-1";
    $order_column_class_1 = get_theme_mod('flip_read_more_post_section') ? "column-order-1 column-border-r" : "column-order-2 column-border-l";
    ?>
    <section class="site-section site-read-more-section">
        <div class="wrapper">
            <header class="section-header theme-section-header">
                <h2 class="site-section-title">
                    <?php echo esc_html(get_theme_mod('read_more_post_title')); ?>
                </h2>
            </header>
            <div class="column-row">
                <!-- Main Posts Area -->
                <div class="column column-8 column-md-12 column-sm-12 <?php echo esc_attr($order_column_class); ?> mb-md-48">
                    <div class="column-row column-row-small">
                        <?php if ($main_posts_query->have_posts()) : ?>
                            <?php while ($main_posts_query->have_posts()) : $main_posts_query->the_post(); ?>
                                <?php
                                $article_class = ($counter == 1) ? 'theme-article-list article-list-big article-list-center mb-15' : 'theme-default-post mb-10';
                                $column_class = ($counter == 1) ? 'column-12' : 'column-4';
                                $image_class = ($counter == 1) ? 'entry-image-big' : 'entry-image-medium mb-10';
                                $article_title_class = ($counter == 1) ? 'entry-title-big' : 'entry-title-small';
                                ?>
                                <div class="column <?php echo $column_class; ?> column-sm-12">
                                    <article id="read-more-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-more-news image-hover ' . $article_class); ?>>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="entry-image <?php echo $image_class; ?>">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('medium', array('alt' => esc_attr(get_the_title()))); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="entry-details">
                                            <?php the_title('<h3 class="entry-title ' . $article_title_class . ' mb-4"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                            <div class="theme-article-excerpt mb-4">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <?php if (get_theme_mod('enable_date_meta')) : ?>
                                                <div class="entry-meta">
                                                    <?php magazinemax_posted_on(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </article>
                                </div>
                                <?php $counter++; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- List Posts Area -->
                <div class="column column-4 column-md-12 column-sm-12 <?php echo esc_attr($order_column_class_1); ?>">
                    <?php if ($list_posts_query->have_posts()) : ?>
                        <?php while ($list_posts_query->have_posts()) : $list_posts_query->the_post(); ?>
                            <article id="readmore-aside-<?php the_ID(); ?>" <?php post_class('theme-article-post theme-article-list article-list-center article-border article-border-small image-hover mb-10'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="entry-image entry-image-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('alt' => esc_attr(get_the_title()))); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="entry-details">
                                    <?php if (get_theme_mod('enable_banner_cat_meta')) : ?>
                                        <div class="entry-meta entry-meta-top">
                                            <?php magazinemax_posted_categories(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php the_title('<h3 class="entry-title entry-title-small line-clamp line-clamp-2 mb-4"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                                    <?php if (get_theme_mod('enable_date_meta')) : ?>
                                        <div class="entry-meta">
                                            <?php magazinemax_posted_on(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php

    // Cleanup
    wp_reset_postdata();
    $output = ob_get_clean();

    // Restore original theme mods
    foreach ($original_values as $key => $value) {
        set_theme_mod($key, $value);
    }

    return $output;
}
add_shortcode('recommended_post', 'custom_recommended_post_shortcode');



// TOP BAR FUNCTION

// Add custom elements to header
// function custom_header_left_elements() {
//     // Left side navigation
//     $left_links = '
//     <nav class="header-left-nav">
//         <a href="#about">About Us</a>
//         <a href="#advertise">Advertise</a>
//         <a href="#contact">Contact Us</a>
//         <a href="#work">Work For Us</a>
//     </nav>';
    
//     // Output the left elements
//     echo $left_links;
// }

// function custom_header_right_elements() {
//     // Social media icons
//     $social_icons = '
//     <div class="header-social-icons">
//         <a href="#facebook-url" class="social-icon facebook" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
//         <a href="#instagram-url" class="social-icon instagram" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
//         <a href="#x-url" class="social-icon x-twitter" aria-label="X"><i class="fab fa-x-twitter"></i></a>
//         <a href="#youtube-url" class="social-icon youtube" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
//     </div>';
    
//     // Right side buttons
//     $right_buttons = '
//     <div class="header-right-buttons">
//         '.$social_icons.'
//         <a href="#signup" class="theme-button signup-btn">Sign Up</a>
//         <a href="#login" class="theme-button login-btn">Log In</a>
//     </div>';
    
//     // Output the right elements
//     echo $right_buttons;
// }

// // Try different hooks that might be used in your theme
// add_action('magazinemax_header_left', 'custom_header_left_elements');
// add_action('magazinemax_header_right', 'custom_header_right_elements');

// // Alternative hooks to try if the above doesn't work
// add_action('magazinemax_site_header_left', 'custom_header_left_elements');
// add_action('magazinemax_site_header_right', 'custom_header_right_elements');
// 

function custom_header_scripts() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // More specific selectors to target only the top header elements
        $('.masthead-top-header .site-header-left').html(`
            <nav class="header-left-nav">
                <a href="/under-construction">ABOUT US</a>
                <a href="/advertising">ADVERTISE</a>
                <a href="/staff-application">WORK FOR US</a>
            </nav>
			<div class="tablet-header-social-icons" style="margin-right: 15px; font-size: 18px; align-content: center;">
				<a href="https://facebook.com/UVUreview/" class="social-icon facebook" aria-label="Facebook"><i class="fa fa-facebook-f"></i></a>
				<a href="https://x.com/uvureview" class="social-icon x-twitter" aria-label="X"><i class="fa-brands fa-x-twitter"></i></a>
				<a href="https://www.instagram.com/uvureview/?hl=en" class="social-icon instagram" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
				<a href="https://www.youtube.com/@theuvureview" class="social-icon youtube" aria-label="YouTube"><i class="fa fa-youtube-play"></i></a>
			</div>
        `);
        
        $('.masthead-top-header .site-header-right').html(`
            <div class="header-right-content">
                <div class="header-social-icons">
                    <a href="https://facebook.com/UVUreview/" class="social-icon facebook" aria-label="Facebook"><i class="fa fa-facebook-f"></i></a>
					<a href="https://x.com/uvureview" class="social-icon x-twitter" aria-label="X"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="https://www.instagram.com/uvureview/?hl=en" class="social-icon instagram" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.youtube.com/@theuvureview" class="social-icon youtube" aria-label="YouTube"><i class="fa fa-youtube-play"></i></a>
                </div>
                <div class="header-buttons">
                    <a href="#" class="signup-btn" onclick="alert('This feature is currently undergoing maintenance, please try again later.');return false;">SIGN UP</a>
                    <a href="/login" class="login-btn">LOG IN</a>
                </div>
            </div>
        `);
        
        // CSS remains the same
        $('<style>')
            .text(`
                .header-left-nav {
                    display: flex;
                    align-items: center;
                    height: 100%;
                }
                .header-left-nav a {
                    margin-right: 20px;
                    text-decoration: none;
                    font-weight: 500;
                    text-transform: uppercase;
                    font-size: 14px;
                }
                .header-right-content {
                    display: flex;
                    align-items: center;
                    justify-content: flex-end;
                    height: 100%;
                }
                .header-social-icons {
                    display: flex;
                    margin-right: 15px;
                }
                .header-social-icons a {
                    margin-left: 12px;
                    text-decoration: none;
                    font-size: 18px;
                }
                .header-buttons {
                    display: flex;
                }
                .header-buttons a {
                    padding: 5px 15px;
                    text-decoration: none;
                    font-weight: 600;
                    margin-left: 10px;
                    text-transform: uppercase;
                    font-size: 14px;
                }
                .signup-btn {
                    background: transparent;
                    border: 1px solid;
                }
                .login-btn {
                    background: #009933;
                    color: white;
                }
            `)
            .appendTo('head');
    });
    </script>
    <?php
}
add_action('wp_footer', 'custom_header_scripts');


function mobile_header_restructure() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // Only add the missing social icons and buttons to the mobile header
        // Everything else will be handled by CSS
        function addMobileSocialAndButtons() {
            if ($(window).width() <= 991) {
                // Only add if not already added
                if (!$('.mobile-social-buttons-added').length) {
                    
                    // Add social media icons and buttons in one row
                    var socialButtonsRow = `
                        <div class="mobile-social-buttons-added mobile-added-social-buttons">
                            <div class="mobile-social-icons">
                                <a href="https://www.instagram.com/uvureview/?hl=en" class="social-icon instagram" aria-label="Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a href="https://facebook.com/UVUreview/" class="social-icon facebook" aria-label="Facebook">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                                <a href="https://x.com/uvureview" class="social-icon x-twitter" aria-label="X">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>
                                <a href="https://www.youtube.com/@theuvureview" class="social-icon youtube" aria-label="YouTube">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            </div>
                            <div class="mobile-buttons">
                                <a href="#" class="signup-btn" onclick="alert('This feature is currently undergoing maintenance, please try again later.');return false;">SIGN UP</a>
                                <a href="/login" class="login-btn">LOG IN</a>
                            </div>
                        </div>
                    `;
                    
                    // Insert after the header wrapper, not the mega menu
                    $('.masthead-bottom-header .site-header-wrapper').append(socialButtonsRow);
                }
            } else {
                // Remove mobile additions on desktop
                $('.mobile-social-buttons-added, .mobile-added-social-buttons').remove();
            }
        }
        
        // Run after a short delay to ensure other scripts have loaded
        setTimeout(addMobileSocialAndButtons, 200);
        
        // Handle window resize
        var resizeTimer;
        $(window).resize(function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(addMobileSocialAndButtons, 250);
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'mobile_header_restructure', 20);

function mobile_logo_override() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        function setMobileLogo() {
            if ($(window).width() <= 991) {
                // Mobile: Force white logo (using light theme logo)
                const logoImg = $(".custom-logo-link img");
                if (logoImg.length && typeof themeLogos !== 'undefined' && themeLogos.light) {
                    logoImg.attr('src', themeLogos.light.src);
                    logoImg.attr('srcset', themeLogos.light.srcset);
                    
                    // Add a class to track mobile logo state
                    logoImg.addClass('mobile-logo-override');
                }
            } else {
                // Desktop: Remove override and let the normal dark mode function handle it
                const logoImg = $(".custom-logo-link img");
                if (logoImg.hasClass('mobile-logo-override')) {
                    logoImg.removeClass('mobile-logo-override');
                    
                    // Trigger the normal logo update based on current theme mode
                    const modeButton = $(".theme-button-colormode");
                    if (modeButton.length) {
                        updateLogo(modeButton.attr('aria-label'));
                    }
                }
            }
        }
        
        // Override the original updateLogo function to respect mobile override
        if (typeof window.updateLogo === 'function') {
            const originalUpdateLogo = window.updateLogo;
            window.updateLogo = function(mode) {
                // Don't update logo if we're in mobile and have override active
                if ($(window).width() <= 991) {
                    return;
                }
                // Otherwise, use the original function
                originalUpdateLogo(mode);
            };
        } else {
            // Define updateLogo if it doesn't exist yet
            window.updateLogo = function(mode) {
                // Don't update logo if we're in mobile
                if ($(window).width() <= 991) {
                    return;
                }
                
                const logoImg = $(".custom-logo-link img");
                if (!logoImg.length || typeof themeLogos === 'undefined') return;

                const isDark = mode === "light"; // Assuming clicking toggle switches to dark mode
                const modeData = isDark ? themeLogos.dark : themeLogos.light;

                logoImg.attr('src', modeData.src);
                logoImg.attr('srcset', modeData.srcset);
            };
        }
        
        // Initial logo set
        setTimeout(setMobileLogo, 300);
        
        // Handle window resize with debouncing
        let resizeTimer;
        $(window).resize(function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(setMobileLogo, 250);
        });
        
        // Also override any theme mode button clicks to respect mobile state
        $(document).on('click', '#mode-icon-switch, .theme-button-colormode', function() {
            setTimeout(setMobileLogo, 100);
        });
        
        // Watch for any changes to the logo src attribute and override if needed
        if (window.MutationObserver) {
            const logoObserver = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === 'src' && $(window).width() <= 991) {
                        const target = $(mutation.target);
                        if (target.hasClass('custom-logo-link') || target.closest('.custom-logo-link').length) {
                            setTimeout(setMobileLogo, 50);
                        }
                    }
                });
            });
            
            // Observe logo changes
            const logoImg = document.querySelector(".custom-logo-link img");
            if (logoImg) {
                logoObserver.observe(logoImg, { attributes: true });
            }
        }
    });
    </script>
    <?php
}
add_action('wp_footer', 'mobile_logo_override', 25); // Higher priority than mobile_header_restructure



// Enhanced Search Algorithm with Typo Tolerance

// function newspaper_enhanced_search($query) {
//     // Only modify search queries on the frontend
//     if (!is_admin() && $query->is_main_query() && $query->is_search()) {
//         // Get the search term
//         $search_term = $query->get('s');
        
//         // If the search term is empty, do nothing
//         if (empty($search_term)) {
//             return $query;
//         }
        
//         // Set the post types to search
//         $query->set('post_type', array('post', 'page', 'custom_article_type'));
        
//         // Create a meta query for custom fields
//         $meta_query = array('relation' => 'OR');
        
//         // Add custom fields to search
//         $meta_fields = array('_custom_byline', '_custom_subtitle', '_custom_excerpt');
//         foreach ($meta_fields as $field) {
//             $meta_query[] = array(
//                 'key'     => $field,
//                 'value'   => $search_term,
//                 'compare' => 'LIKE'
//             );
//         }
        
//         // Set the meta query
//         $query->set('meta_query', $meta_query);
        
//         // Setup tax query for categories and tags
//         $tax_query = array('relation' => 'OR');
//         $taxonomies = array('category', 'post_tag', 'custom_taxonomy');
        
//         foreach ($taxonomies as $taxonomy) {
//             if (taxonomy_exists($taxonomy)) {
//                 $terms = get_terms(array(
//                     'taxonomy' => $taxonomy,
//                     'name__like' => $search_term,
//                     'hide_empty' => false,
//                 ));
                
//                 if (!empty($terms) && !is_wp_error($terms)) {
//                     $term_ids = wp_list_pluck($terms, 'term_id');
//                     $tax_query[] = array(
//                         'taxonomy' => $taxonomy,
//                         'field' => 'term_id',
//                         'terms' => $term_ids,
//                     );
//                 }
//             }
//         }
        
//         // Only add tax query if we have terms
//         if (count($tax_query) > 1) {
//             $query->set('tax_query', $tax_query);
//         }
        
//         // Generate variations for fuzzy search
//         $variations = newspaper_generate_term_variations($search_term);
        
//         // Add the fuzzy search to WordPress search
//         add_filter('posts_search', function($search, $wp_query) use ($variations) {
//             global $wpdb;
            
//             if ($wp_query->is_main_query() && $wp_query->is_search()) {
//                 $search_terms = array();
                
//                 // Add original and all variations to search terms
//                 foreach ($variations as $term) {
//                     $like = '%' . $wpdb->esc_like($term) . '%';
//                     $search_terms[] = $wpdb->prepare("($wpdb->posts.post_title LIKE %s)", $like);
//                     $search_terms[] = $wpdb->prepare("($wpdb->posts.post_content LIKE %s)", $like);
//                     $search_terms[] = $wpdb->prepare("($wpdb->posts.post_excerpt LIKE %s)", $like);
//                 }
                
//                 if (!empty($search_terms)) {
//                     // Create our custom search clause
//                     $search = " AND (" . implode(' OR ', $search_terms) . ") ";
//                 }
//             }
            
//             return $search;
//         }, 10, 2);
        
//         // Order results by relevance
//         $query->set('orderby', 'relevance');
        
//         // Increase posts per page for search results
//         $query->set('posts_per_page', 30);
//     }
    
//     return $query;
// }
// add_action('pre_get_posts', 'newspaper_enhanced_search');

// /**
//  * Generate variations of the search term to handle typos
//  */
// function newspaper_generate_term_variations($term) {
//     $variations = array($term);
//     $term = strtolower($term);
//     $term_length = strlen($term);
    
//     // Only process terms of a reasonable length
//     if ($term_length < 3 || $term_length > 30) {
//         return $variations;
//     }
    
//     // Character swaps (for adjacent character typos)
//     for ($i = 0; $i < $term_length - 1; $i++) {
//         $swapped = $term;
//         $tmp = $swapped[$i];
//         $swapped[$i] = $swapped[$i + 1];
//         $swapped[$i + 1] = $tmp;
//         $variations[] = $swapped;
//     }
    
//     // Character deletions (for extra character typos)
//     for ($i = 0; $i < $term_length; $i++) {
//         $deleted = substr($term, 0, $i) . substr($term, $i + 1);
//         $variations[] = $deleted;
//     }
    
//     // Character insertions (for missing character typos)
//     $common_chars = array('a', 'e', 'i', 'o', 'u', 's', 't', 'n', 'r');
//     // Limit insertions to keep the query size manageable
//     for ($i = 0; $i <= min($term_length, 10); $i++) {
//         foreach (array_slice($common_chars, 0, 5) as $char) {
//             $inserted = substr($term, 0, $i) . $char . substr($term, $i);
//             $variations[] = $inserted;
//         }
//     }
    
//     // Return array with duplicates removed
//     return array_unique($variations);
// }

// /**
//  * Highlight search terms in results
//  */
// function newspaper_highlight_search_terms($text) {
//     if (is_search() && !empty(get_search_query())) {
//         $search_terms = array(get_search_query());
        
//         // Only generate variations for terms of reasonable length
//         if (strlen(get_search_query()) >= 3 && strlen(get_search_query()) <= 15) {
//             $variations = newspaper_generate_term_variations(get_search_query());
//             $search_terms = array_merge($search_terms, $variations);
//         }
        
//         // Limit to prevent timeouts
//         $search_terms = array_slice($search_terms, 0, 10);
        
//         foreach ($search_terms as $term) {
//             // Use preg_quote to escape any special regex characters
//             $term = preg_quote($term, '/');
//             $pattern = '/(' . $term . ')/i';
//             $replacement = '<span class="search-highlight">$1</span>';
//             $text = preg_replace($pattern, $replacement, $text);
//         }
//     }
//     return $text;
// }
// add_filter('the_title', 'newspaper_highlight_search_terms', 10);
// add_filter('the_content', 'newspaper_highlight_search_terms', 11);
// add_filter('the_excerpt', 'newspaper_highlight_search_terms', 11);

// /**
//  * Add CSS for search term highlighting
//  */
// function newspaper_search_highlight_css() {
//     if (is_search()) {
//         echo '<style>
//             .search-highlight {
//                 background-color: #fff3cd;
//                 font-weight: bold;
//                 padding: 0 2px;
//             }
//         </style>';
//     }
// }
// add_action('wp_head', 'newspaper_search_highlight_css');

// /**
//  * Debug function - useful for troubleshooting
//  * Uncomment to use for debugging
//  */
// /*
// function newspaper_log_search_query($query) {
//     if (!is_admin() && $query->is_main_query() && $query->is_search()) {
//         error_log('Search query: ' . print_r($query, true));
//     }
//     return $query;
// }
// add_action('pre_get_posts', 'newspaper_log_search_query', 999);
// */