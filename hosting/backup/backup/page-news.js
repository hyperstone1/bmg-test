document.addEventListener('DOMContentLoaded', () => {
  function handleResize() {
    const width = window.innerWidth;
    console.log(width);
    let sliderNews = new Swiper('.news_summary__projects_slider', {
      slidesPerView: 2,
      spaceBetween: width > 768 ? 50 : 10,
      centeredSlides: false,
      loop: true,
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
    });
  }

  window.addEventListener('resize', handleResize);
  window.addEventListener('load', handleResize);
});
