$('.request_form__form').submit(function (e) {
  let data = $(this).serialize();
  $.ajax({
    url: '/ajax/feedback.php',
    type: 'POST',
    dataType: 'html',
    data: data,
    success: function (response) {
      if (response == 1) {
        alert(response);
        console.log('URa');
      } else {
        alert(response);
        console.log('2');
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {},
  });
  e.preventDefault();
});

const newsContainer = document.querySelector('.news_company__news');
const portfolioProjects = document.querySelector('.portfolio_projects_container');
const servicesProjects = document.querySelector('.services_list_container');

$('.news_company__news').on('click', (event) => {
  console.log(event.target);
  let btnShowMoreNews = document.querySelector('.load-more-items-news');
  if (btnShowMoreNews) {
    console.log('ok');
    var targetContainer = $('.news_company__news_list'),
      url = $('.load-more-items-news').attr('data-url');

    if (url !== undefined) {
      $.ajax({
        type: 'GET',
        url: url,
        dataType: 'html',
        success: function (data) {
          $('.load-more-items-news').remove();

          var elements = $(data).find('.news_company__news_list-item'),
            pagination = $(data).find('.load-more-items-news');

          targetContainer.append(elements);
          $('#pag1').append(pagination);
        },
      });
    }
  }
});
newsContainer && newsContainer.addEventListener('click', function (event) {});

servicesProjects &&
  servicesProjects.addEventListener('click', (event) => {
    console.log(event.target);
    let btnShowMoreServ = document.querySelector('.load-more-items-services');
    if (btnShowMoreServ) {
      console.log('ok');

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
  });

portfolioProjects &&
  portfolioProjects.addEventListener('click', (event) => {
    console.log('ok');
    let btnShowProjects = document.querySelector('.load-more-items');
    if (btnShowProjects) {
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
  });
