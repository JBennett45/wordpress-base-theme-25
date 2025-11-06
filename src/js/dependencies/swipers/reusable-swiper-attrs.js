import Swiper from 'swiper/bundle';
const swipers = [];
// Single carousel setup | powered by swiper.js (webpack) //
document.querySelectorAll('.swiper-single-cst').forEach(function(singleSwiper) {
  // General vars | set from attributes // 
  let carouselDirection = singleSwiper.getAttribute('data-swiper-direction'); // vertical or horizonatal //
  let carouselLoop = singleSwiper.getAttribute('data-swiper-loop'); // loop //
  let carouselAutoplay = JSON.parse(singleSwiper.getAttribute('data-swiper-cst-autoplay')); // autoplay //
  let carouselAutoplaySpeed = JSON.parse(singleSwiper.getAttribute('data-swiper-cst-autoplay-speed')); // autoplay speed //
  let carouselCstNavigation = singleSwiper.getAttribute('data-swiper-cst-controls'); // custom navigation //
  let carouselCstPagination = singleSwiper.getAttribute('data-swiper-cst-pagination'); // custom pagination //
  // fallbacks //
  if(!carouselAutoplaySpeed) {
    carouselAutoplaySpeed = '2500';
  }
  if(!carouselAutoplay) {
    carouselAutoplay = false;
  }
  // Show / hide custom navigation controls //
  if(carouselCstNavigation == 'true') {
    singleSwiper.querySelector('.swiper-navivation-cst').classList.add('swiper-navivation-cst--active');
  }
  // Show / hide custom pagination //
  if(carouselCstPagination == 'true') {
    singleSwiper.querySelector('.swiper-pagination-cst').classList.add('swiper-pagination-cst--active');
  }
  // start swiper configuration //
  const swiper = new Swiper(singleSwiper, {
    loop: carouselLoop,
    direction: carouselDirection,
    slidesPerView: 1,
    effect: "fade",
    speed: 750,
    loopPreventsSlide: false,
    // autoplay //
    autoplay: {
      delay: carouselAutoplaySpeed,
      pauseOnMouseEnter: true
    },
    // controls - text and asset managed within slider //
    navigation: {
      enabled: carouselCstNavigation,
      prevEl: singleSwiper.querySelector('.swiper-ctrls-btn-previous'),
      nextEl: singleSwiper.querySelector('.swiper-ctrls-btn-next'),
    },
    // pagination - set text and class if needed //
    pagination: {
      el: ".swiper-pagination-cst",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '"></span>';
      }
    }
  });
  // switch off autoplay //
  if(carouselAutoplay == false) {
    swiper.autoplay.stop();
  }
  // Send solo //
  swipers.push(swiper);
});

// Multiple carousel setup | powered by swiper.js (webpack) //
document.querySelectorAll('.swiper-multiple-cst').forEach(function(multiSwiper) {
  // General vars | set from attributes // 
  let carouselLoop = multiSwiper.getAttribute('data-swiper-loop'); 
  // Responsive counts //
  let mobileCount = JSON.parse(multiSwiper.getAttribute('data-swiper-mobile-count')); 
  let tabletCount = JSON.parse(multiSwiper.getAttribute('data-swiper-tablet-count')); 
  let smallDesktop = JSON.parse(multiSwiper.getAttribute('data-swiper-smalldesktop-count')); 
  let midDesktop = JSON.parse(multiSwiper.getAttribute('data-swiper-middesktop-count')); 
  let largeDesktop = JSON.parse(multiSwiper.getAttribute('data-swiper-largedesktop-count'));
  // margins //
  let mobileMargin = JSON.parse(multiSwiper.getAttribute('data-swiper-mobile-margin'));
  let desktopMargin = JSON.parse(multiSwiper.getAttribute('data-swiper-desktop-margin'));
  // controls //
  let carouselAutoplay = JSON.parse(multiSwiper.getAttribute('data-swiper-cst-autoplay'));
  let carouselAutoplaySpeed = JSON.parse(multiSwiper.getAttribute('data-swiper-cst-autoplay-speed')); 
  let carouselCstNavigation = multiSwiper.getAttribute('data-swiper-cst-controls'); 
  let carouselCstPagination = multiSwiper.getAttribute('data-swiper-cst-pagination');
  // fallbacks //
  if(!carouselAutoplaySpeed) {
    carouselAutoplaySpeed = '2500';
  }
  if(!carouselAutoplay) {
    carouselAutoplay = false;
  }
  // Show / hide custom navigation controls //
  if(carouselCstNavigation == 'true') {
    multiSwiper.querySelector('.swiper-navivation-cst').classList.add('swiper-navivation-cst--active');
  }
  // Show / hide custom pagination //
  if(carouselCstPagination == 'true') {
    multiSwiper.querySelector('.swiper-pagination-cst').classList.add('swiper-pagination-cst--active');
  }
  // start swiper configuration //
  const swiper = new Swiper(multiSwiper, {
    loop: carouselLoop,
    speed: 750,
    // autoplay //
    autoplay: {
      delay: carouselAutoplaySpeed,
      pauseOnMouseEnter: true
    },
    // controls - text and asset managed within slider //
    navigation: {
      enabled: carouselCstNavigation,
      prevEl: multiSwiper.querySelector('.swiper-ctrls-btn-previous'),
      nextEl: multiSwiper.querySelector('.swiper-ctrls-btn-next'),
    },
    // pagination - set text and class if needed //
    pagination: {
      el: ".swiper-pagination-cst",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '"></span>';
      }
    },
    // breakpoint setup //
    breakpoints: {
      0: {
        slidesPerView: mobileCount,
        spaceBetween: mobileMargin,
      },
      520: {
        slidesPerView: tabletCount,
        spaceBetween: mobileMargin,
      },
      768: {
        slidesPerView: smallDesktop,
        spaceBetween: desktopMargin,
      },
      998: {
        slidesPerView: midDesktop,
        spaceBetween: desktopMargin,
      },
      1200: {
        slidesPerView: largeDesktop,
        spaceBetween: desktopMargin,
      },
    },
  });
  // switch off autoplay //
  if(carouselAutoplay == false) {
    swiper.autoplay.stop();
  }
  // Send multi //
  swipers.push(swiper);
});
// custom sliders //