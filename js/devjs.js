const newsContainer = document.querySelector('.news_company__news');
const portfolioProjects = document.querySelector('.portfolio_projects_container');
const servicesProjects = document.querySelector('.services_list_container');

$(document).ready(() => {
  $('.news_company__news') &&
    $('.news_company__news').on('click', (event) => {
      console.log(event.target);
      let btnShowMoreNews = document.querySelector('.load-more-items-news');
      if (btnShowMoreNews.contains(event.target) || btnShowMoreNews === event.target) {
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

  $('.services_list_container') &&
    $('.services_list_container').on('click', (event) => {
      console.log(event.target);
      let btnShowMoreServ = document.querySelector('.load-more-items-services');
      if (btnShowMoreServ.contains(event.target) || btnShowMoreServ === event.target) {
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
  $('.portfolio_projects_container') &&
    $('.portfolio_projects_container').on('click', (event) => {
      let btnShowProjects = document.querySelector('.load-more-items');
      console.log(event.target);
      console.log(btnShowProjects.contains(event.target));
      if (btnShowProjects.contains(event.target) || btnShowProjects === event.target) {
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
  // Функция валидации имени
  function validateName(name) {
    return name.length >= 3 && name.length <= 14;
  }

  $('.request_form__form-inp[name="TELEPHONE"]').mask('+ 7 999 999 99 99');

  // Функция валидации телефона
  function validatePhone(phone) {
    console.log(phone.length);
    console.log($('.request_form__form-inp[name="TELEPHONE"]').attr('maxlength'));
    return (
      phone.length === Number($('.request_form__form-inp[name="TELEPHONE"]').attr('maxlength'))
    );
  }

  // Функция валидации email
  function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  // Функция валидации комментария
  function validateComment(comment) {
    return comment.length >= 3;
  }

  // Получаем элементы формы
  const form = $('.request_form__form');
  const nameInput = form.find('input[name="NAME"]');
  const phoneInput = form.find('input[name="TELEPHONE"]');
  const emailInput = form.find('input[name="EMAIL"]');
  const commentInput = form.find('input[name="COMMENT"]');

  // Обработчик отправки формы
  form.on('submit', function (e) {
    e.preventDefault();

    // Проверяем валидность каждого поля
    const isNameValid = validateName(nameInput.val());
    const isPhoneValid = validatePhone(phoneInput.val());
    const isEmailValid = validateEmail(emailInput.val());
    const isCommentValid = validateComment(commentInput.val());

    // Если все поля прошли валидацию, отправляем форму
    if (isNameValid && isPhoneValid && isEmailValid && isCommentValid) {
      let data = $(this).serialize();
      console.log(data);
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
    } else {
      nameInput.toggleClass('invalid', !isNameValid);
      phoneInput.toggleClass('invalid', !isPhoneValid);
      emailInput.toggleClass('invalid', !isEmailValid);
      commentInput.toggleClass('invalid', !isCommentValid);
    }
  });

  // Применяем валидацию к каждому полю при изменении
  nameInput.on('input', function () {
    const isValid = validateName($(this).val());
    $(this).toggleClass('invalid', !isValid);
  });

  phoneInput.on('input', function () {
    const isValid = validatePhone($(this).val());
    $(this).toggleClass('invalid', !isValid);
  });

  emailInput.on('input', function () {
    const isValid = validateEmail($(this).val());
    $(this).toggleClass('invalid', !isValid);
  });

  commentInput.on('input', function () {
    const isValid = validateComment($(this).val());
    $(this).toggleClass('invalid', !isValid);
  });
  $('.modal-close').click(() => {
    const modal = $(this).closest('modal');
    modal.addClass('modal-closing');
    setTimeout(() => {
      modal.css('display', 'none');
      modal.removeClass('modal-closing');
    }, 600);
  });
});
