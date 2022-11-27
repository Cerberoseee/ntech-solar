$(document).ready(function() {
  $('.pd-banner').slick({
    arrows: true,
    prevArrow: '<button class="slick-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 67.504 30"><path d="M67.5,526.838a1.279,1.279,0,0,1-.391.938l-15,13.829a1.218,1.218,0,0,1-1.367.234A1.178,1.178,0,0,1,50,540.706v-8.75H1.25A1.2,1.2,0,0,1,0,530.705v-7.5a1.2,1.2,0,0,1,1.25-1.25H50V513.2a1.132,1.132,0,0,1,.742-1.133,1.254,1.254,0,0,1,1.367.2l15,13.673A1.235,1.235,0,0,1,67.5,526.838Z" transform="translate(0 -511.952)"/></svg></button>',
    nextArrow: '<button class="slick-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 67.504 30"><path d="M67.5,526.838a1.279,1.279,0,0,1-.391.938l-15,13.829a1.218,1.218,0,0,1-1.367.234A1.178,1.178,0,0,1,50,540.706v-8.75H1.25A1.2,1.2,0,0,1,0,530.705v-7.5a1.2,1.2,0,0,1,1.25-1.25H50V513.2a1.132,1.132,0,0,1,.742-1.133,1.254,1.254,0,0,1,1.367.2l15,13.673A1.235,1.235,0,0,1,67.5,526.838Z" transform="translate(0 -511.952)"/></svg></button>'
  });

//----------------------------------------------------------------------------------------------------------------------
// RELATED PRODUCT
//----------------------------------------------------------------------------------------------------------------------
loadRelatedProduct = function() {
    var related_product_list = document.getElementById('related-product-list');
    if (related_product_list) {
        new Swiper('#related-product-list', {
            // Optional parameters
            direction: 'horizontal',
            loop: false,
            watchOverflow: true,

            // Default parameters
            slidesPerView: 4,
            spaceBetween: 30,

            // Disable preloading of all images
            preloadImages: false,
            // Enable lazy loading
            lazy: true,

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },

            // Responsive breakpoints
            breakpoints: {
                320: {
                    slidesPerView: 1
                },
                576: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 4
                }
            }
        });
    }
};
addObserver('#project-related-product');

//----------------------------------------------------------------------------------------------------------------------
// RELATED PROJECT
//----------------------------------------------------------------------------------------------------------------------
loadOtherProject = function() {
    new Swiper('#other-project-list', {
        loop: false,
        slidesPerView: 3,
        slidesPerColumn: 2,
        slidesPerGroup: 6,
        slidesPerColumnFill: 'row',
        spaceBetween: 30,
        watchOverflow: true,

        // Disable preloading of all images
        preloadImages: false,
        // Enable lazy loading
        lazy: true,

        // Navigation arrows
        navigation: {
            nextEl: '.other-project-sw-next',
            prevEl: '.other-project-sw-prev'
        },

        pagination: {
            el: '.other-project-pagination',
            clickable: true
        },

        // Responsive breakpoints
        breakpoints: {
            320: {
                slidesPerView: 1,
                slidesPerColumn: 1,
                slidesPerGroup: 1
            },
            576: {
                slidesPerView: 3
            },
            768: {
                slidesPerView: 3,
                slidesPerColumn: 2,
                slidesPerGroup: 1,
                slidesPerColumnFill: 'row'
            }
        }
    });
};
addObserver('#other-project');
});
