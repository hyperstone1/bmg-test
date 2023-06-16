document.addEventListener('DOMContentLoaded', () => {
  function handleResize() {
    const width = window.innerWidth;
    console.log(width);
    let sliderNews = new Swiper('.news_summary__projects_slider', {
      //   freeMode: true,
      slidesPerView: 2,
      spaceBetween: width > 768 ? 50 : 10,
      spaceBetween: 50,
      centeredSlides: false,
      effect: 'creative',
      creativeEffect: {
        prev: {
          // will set `translateZ(-400px)` on previous slides
          //   translate: [0, 0, -400],
          //   translate: ['100%', 0, 0],
          //   translate: ['120%', 0, 0],
        },
        next: {
          // will set `translateX(100%)` on next slides
          translate: [400, 0, 0],
        },
      },

      navigation: {
        nextEl: '.news_summary__projects-next',
        prevEl: '.news_summary__projects-prev',
      },
    });
  }

  window.addEventListener('resize', handleResize);
  window.addEventListener('load', handleResize);
});
