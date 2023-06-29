var swiper = new Swiper('.services_summary__info-slider', {
  effect: 'coverflow',
  grabCursor: true,
  centeredSlides: true,
  loop: true,
  slidesPerView: 'auto',
  spaceBetween: 20,
  coverflowEffect: {
    rotate: 30,
    stretch: -20,
    depth: 50,
    modifier: 1,
  },
  navigation: {
    prevEl: '.slider-prev',
    nextEl: '.slider-next',
  },
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
    swiper.passedParams.slidesPerView = 'auto';
    swiper.params.slidesPerView = 'auto';
    swiper.params.centeredSlides = false;
    swiper.params.spaceBetween = 20;
    console.log(swiper.params.slidesPerView);
    // swiper.slides.css({ width: 'auto' });
    // setTimeout(function () {
    //   swiper.update(); // Обновляем Swiper после изменения параметров
    // }, 0);
    console.log(swiper);
  } else {
    projectsTitle.appendChild(btnShow);
  }
}

window.addEventListener('load', handleResize);
window.addEventListener('resize', handleResize);

function showServices() {
  var targetContainer = $('.services_list__projects'),
    url = $('.load-more-items-services').attr('data-url');

  if (url !== undefined) {
    $.ajax({
      type: 'GET',
      url: url,
      dataType: 'html',
      success: function (data) {
        $('.load-more-items-services').remove();

        var elements = $(data).find('.services_list__projects-item'),
          pagination = $(data).find('.load-more-items-services');

        targetContainer.append(elements);
        $('#pag2').append(pagination);
      },
    });
  }
}
