<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 */
?>

</div><!-- Closing body container -->
<footer class="site-footer" style="display: grid; grid-template-rows: auto auto auto auto; color: #fff; background: rgba(0, 88, 40, 255) !important; margin-top: 2rem;">
	
	
	
<!-- Off-Canvas Widget Panel -->
<!-- <div id="theme-offcanvas-panel-widget" class="theme-offcanvas-panel-widget" style="display: none;">
    <button id="theme-offcanvas-close" class="theme-offcanvas-close" aria-label="Close">
        <span class="screen-reader-text">Close</span>
        <svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
            <path fill="currentColor" d="M14.95 6.46L11.41 10l3.54 3.54l-1.41 1.41L10 11.41l-3.54 3.54l-1.41-1.41L8.59 10L5.05 6.46l1.41-1.41L10 8.59l3.54-3.54l1.41 1.41z"></path>
        </svg>
    </button>
    <?php dynamic_sidebar('offcanvas-widget-area'); ?>
</div> -->

<!-- Search Canvas Modal -->
<!-- <div class="theme-search-panel">
    <button id="magazinemax-search-canvas-close" class="theme-search-close" aria-label="Close">
        <span class="screen-reader-text">Close</span>
        <svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
            <path fill="currentColor" d="M14.95 6.46L11.41 10l3.54 3.54l-1.41 1.41L10 11.41l-3.54 3.54l-1.41-1.41L8.59 10L5.05 6.46l1.41-1.41L10 8.59l3.54-3.54l1.41 1.41z"></path>
        </svg>
    </button>
    <?php get_search_form(); ?>
</div> -->
    <div class="footer-content" style="display: flex; justify-content: space-between; align-items: flex-start; max-width: 1366px; margin: 15px auto 15px auto;">
        <!-- Logo Section -->
        <div style="width: auto">
            <a class="footer-logo" href="<?php echo home_url(); ?>" style="display: flex; justify-content: left; padding: 1rem 0;">
                <img src="https://www.uvureview.com/wp-content/media/2025/02/Thumbnail-White.png" alt="Site Logo" style="max-height: 64px; max-width: 64px; min-height: 64px; min-width: 64px;"/>
            </a>
        </div>

        <!-- Site Directory Section -->
        <div class="footer-site-directory" style="padding-left: 2rem; margin-right: 2rem; margin-left: 3rem; margin-top: 15px;">
            <h3 style="margin: 0; font-weight: bolder; color: #fff;">Connect</h3>
            <ul style="list-style: none; padding-left: 5px; margin-top: 10px;">
                <li><a href="<?php echo home_url('/about-us'); ?>" style="color: #fff; text-decoration: none;">About Us</a></li>
                <li><a href="<?php echo home_url('/contact-us'); ?>" style="color: #fff; text-decoration: none;">Contact Us</a></li>
                <li><a href="<?php echo home_url('/advertising'); ?>" style="color: #fff; text-decoration: none;">Advertising</a></li>
                <li><a href="<?php echo home_url('/staff-application'); ?>" style="color: #fff; text-decoration: none;">Join Our Team</a></li>
            </ul>
        </div>

        <div class="footer-site-navigation" style="margin-left: 3rem; margin-top: 15px;">
            <h3 style="margin: 0; font-weight: bolder; color: #fff;">Sections</h3>
            <ul style="flex: 1; margin-right: 2rem; padding-left: 5px; margin-top: 10px; list-style: none;">
                <li><a href="<?php echo home_url('/category/news'); ?>" style="color: #fff; text-decoration: none;">News</a></li>
                <li><a href="<?php echo home_url('/category/arts&culture'); ?>" style="color: #fff; text-decoration: none;">Arts & Culture</a></li>
                <li><a href="<?php echo home_url('/category/health-wellness'); ?>" style="color: #fff; text-decoration: none;">Health & Wellness</a></li>
                <li><a href="<?php echo home_url('/category/sports'); ?>" style="color: #fff; text-decoration: none;">Sports</a></li>
            </ul>
        </div>

        <div class="footer-site-navigation" style="padding-left: 2rem; margin-left:10px; align-self: flex-end !important">
            <ul style="flex: 1; margin-right: 2rem; padding-left: 5px; margin-top: 10px; list-style: none;">
                <li><a href="<?php echo home_url('/category/podcast'); ?>" style="color: #fff; text-decoration: none;">Podcasts</a></li>
                <li><a href="<?php echo home_url('/category/broadcast'); ?>" style="color: #fff; text-decoration: none;">Broadcasts</a></li>
                <li><a href="<?php echo home_url('/under-construction'); ?>" style="color: #fff; text-decoration: none;">Submit a Story</a></li>
            </ul>
        </div>

        <!-- Mobile Directory -->
        <div class="mobile-footer-site-directory footer-dropdown" style="display: none; text-align: start;">
            <h3 style="margin: 0; font-weight: bolder; color: #fff; display: inline; vertical-align: middle;">Connect</h3>
            <i class="fa fa-angle-right dropdown-arrow" style="display: grid; justify-content: right; font-size: 22px; transition: transform 0.3s ease; margin: 0 0 5px auto; width: 7.14px; float: right;"></i>
            <ul style="list-style: none; padding: 0 0 0 6px; display: none;">
                <li><a href="<?php echo home_url('/about-us'); ?>" style="color: #fff; text-decoration: none;">About Us</a></li>
                <li><a href="<?php echo home_url('/contact-us'); ?>" style="color: #fff; text-decoration: none;">Contact Us</a></li>
                <li><a href="<?php echo home_url('/advertising'); ?>" style="color: #fff; text-decoration: none;">Advertising</a></li>
                <li><a href="<?php echo home_url('/staff-application'); ?>" style="color: #fff; text-decoration: none;">Join Our Team</a></li>
            </ul>
            <hr class="connect-hr" style="border-top: 1px solid #fff; width: 75vw; margin: 0 0 10px 0;">
        </div>

        <!-- Mobile Navigation -->
        <div class="mobile-footer-site-navigation footer-dropdown" style="display: none; text-align: start;">
            <h3 style="margin: 0; font-weight: bolder; color: #fff; display: inline; vertical-align: middle;">Sections</h3>
            <i class="fa fa-angle-right dropdown-arrow-2" style="display: grid; justify-content: right; font-size: 22px; transition: transform 0.3s ease; margin: 0 0 5px auto; width: 7.14px; float: right;"></i>
            <ul style="flex: 1; padding-left: 2rem; margin-right: 2rem; display: none;">
                <li><a href="<?php echo home_url('/category/news'); ?>" style="color: #fff; text-decoration: none;">News</a></li>
                <li><a href="<?php echo home_url('/category/arts&culture'); ?>" style="color: #fff; text-decoration: none;">Arts & Culture</a></li>
                <li><a href="<?php echo home_url('/category/health-wellness'); ?>" style="color: #fff; text-decoration: none;">Health & Wellness</a></li>
                <li><a href="<?php echo home_url('/category/sports'); ?>" style="color: #fff; text-decoration: none;">Sports</a></li>
                <li><a href="<?php echo home_url('/category/podcast'); ?>" style="color: #fff; text-decoration: none;">Podcasts</a></li>
                <li><a href="<?php echo home_url('/category/broadcast'); ?>" style="color: #fff; text-decoration: none;">Broadcasts</a></li>
                <li><a href="<?php echo home_url('/under-construction'); ?>" style="color: #fff; text-decoration: none;">Submit a Story</a></li>
            </ul>
            <hr class="sections-hr" style="border-top: 1px solid #fff; width: 75vw; margin: 0 0 22px 0;">
        </div>

        <!-- Social Media Section -->
        <div class="footer-social-media" style="flex: 1; text-align: right; align-self: flex-end;">
            <a class="footer-link" href="https://facebook.com/UVUreview/" target="_blank" style="color: #1F7938;">
                <img class="social-icon" src="https://www.uvureview.com/wp-content/media/2025/02/Facebook-Icon.png" alt="Facebook" style="width: 42px; height: 42px; margin-left: 10px; color: #1F7938; border-radius: 50%; transition: all 0.3s ease;"/>
            </a>
            <a class="footer-link" href="https://x.com/uvureview" target="_blank" style="color: #1F7938;">
                <img class="social-icon" src="https://www.uvureview.com/wp-content/media/2025/02/X-Icon.png" alt="X" style="width: 42px; height: 42px; margin-left: 10px; color: #1F7938; border-radius: 50%; transition: all 0.3s ease;"/>
            </a>
            <a class="footer-link" href="https://www.instagram.com/uvureview/?hl=en" target="_blank" style="color: #1F7938;">
                <img class="social-icon" src="https://www.uvureview.com/wp-content/media/2025/02/Instagram-Icon.png" alt="Instagram" style="width: 42px; height: 42px; margin-left: 10px; color: #1F7938; border-radius: 50%; transition: all 0.3s ease;"/>
            </a>
            <a class="footer-link" href="https://www.youtube.com/@theuvureview" target="_blank" style="color: #1F7938;">
                <img class="social-icon" src="https://www.uvureview.com/wp-content/media/2025/02/YouTube-Icon.png" alt="YouTube" style="width: 42px; height: 42px; margin-left: 10px; color: #1F7938; border-radius: 50%; transition: all 0.3s ease;"/>
            </a>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="footer-copyright" style="text-align: center; margin-top: 1rem; background: #184627 !important; font-size: 12px;">
        <p><?php echo date('Y'); ?> &copy; The UVU Review 2025 | All Rights Reserved</p>
    </div>
</footer>

<?php get_template_part('template-parts/header/components/header-offcanvas-widget'); ?>
<?php get_template_part('template-parts/header/components/header-offcanvas'); ?>
<?php get_template_part('template-parts/header/components/header-search'); ?>

<?php wp_footer(); ?>

<style>
  /* Scroll to Top Button - Revised for Perfect Circle */
  .scroll-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;  /* Main control for circle width */
    height: 60px; /* Must match width for perfect circle */
    background-color: #01632F;
    color: white;
    border-radius: 50%; /* This creates the circle */
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 999;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    border: none;
    /* Debug border to visually confirm circle - remove in production */
    /* border: 1px solid red; */
  }
  
  /* Larger icon size */
  .scroll-to-top i {
    font-size: 28px; /* Increased from 24px */
    width: 1em;
    height: 1em;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .scroll-to-top.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
  
  .scroll-to-top:hover {
    background-color: #004220;
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
  }
  
  .scroll-to-top:active {
    transform: scale(0.95);
    background-color: #005a29;
  }
  
  .scroll-to-top:active i {
    transform: translateY(-3px);
  }
  
/*   [data-theme="dark"] .scroll-to-top {
    background-color: #333;
    border: 2px solid #00843d;
  } */
  
  @media (max-width: 768px) {
    .scroll-to-top {
      width: 56px;  /* Mobile width */
      height: 56px; /* Must match width */
      bottom: 20px;
      right: 20px;
    }
    .scroll-to-top i {
      font-size: 26px; /* Slightly smaller for mobile */
    }
  }

  /* Visual debug helper - uncomment to see circle outline */
  /*
  .scroll-to-top::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border: 1px solid red;
    border-radius: 50%;
    pointer-events: none;
  }
  */
</style>

<button class="scroll-to-top" aria-label="Scroll to top">
  <i class="fas fa-angle-up"></i>
</button>

<script>
document.addEventListener("DOMContentLoaded", function() {
  // Load Font Awesome if not already loaded
  if (!document.querySelector('link[href*="font-awesome"]')) {
    const faLink = document.createElement('link');
    faLink.rel = 'stylesheet';
    faLink.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css';
    document.head.appendChild(faLink);
  }

  const scrollButton = document.querySelector('.scroll-to-top');
  
  if (scrollButton) {
    const toggleVisibility = () => {
      if (window.pageYOffset > 300) {
        scrollButton.classList.add('show');
      } else {
        scrollButton.classList.remove('show');
      }
    };
    
    window.addEventListener('scroll', toggleVisibility);
    toggleVisibility();
    
    scrollButton.addEventListener('click', function(e) {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }
});
</script>

</body>
</html>