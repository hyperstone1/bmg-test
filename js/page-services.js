var swiper = new Swiper('.swiper-container', {
  slidesPerView: 3,
  centeredSlides: true,
  // spaceBetween: 80,
  loop: true,
  // effect: 'coverflow',
  // grabCursor: true,
  // coverflowEffect: {
  //   rotate: 30,
  //   stretch: 0,
  //   depth: 100,
  //   modifier: 1,
  //   // slideShadows: true,
  // },
  navigation: {
    nextEl: '.slider-next',
    prevEl: '.slider-prev',
  },
});
