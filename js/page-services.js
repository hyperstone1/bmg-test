var swiper = new Swiper('.swiper-container', {
  effect: 'coverflow',
  centeredSlides: true,
  loop: true,
  loopedSlides: 2,
  slidesPerView: 'auto',
  spaceBetween: 20,
  coverflowEffect: {
    rotate: 30,
    stretch: -20,
    depth: 50,
    modifier: 1,
    slideShadows: false,
  },
  pagination: {
    el: '.swiper-pagination',
  },
  navigation: {
    prevEl: '.slider-prev',
    nextEl: '.slider-next',
  },
  allowTouchMove: false,
});

function handleResize() {
  const width = window.innerWidth;
  const btnShow = document.querySelectorAll('.services_list__projects_text-btn');
  const projectsTitle = document.querySelector('.services_list__projects_text-title');

  if (width < 768) {
    // const listProjectsText = document.querySelector('.services_list__projects_text');
    // listProjectsText.appendChild(btnShow);
    btnShow.forEach((btn) => {
      const listProjectsText = btn.closest('.services_list__projects_text');
      listProjectsText.appendChild(btn);
    });
    swiper.destroy();
    swiper = new Swiper('.swiper-container', {
      centeredSlides: false,
      spaceBetween: 20,
      loop: true,
      slidesPerView: 'auto',
      allowTouchMove: true,
    });
    // swiper.passedParams.slidesPerView = 'auto';
    // swiper.params.slidesPerView = 'auto';
    // swiper.params.centeredSlides = false;
    // swiper.params.spaceBetween = 20;
    // swiper.allowTouchMove = true;
    // swiper.params.effect = 'slide';
    // swiper.params.coverflowEffect = undefined;

    console.log(swiper.params.allowTouchMove);
    // swiper.slides.css({ width: 'auto' });
    swiper.update(); // Обновляем Swiper после изменения параметров
    console.log(swiper);
  } else {
    swiper.destroy();
    swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      centeredSlides: true,
      loop: true,
      loopedSlides: 2,
      slidesPerView: 'auto',
      spaceBetween: 20,
      coverflowEffect: {
        rotate: 30,
        stretch: -20,
        depth: 50,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        prevEl: '.slider-prev',
        nextEl: '.slider-next',
      },
      allowTouchMove: false,
    });
    projectsTitle.appendChild(btnShow);
  }
}

window.addEventListener('load', handleResize);
window.addEventListener('resize', handleResize);
