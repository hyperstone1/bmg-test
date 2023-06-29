document.addEventListener('DOMContentLoaded', () => {
  function handleResize() {
    const width = window.innerWidth;
    console.log(width);
    let sliderNews = new Swiper('.news_summary__projects_slider', {
      slidesPerView: 1,
      // spaceBetween: width > 768 ? 50 : 10,
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


function showNews() {
  
  var targetContainer = $('.news_company__news_list'),
      url =  $('.load-more-items-news').attr('data-url');

  if (url !== undefined) {
      $.ajax({
          type: 'GET',
          url: url,
          dataType: 'html',
          success: function(data){
        
              $('.load-more-items-news').remove();

              var elements = $(data).find('.news_company__news_list-item'),
                  pagination = $(data).find('.load-more-items-news');

              targetContainer.append(elements);
              $('#pag1').append(pagination);

          }
      });
  }

}
