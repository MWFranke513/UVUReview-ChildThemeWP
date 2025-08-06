(function() {
    function initFooterMenu() {
        const companyHeader = document.querySelector('.mobile-footer-site-directory h3');
        const navHeader = document.querySelector('.mobile-footer-site-navigation h3');
        const companyDropdown = document.querySelector('.mobile-footer-site-directory');
        const navDropdown = document.querySelector('.mobile-footer-site-navigation');
        const dropdownArrow = document.querySelector('.dropdown-arrow');
        const dropdownArrow2 = document.querySelector('.dropdown-arrow-2');

        if (companyHeader && navHeader && companyDropdown && navDropdown && dropdownArrow) {
            companyHeader.addEventListener('click', function(e) {
                e.stopPropagation();
                companyDropdown.classList.toggle('active');
                dropdownArrow.classList.toggle('rotate');
            });

            navHeader.addEventListener('click', function(e) {
                e.stopPropagation();
                navDropdown.classList.toggle('active');
                dropdownArrow2.classList.toggle('rotate');
            });

            dropdownArrow.addEventListener('click', function(e) {
                e.stopPropagation();
                companyDropdown.classList.toggle('active');
                dropdownArrow.classList.toggle('rotate');
            });

            dropdownArrow2.addEventListener('click', function(e) {
                e.stopPropagation();
                navDropdown.classList.toggle('active');
                dropdownArrow2.classList.toggle('rotate');
            });
        }
    }

    // Initialize after parent theme's scripts
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFooterMenu);
    } else {
        initFooterMenu();
    }
})();




// // FIXING LOGO DARK MODE
// 		document.addEventListener('DOMContentLoaded', (event) => {
// 		  let toggle = document.querySelector("#mode-icon-switch")
// 		  let mode = document.querySelector(".theme-button-colormode").ariaLabel
		  
// 		  checkAria(mode)
			
// 		  toggle.addEventListener('click', (event) => {
// 			  let mode = document.querySelector(".theme-button-colormode").ariaLabel
// 			  if (mode === "light") {
// 				  darkMode()
// 			  } else {
// 				  lightMode()
// 			  }
			  
// 		  })
// 		});
		
// 	   function checkAria(mode) {
// 		  if (mode === 'auto') {
// 			  setTimeout(() => {
// 				  let mode = document.querySelector(".theme-button-colormode").ariaLabel
// 				  if (mode === "light") {
// 					  lightMode()
// 				  } else if (mode === "dark") {
// 					  darkMode()
// 				  }
// 				  checkAria(mode)
// 			  }, 500);
// 		  	}
// 		}
		
// 		function darkMode() {
// 			let logolink = document.querySelector(".custom-logo-link img")
// 			  logolink.src = "https://uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-white-1.avif"
// 			  logolink.srcset = "https://uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-white-1.avif 1404w, https://uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-white-1-300x80.avif 300w, https://uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-white-1-1200x321.avif 1200w, https://uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-white-1-150x40.avif 150w, https://i0.wp.com/uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-white-1.avif?w=1280&ssl=1 1280w"
// 			  console.log("dark-mode")
// 		}
		
// 		function lightMode() {
// 			let logolink = document.querySelector(".custom-logo-link img")
// 			  logolink.src = "https://i0.wp.com/uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-black.png?fit=1404%2C375&ssl=1"
// 			  logolink.srcset = "https://i0.wp.com/uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-black.png?w=1404&ssl=1 1404w, https://i0.wp.com/uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-black.png?resize=300%2C80&ssl=1 300w, https://i0.wp.com/uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-black.png?resize=1200%2C321&ssl=1 1200w, https://i0.wp.com/uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-black.png?resize=150%2C40&ssl=1 150w, https://i0.wp.com/uvureviewstg.wpengine.com/wp-content/media/2025/01/TheReview-black.png?w=1280&ssl=1 1280w"
// 			  console.log("light-mode")
// 		}
