document.addEventListener('DOMContentLoaded', function () {
  //   let sliderAdvantages;
  function handleResize() {
    const width = window.screen.width;
    console.log(width);
    if (width < 768) {
      const img = document.querySelector('.portfolio__img img');
      //   const filter = document.querySelector('.portfolio_projects-filter');
      //   if (!filter.classList.contains('swiper-wrapper')) {
      //     filter.classList.add('swiper-wrapper');
      //   }
      console.log(img);
      img.src = './images/portfolio/portfolio_mob.png';

      //   if (sliderAdvantages) {
      //     sliderAdvantages.destroy();
      //   }
      //   if (width < 768) {
      //     sliderAdvantages = new Swiper('.portfolio_projects__filter', {
      //       slidesPerView: 'auto',
      //       centeredSlides: false,
      //       //отвечает за свободное перелистывание
      //       freeMode: true,
      //       spaceBetween: 10,
      //       clickable: true,
      //       keyboard: {
      //         enabled: true,
      //       },
      //     });
      //   }
    }
  }

  window.addEventListener('resize', handleResize);
  window.addEventListener('load', handleResize);
});
