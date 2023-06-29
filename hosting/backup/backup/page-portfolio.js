document.addEventListener('DOMContentLoaded', function () {
  //  аыввавыавыавыавыавыавыавыа let sliderAdvantages;
  function handleResize() {
    const width = window.screen.width;
    console.log(width);
    const containers = document.querySelectorAll('.portfolio_projects__projects_text-container');
    const filter = document.querySelector('.portfolio_projects-filter');
    const additional = document.querySelector('.portfolio_projects__filter_all');
    filter &&
      filter.addEventListener('click', () => {
        additional.classList.toggle('filter-open');
      });
    if (width < 768) {
      // const img = document.querySelector('.portfolio__img img');
      // console.log(img);
      // img.src = './images/portfolio/portfolio_mob.png';
      containers.forEach((container) => {
        container.classList.add('text-visible');
      });
    } else {
      containers.forEach((container) => {
        container.classList.remove('text-visible');

        container.closest('.portfolio_projects__projects-item').addEventListener('click', () => {
          const title = container
            .closest('.portfolio_projects__projects-item')
            .querySelector('.portfolio_projects__projects_text-title');

          container.classList.toggle('text-visible');
          title.classList.toggle('title-border');
        });
      });
    }
  }

  window.addEventListener('resize', handleResize);
  window.addEventListener('load', handleResize);
});

function showMessage() {
  var targetContainer = $('.portfolio_projects__projects'),
    url = $('.load-more-items').attr('data-url');

  if (url !== undefined) {
    $.ajax({
      type: 'GET',
      url: url,
      dataType: 'html',
      success: function (data) {
        $('.load-more-items').remove();

        var elements = $(data).find('.portfolio_projects__projects-item'),
          pagination = $(data).find('.load-more-items');

        targetContainer.append(elements);
        $('#pag').append(pagination);
      },
    });
  }
}
