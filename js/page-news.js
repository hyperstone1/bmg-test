document.addEventListener('DOMContentLoaded', () => {
  function handleResize() {
    const width = window.innerWidth;
    console.log(width);

    if (width < 768) {
      // Инициализировать вертикальный слайдер
      let sliderNewsVertical = new Swiper('.news_summary__projects_slider', {
        direction: 'vertical',
        slidesPerView: 2,
        centeredSlides: false,
        spaceBetween: 20,
        loop: true,
        navigation: {
          nextEl: '.news_summary__projects-next',
          prevEl: '.news_summary__projects-prev',
        },
        allowTouchMove: false,
      });
    } else {
      let sliderNews = new Swiper('.news_summary__projects_slider', {
        slidesPerView: 1,
        // spaceBetween: width > 768 ? 50 : 10,
        centeredSlides: false,
        loop: true,
        loopedSlides: 2,
        effect: 'creative',
        creativeEffect: {
          next: {
            translate: ['-100%', 0, 0],
          },
        },
        navigation: {
          nextEl: '.news_summary__projects-next',
          prevEl: '.news_summary__projects-prev',
        },
        allowTouchMove: false,
      });
    }
  }

  window.addEventListener('resize', handleResize);
  window.addEventListener('load', handleResize);
});
