document.addEventListener('DOMContentLoaded', function () {
  let galleryTop;
  let sliderAdvantages;
  let sliderServices;

  function addSlider() {
    const width = screen.width;
    console.log(width);
    const navigation = document.querySelector('.swiper-nav');
    const slider = document.querySelector('.swiper-slider');
    // const navigationArrowNext = document.querySelector('.swiper-slider .swiper-button-next');
    // const navigationArrowPrev = document.querySelector('.swiper-slider .swiper-button-prev');

    const sliderNews = new Swiper('.last_news__list', {
      slidesPerView: 'auto',
      spaceBetween: width > 768 ? 50 : 10,
      navigation: {
        nextEl: '.last_news__navigation-next',
        prevEl: '.last_news__navigation-prev',
      },
    });
    if (galleryTop) {
      galleryTop.destroy();
    }
    if (width < 768) {
      console.log(navigation);

      // Если навигационной панели нету, создаем ее и стрелки для разрешения экрана меньше 768
      if (navigation === null) {
        const swiperContainer = document.querySelector('.swiper-slider');
        const sliderBtnNext = document.querySelector('.swiper-button-next');
        const sliderBtnPrev = document.querySelector('.swiper-button-prev');
        //Если присутствуют старые стрелки из разрешения экрана больше 768 - удаляем их
        if (sliderBtnNext && sliderBtnPrev) {
          slider.removeChild(sliderBtnNext);
          slider.removeChild(sliderBtnPrev);
        }
        let nav = document.createElement('div');
        nav.className = 'swiper-nav';

        let navNext = document.createElement('div');
        navNext.className = 'swiper-next';
        navNext.innerHTML = `
        <svg width="49" height="24" viewBox="0 0 49 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M2 10.5005C1.17157 10.5005 0.5 11.1721 0.5 12.0005C0.5 12.8289 1.17157 13.5005 2 13.5005L2 10.5005ZM48.0607 13.0612C48.6464 12.4754 48.6464 11.5256 48.0607 10.9398L38.5147 1.39389C37.9289 0.808103 36.9792 0.808103 36.3934 1.39389C35.8076 1.97968 35.8076 2.92942 36.3934 3.51521L44.8787 12.0005L36.3934 20.4858C35.8076 21.0716 35.8076 22.0213 36.3934 22.6071C36.9792 23.1929 37.9289 23.1929 38.5147 22.6071L48.0607 13.0612ZM2 13.5005L47 13.5005L47 10.5005L2 10.5005L2 13.5005Z" fill="#F9FBFE"/>
        </svg>
        `;

        let navPrev = document.createElement('div');
        navPrev.className = 'swiper-prev';
        navPrev.innerHTML = `

        <svg width="49" height="24" viewBox="0 0 49 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M47 13.5005C47.8284 13.5005 48.5 12.8289 48.5 12.0005C48.5 11.1721 47.8284 10.5005 47 10.5005L47 13.5005ZM0.939339 10.9398C0.353554 11.5256 0.353554 12.4754 0.939338 13.0611L10.4853 22.6071C11.0711 23.1929 12.0208 23.1929 12.6066 22.6071C13.1924 22.0213 13.1924 21.0716 12.6066 20.4858L4.12132 12.0005L12.6066 3.5152C13.1924 2.92941 13.1924 1.97967 12.6066 1.39388C12.0208 0.808094 11.0711 0.808093 10.4853 1.39388L0.939339 10.9398ZM47 10.5005L2 10.5005L2 13.5005L47 13.5005L47 10.5005Z" fill="#F9FBFE"/>
        </svg>
        `;
        nav.appendChild(navPrev);
        nav.appendChild(navNext);
        swiperContainer.appendChild(nav);
      }
      // Добавляем слайдер и новые стрелки
      galleryTop = new Swiper('.swiper-slider', {
        spaceBetween: 10,
        navigation: {
          nextEl: '.swiper-next',
          prevEl: '.swiper-prev',
        },
        clickable: true,
      });
    } else {
      // Если присутствует навигационная панель для резрешения меньш 768 - удаляем ее
      if (navigation !== null) {
        let swiperContainer = document.querySelector('.swiper-slider');
        swiperContainer.removeChild(navigation);
      }

      // Если нету стрелок при разрешении больше чем 768, то добавляем их
      // if (!navigationArrowNext && !navigationArrowPrev) {
      //   let navNext = document.createElement('div');
      //   navNext.className = 'swiper-button-next';
      //   let next = document.createElement('div');
      //   next.className = 'next';
      //   next.innerHTML = `
      //   <svg width="47" height="16" viewBox="0 0 47 16" fill="none" xmlns="http://www.w3.org/2000/svg">
      //     <path d="M1 7C0.447715 7 4.82823e-08 7.44772 0 8C-4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM46.7071 8.70711C47.0976 8.31659 47.0976 7.68342 46.7071 7.2929L40.3431 0.928936C39.9526 0.538411 39.3195 0.538411 38.9289 0.928936C38.5384 1.31946 38.5384 1.95262 38.9289 2.34315L44.5858 8L38.9289 13.6569C38.5384 14.0474 38.5384 14.6805 38.9289 15.0711C39.3195 15.4616 39.9526 15.4616 40.3431 15.0711L46.7071 8.70711ZM1 9L46 9L46 7L1 7L1 9Z" fill="#F9FBFE"></path>
      //   </svg>
      //   `;
      //   let btnNext = document.createElement('span');
      //   btnNext.className = 'btn-next';
      //   btnNext.innerText = 'далее';

      //   navNext.appendChild(next);
      //   navNext.appendChild(btnNext);

      //   let navPrev = document.createElement('div');
      //   navPrev.className = 'swiper-button-prev';
      //   let back = document.createElement('div');
      //   back.className = 'back';
      //   back.innerHTML = `
      //   <svg width="47" height="16" viewBox="0 0 47 16" fill="none" xmlns="http://www.w3.org/2000/svg">
      //     <path d="M1 7C0.447715 7 4.82823e-08 7.44772 0 8C-4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM46.7071 8.70711C47.0976 8.31659 47.0976 7.68342 46.7071 7.2929L40.3431 0.928936C39.9526 0.538411 39.3195 0.538411 38.9289 0.928936C38.5384 1.31946 38.5384 1.95262 38.9289 2.34315L44.5858 8L38.9289 13.6569C38.5384 14.0474 38.5384 14.6805 38.9289 15.0711C39.3195 15.4616 39.9526 15.4616 40.3431 15.0711L46.7071 8.70711ZM1 9L46 9L46 7L1 7L1 9Z" fill="#F9FBFE"></path>
      //   </svg>
      //   `;
      //   let btnBack = document.createElement('span');
      //   btnBack.className = 'btn-back';
      //   btnBack.innerText = 'назад';

      //   navPrev.appendChild(back);
      //   navPrev.appendChild(btnBack);

      //   slider.appendChild(navNext);
      //   slider.appendChild(navPrev);
      // }

      const projectsThumbs = document.querySelector('.projects_slider__thumbs');
      galleryTop = new Swiper('.swiper-slider', {
        slidesPerView: 1,
        spaceBetween: 10,
        effect: 'fade', // Используем эффект fade для плавного появления слайдов
        loop: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        allowTouchMove: false,
      });
      galleryTop.on('realIndexChange', function () {
        const thumbsItems = document.querySelectorAll('.projects_slider__thumbs-item');

        let containerImg = document.createElement('div');
        let newText = document.createElement('div');
        let newImg = document.createElement('img');
        newText.className = 'projects_slider__thumbs-item_title';
        console.log(thumbsItems);
        console.log(thumbsItems[4]);
        if (thumbsItems[4]) {
          newText.textContent = thumbsItems[4].querySelector(
            '.projects_slider__thumbs-item_title',
          ).textContent;
          newImg.src = thumbsItems[4].querySelector('img').src;
        } else {
          newText.textContent = thumbsItems[0].querySelector(
            '.projects_slider__thumbs-item_title',
          ).textContent;
          newImg.src = thumbsItems[0].querySelector('img').src;
        }

        containerImg.className = 'projects_slider__thumbs-item last';
        containerImg.appendChild(newImg);
        containerImg.appendChild(newText);
        projectsThumbs.insertBefore(containerImg, thumbsItems[4]);
        const navArrow = document.querySelector('.swiper-button-next');
        navArrow.style.pointerEvents = 'none';
        thumbsItems.forEach((thumb, id) => {
          if (id === 1) {
            thumb.classList.add('anim1');
          }
          if (id === 2) {
            thumb.classList.add('anim2');
          }
          if (id === 3) {
            thumb.classList.add('anim3');
          }
          if (id === 4) {
            thumb.classList.add('last');
          }
        });
        setTimeout(() => {
          projectsThumbs.removeChild(containerImg);
          projectsThumbs.appendChild(thumbsItems[0]);

          thumbsItems.forEach((thumb, id) => {
            //поправить нужно
            if (id === 1) {
              thumb.classList.remove('anim1');
            }
            if (id === 2) {
              thumb.classList.remove('anim2');
            }
            if (id === 3) {
              thumb.classList.remove('anim3');
            }
            if (id === 4) {
              thumb.classList.remove('last');
            }
          });
          navArrow.style.pointerEvents = 'auto';
        }, 500);
      });
    }
  }

  function sliderForServices() {
    const width = screen.width;
    if (sliderAdvantages) {
      sliderAdvantages.destroy();
    }
    if (sliderServices) {
      sliderServices.destroy();
    }
    if (width < 768) {
      sliderAdvantages = new Swiper('.complex__advantages__list', {
        slidesPerView: 'auto',
        centeredSlides: false,
        spaceBetween: 10,
        clickable: true,
        keyboard: {
          enabled: true,
        },
      });

      const services = document.querySelectorAll('.benefits_services_list-service');
      services.forEach((service) => {
        service.classList.add('swiper-slide');
      });

      sliderServices = new Swiper('.benefits_services_list-wrapper', {
        slidesPerView: 'auto',
        centeredSlides: false,
        spaceBetween: 10,
        clickable: true,
        keyboard: {
          enabled: true,
        },
      });
    }
  }
  sliderForServices();

  // Слушатели на ресайз и загрузку страницы
  window.addEventListener('resize', addSlider);
  window.addEventListener('load', addSlider);
  addSlider();
});
