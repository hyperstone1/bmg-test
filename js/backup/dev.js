/* Недвижимость карты*/
$(document).ready(function () {
  $('#map-filter').on('change', function () {
    let num_rooms = [];
    let type_of_house = [];
    let type_deal = $('.map-filter__submit').attr('datatype');
    $('input:checkbox[name=num_rooms]:checked').each(function () {
      num_rooms.push($(this).val());
    });
    $('input:checkbox[name=type_of_houses]:checked').each(function () {
      type_of_house.push($(this).val());
    });
    let nefirst = $('input:checkbox[name=nefirst]:checked').val();
    let nelast = $('input:checkbox[name=nelast]:checked').val();
    let data =
      $(this).serialize() +
      '&type_of_house=' +
      type_of_house +
      '&number_of_rooms=' +
      num_rooms +
      '&nefirst=' +
      nefirst +
      '&nelast=' +
      nelast +
      '&type_deal=' +
      type_deal;
    $.ajax({
      type: 'post',
      url: '/ajax/nedvizhimost/map-filter.php',
      data: data,
      dataType: 'html',

      success: function (data) {
        $('.property-map__inner').empty();
        $('.property-map__inner').append(data);
      },
      error: function (data) {
        console.log(data);
        console.log(false);
      },
    });
    return false;
  });

  $('#map-filter').submit(function () {
    let num_rooms = [];
    let type_of_house = [];
    let type_deal = $('.map-filter__submit').attr('datatype');
    $('input:checkbox[name=num_rooms]:checked').each(function () {
      num_rooms.push($(this).val());
    });
    $('input:checkbox[name=type_of_houses]:checked').each(function () {
      type_of_house.push($(this).val());
    });
    let nefirst = $('input:checkbox[name=nefirst]:checked').val();
    let nelast = $('input:checkbox[name=nelast]:checked').val();
    let data =
      $(this).serialize() +
      '&type_of_house=' +
      type_of_house +
      '&number_of_rooms=' +
      num_rooms +
      '&nefirst=' +
      nefirst +
      '&nelast=' +
      nelast +
      '&type_deal=' +
      type_deal;
    $.ajax({
      type: 'post',
      url: '/ajax/nedvizhimost/map-filter.php',
      data: data,
      dataType: 'html',

      success: function (data) {
        $('.property-map__inner').empty();
        $('.property-map__inner').append(data);
        $('.map-filter').css('display', 'none');
      },
      error: function (data) {
        console.log(data);
        console.log(false);
      },
    });
    return false;
  });
  $('.filter__link').click(function () {
    let num_rooms = [];
    let type_deal = $('.filter__submit').val();
    $('input:checkbox[name=num_rooms]:checked').each(function () {
      num_rooms.push($(this).val());
    });
    let nefirst = $('input:checkbox[name=nefirst]:checked').val();
    let nelast = $('input:checkbox[name=nelast]:checked').val();
    let data =
      $('.filter-real_estate').serialize() +
      '&number_of_rooms=' +
      num_rooms +
      '&nefirst=' +
      nefirst +
      '&nelast=' +
      nelast +
      '&type_deal=' +
      type_deal;
    var new_path = window.document.location.origin + '/nedvizhimost/map.php?' + data;
    window.location.href = new_path;
  });
});

/* Сортировка */
// const tabsBtn1 = document.querySelectorAll(".tab-buttons");
// const tabsItems1 = document.querySelectorAll(".tab-contents");
//
// $(document).ready(function () {
//
//     $('.sort-element').click(function () {
//         var data = $("#vsl").html();
//         console.log(data);
//         $.ajax({
//             type: 'post',
//             url: '/ajax/uslugi/sort.php',
//             data: data,
//             dataType: 'html',
//
//
//             success: function (e) {
//                 console.log(e);
//                 $('.wrapper-filter').empty();
//                 $('.wrapper-filter').append(e);
//             },
//             error: function (e) {
//                 console.log(e);
//                 console.log(false);
//             }
//         });
//         return false;
//     })
// });

// вход
$(document).ready(function () {
  $('.modal-login__form').submit(function () {
    var data = $(this).serialize();

    $.ajax({
      type: 'post',
      url: '/ajax/auth/login.php',
      data: data,
      dataType: 'json',
      success: function (e) {
        if (e == 'Неверный логин/пароль') {
          alert('Неверный Email или пароль');
          //$('.login-error').css('display', 'block');
          console.log(e);
        } else {
          //$('.login-error').css('display', 'none');
          localStorage.setItem('jwtToken', e['jwtToken']);
          localStorage.setItem('exchangeName', e['exchangeName']);
          localStorage.setItem('userID', e['userID']);
          window.location = '/profile';
          //console.log(e['jwtToken']);
        }
      },
      error: function (e) {
        console.log(false);
      },
    });
    return false;
  });
});

$(document).ready(function () {
  $('.btn-exit').click(function () {
    var that = $(this);
    var data = that.serialize();

    $.ajax({
      type: 'post',
      url: '/ajax/auth/logout.php',
      data: data,
      dataType: 'html',
      success: function (e) {
        localStorage.removeItem('jwtToken');
        localStorage.removeItem('exchangeName');
        localStorage.removeItem('userID');
        window.location = '/';
      },
      error: function (e) {
        console.log(e);
        console.log(false);
      },
    });
    return false;
  });
});

//////// Избранное
$(document).ready(function () {
  $('.wrapper-filter').on('click', '.cart__favorite', function (e) {
    ///Подправил, чтобы после ajax работало
    var favorID = $(this).attr('data-item');
    var favorRazdel = $(this).attr('data-razdel');
    if ($(this).hasClass('active')) {
      var doAction = 'delete';
    } else {
      var doAction = 'add';
    }
    addFavorite(favorID, doAction, favorRazdel);
  });

  function addFavorite(id, action, razdel) {
    var param = 'id=' + id + '&action=' + action + '&razdel=' + razdel;
    $.ajax({
      url: '/ajax/favorites.php', // URL отправки запроса
      type: 'GET',
      dataType: 'html',
      data: param,
      success: function (response) {
        // Если Данные отправлены успешно
        var result = $.parseJSON(response);
        if (result == 1) {
          // Если всё чётко, то выполняем действия, которые показывают, что данные отправлены
          $('.cart__favorite[data-item="' + id + '"]').addClass('active');
        }
        if (result == 2) {
          $('.cart__favorite[data-item="' + id + '"]').removeClass('active');
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // Ошибка
        console.log('Error: ' + errorThrown);
      },
    });
  }
});

// выбор категории
$(document).ready(function () {
  $('.category-select').on('click', '.category', function () {
    let auth = $(this).attr('data-auth');
    if (parseInt(auth) == 0) {
      $('.modal-login').css('display', 'flex');
      $('.overlay').css('display', 'block');
    } else {
      var category = $(this).val();
      if (category == 2) {
        var step = 1;
        var url = '/ajax/category/nedvizhimost-steps.php';
      } else {
        var url = '/ajax/category/first-step.php';
      }

      $.ajax({
        type: 'post',
        url: url,
        data: { category: category, step: step },
        dataType: 'html',
        success: function (e) {
          $('.category-select').empty().append(e);
        },
        error: function (e) {
          console.log(e);
          console.log(false);
        },
      });
      return false;
    }
  });
});

// Другая категория
$(document).ready(function () {
  $('.other-category').click(function () {
    var data = $(this).serialize();

    $.ajax({
      type: 'post',
      url: '/ajax/category/other.php',
      data: data,
      dataType: 'html',
      success: function (e) {
        $('.category-select').empty().append(e);
      },
      error: function (e) {
        console.log(false);
      },
    });
    return false;
  });
  $('.main').on('click', '.other-category', function () {
    var data = 'main';

    $.ajax({
      type: 'post',
      url: '/ajax/category/other.php',
      data: { data: data },
      dataType: 'html',
      success: function (e) {
        $('.main').empty().append(e);
      },
      error: function (e) {
        console.log(false);
      },
    });
    return false;
  });
});

// Регистрация

$(document).ready(function () {
  $('#registration_modal').submit(function () {
    var data = $(this).serialize();
    $.ajax({
      type: 'post',
      url: '/ajax/auth/registration.php',
      data: data,
      dataType: 'html',
      success: function (e) {
        alert(e);
      },
      error: function (e) {
        console.log(false);
      },
    });
    return false;
  });
});

//Сброс пароля
$(document).ready(function () {
  $('.modal-restore__form').submit(function () {
    var data = $(this).serialize();
    $.ajax({
      type: 'post',
      url: '/ajax/personal/forgot.php',
      data: data,
      dataType: 'html',
      success: function (e) {
        console.log(e);
        if (e == 1) {
          //$(".overlay").css('display', 'block');
          $('.modal-success__restore').css('display', 'block');
        } else {
          var index = 'EMAIL'; // Замените 'your_input_name' на имя вашего input элемента
          console.log(index);
          var inputElement = $('.modal-restore__form input[name=' + index + ']');
          console.log(inputElement.parent().find('.error_input').text);
          let err = $('.error_input');
          let text = err.text();
          console.log(text);
          if (text !== e) {
            err.text(e);
          }
          if (!inputElement.parent().find('.error_input').length) {
            inputElement
              .addClass('invalid')
              .parent()
              .append('<span class="error_input">' + e + '</span>');
            console.log(inputElement.parent().find('.error_input').textContent);
            console.log(inputElement.parent().find('.error_input'));
          }
        }
      },
      error: function (e) {
        console.log(false);
      },
    });
    return false;
  });
});

// Изменение данных профиля

$(document).ready(function () {
  $('#change_frofile').submit(function () {
    var data = $(this).serialize();

    $.ajax({
      type: 'post',
      url: '/ajax/auth/change_info.php',
      data: data,
      dataType: 'html',
      success: function (e) {
        alert(e);
      },
      error: function (e) {
        console.log(false);
      },
    });
    return false;
  });
});

// контакты обратная связь

$(document).ready(function () {
  $('.application__input-name').on('keydown', function () {
    $(this).removeClass('invalid');
    $(this).parent().find('span.error_input').remove();
  });
  $('.application__input-email').on('keydown', function () {
    $(this).removeClass('invalid');
    $(this).parent().find('span.error_input').remove();
  });
  $('.application__input-text').on('keydown', function () {
    $(this).removeClass('invalid');
    $(this).parent().find('span.error_input').remove();
  });
  $('.application__form').submit(function () {
    var data = $(this).serialize();

    $.ajax({
      type: 'post',
      url: '/ajax/kontakty.php',
      data: data,
      dataType: 'html',
      success: function (e) {
        e = JSON.parse(e);
        if (e == 1) {
          //$(".overlay").css('display', 'block');
          $('.send-message').css('display', 'flex');
        } else {
          $.each(e, function (index, value) {
            console.log(index);
            console.log(value);
            var inputElement = $('input[name=' + index + ']');
            var textAreaEl = $('textarea[name=' + index + ']');
            if (!inputElement.parent().find('.error_input').length) {
              inputElement
                .addClass('invalid')
                .parent()
                .append('<span class="error_input">' + value + '</span>');
            }
            if (!textAreaEl.parent().find('.error_input').length) {
              textAreaEl
                .addClass('invalid')
                .parent()
                .append('<span class="error_input">' + value + '</span>');
            }
          });
        }
      },
      error: function (e) {
        console.log(false);
      },
    });
    return false;
  });
});

// Изменение пароля
$('#change_password').submit(function () {
  var data = $(this).serialize();

  $.ajax({
    type: 'post',
    url: '/ajax/auth/change_password.php',
    data: data,
    dataType: 'html',
    success: function (e) {
      alert(e);
    },
    error: function (e) {
      console.log(false);
    },
  });
  return false;
});

// Разрешение на изменение

$('#change_active').click(function () {
  $('input[name="NAME"]').removeAttr('readonly');
  $('input[name="EMAIL"]').removeAttr('readonly');
  $('input[name="TELEPHONE"]').removeAttr('readonly');
  $('input[name="COUNTRY"]').removeAttr('readonly');
  $('.btn_change_personal').removeAttr('hidden');
});

// Поисковик

$('#search_btn').click(function () {
  let search = $('input[name="search"]').val();
  window.location = '/search/?search=' + search;
});

// Фильтр поисковика

$('select[name="SORT_DATA"]').on('change', function () {
  $('input[name="DATA_SORT"]').val($(this).val());
  let data = $('#filter_search').serialize();
  $.ajax({
    type: 'post',
    url: '/ajax/search/filter.php',
    data: data,
    dataType: 'html',
    success: function (e) {
      $('#catalog_search').html(e);
    },
    error: function (e) {
      console.log(false);
    },
  });
});

$('select[name="SORT_PRICE"]').on('change', function () {
  $('input[name="PRICE_SORT"]').val($(this).val());
  let data = $('#filter_search').serialize();
  $.ajax({
    type: 'post',
    url: '/ajax/search/filter.php',
    data: data,
    dataType: 'html',
    success: function (e) {
      $('#catalog_search').html(e);
    },
    error: function (e) {
      console.log(false);
    },
  });
});

$('input[name="my_range"]').on('change', function () {
  let data = $('#filter_search').serialize();
  $.ajax({
    type: 'post',
    url: '/ajax/search/count.php',
    data: data,
    dataType: 'html',
    success: function (e) {
      $('.filter__submit-count').html(e);
    },
    error: function (e) {
      console.log(false);
    },
  });
});

$('#filter_search').submit(function () {
  let data = $(this).serialize();
  $.ajax({
    type: 'post',
    url: '/ajax/search/filter.php',
    data: data,
    dataType: 'html',
    success: function (e) {
      if ($('.filter__submit-count').html() == 0) {
        $('.null_count').html('Результатов по вашему запросу не обнаружено');
      } else {
        $('.null_count').html('Поиск');
      }
      $('#catalog_search').html(e);
    },
    error: function (e) {
      console.log(false);
    },
  });
});

$('input[name="PRICE_OT"]').on('сlick', function () {
  let data = $('#form_search_mob').serialize();
  $.ajax({
    type: 'post',
    url: '/ajax/search/count.php',
    data: data,
    dataType: 'html',
    success: function (e) {
      $('.filter__submit-count').html(e);
    },
    error: function (e) {
      console.log(false);
    },
  });
});

$('input[name="PRICE_DO"]').on('click', function () {
  let data = $('#form_search_mob').serialize();
  $.ajax({
    type: 'post',
    url: '/ajax/search/count.php',
    data: data,
    dataType: 'html',
    success: function (e) {
      $('.filter__submit-count').html(e);
    },
    error: function (e) {
      console.log(false);
    },
  });
});

$('#form_search_mob').submit(function () {
  let data = $(this).serialize();
  $.ajax({
    type: 'post',
    url: '/ajax/search/filter.php',
    data: data,
    dataType: 'html',
    success: function (e) {
      $('#catalog_search').html(e);
      $('.form-filter').css('display', 'none');
      if ($('.filter__submit-count').html() == 0) {
        $('.null_count').html('Результатов по вашему запросу не обнаружено');
      }
    },
    error: function (e) {
      console.log(false);
    },
  });
});

// Поисковик

$('.help__search').submit(function () {
  let data = $(this).serialize();
  $.ajax({
    type: 'post',
    url: '/ajax/helper.php',
    data: data,
    dataType: 'html',
    success: function (data) {
      $('.search_help').html(data);
    },
    error: function (data) {
      console.log(data);
      console.log(false);
    },
  });
  return false;
});

// Удаление избранного из лк

$('.delete_izbrannoye').click(function () {
  let id = $(this).attr('data-id');
  let section = $(this).attr('data-section');
  $.ajax({
    type: 'post',
    url: '/ajax/delete-favorites.php',
    data: { ID: id, SECTION: section },
    dataType: 'html',
    success: function (data) {
      $('.favorites_list').html(data);
    },
    error: function (data) {
      console.log(data);
      console.log(false);
    },
  });
  return false;
});

$('.rabota_filter-category').click(function () {
  $('.filter-work')[0].reset();
  $('.data__categories-item').removeClass('data__categories-item--active');
  $(this).parent('.data__categories-item').addClass('data__categories-item--active');
  let data =
    'type=' +
    $(this).attr('data-id') +
    '&selectPrice=' +
    $('#work_select_price').val() +
    '&selectDate=' +
    $('#work_select_date').val();
  $('.info__select-input').first().val($(this).attr('data-id'));
  $('html, body').animate({ scrollTop: $('#catalog').offset().top + 'px' }, { duration: 1e3 });
  $.ajax({
    type: 'post',
    url: '/ajax/work/filter.php',
    data: data,
    dataType: 'html',

    success: function (e) {
      // const data = $('.filter-uslugi').serialize();
      $.ajax({
        type: 'POST',
        url: '/ajax/work/count.php',
        data: data,
        success: function (data) {
          $('span.filter__submit-count').html(data);
        },
        error: function (data) {
          console.log(data);
        },
      });
      $('.wrapper-filter').empty();
      $('.wrapper-filter').append(e);
      if ($('#format-carts').hasClass('announcements__format--active')) {
        $('.announcements__items').addClass('announcements__items--justify');
        $('.cart').addClass('cart--justify');
      } else {
        $('.cart').removeClass('cart--justify');
      }
    },
    error: function (e) {
      console.log(e);
      console.log(false);
    },
  });
  return false;
});

$('.rabota_filter-category').click(function () {
  $('.filter-uslugi')[0].reset();
  $('.data__categories-item').removeClass('data__categories-item--active');
  $(this).parent('.data__categories-item').addClass('data__categories-item--active');
  let data =
    'categoria=' +
    $(this).attr('data-id') +
    '&selectPrice=' +
    $('#uslugi_select_price').val() +
    '&selectDate=' +
    $('#uslugi_select_date').val();
  $('html, body').animate({ scrollTop: $('#catalog').offset().top + 'px' }, { duration: 1e3 });
  $.ajax({
    type: 'post',
    url: '/ajax/uslugi/filter.php',
    data: data,
    dataType: 'html',

    success: function (e) {
      // const data = $('.filter-uslugi').serialize();
      $.ajax({
        type: 'POST',
        url: '/ajax/uslugi/count.php',
        data: data,
        success: function (data) {
          $('span.filter__submit-count').html(data);
        },
        error: function (data) {
          console.log(data);
        },
      });
      $('.wrapper-filter').empty();
      $('.wrapper-filter').append(e);
      if ($('#format-carts').hasClass('announcements__format--active')) {
        $('.announcements__items').addClass('announcements__items--justify');
        $('.cart').addClass('cart--justify');
      } else {
        $('.cart').removeClass('cart--justify');
      }
    },
    error: function (e) {
      console.log(e);
      console.log(false);
    },
  });
  return false;
});

$('.registration-social_link').click(function (e) {
  let id = $(this).attr('data-id');
  $.ajax({
    type: 'post',
    url: '/ajax/social/index.php',
    data: { ID: id },
    dataType: 'html',
    success: function (data) {},
    error: function (data) {
      console.log(data);
      console.log(false);
    },
  });
  e.preventDefault();
});
$(document).ready(function () {
  $('.categories-modal__btn');
  $.click(() => {});
});

$(document).ready(function () {
  $(document).click(function (e) {
    if (
      $(e.target).hasClass('categories-modal__btn') ||
      $(e.target).hasClass('link__text') ||
      $(e.target).hasClass('link__btn')
    ) {
      console.log('match');
      let id = $(e.target).closest('.categories-modal__btn').attr('data-id');
      $('.categories-modal__list').each(function () {
        $(this).removeClass('categories-modal__list--active');
      });
      $('.categories-modal__btn').each(function () {
        $(this).removeClass('categories-modal__btn--active');
      });

      $('.categories-modal__list_' + id).addClass('categories-modal__list--active');
      $('.categories-modal__btn[data-id="' + id + '"]').addClass('categories-modal__btn--active');
      e.preventDefault();
    }
  });
});




$(document).ready(function () {
  $('.service_items').click(function () {
    $("#service_item").val($(this).attr("data-id"))
    let data = $("#map_filter__services").serialize()
    $.ajax({
      type: 'POST',
      url: '/ajax/uslugi/map.php',
      data: data,
      success: function (e) {
        $('#catalog_service').html(e);
      },
      error: function (data) {
        console.log(data);
      },
    });
  })

  $('#map_filter__services').on("input",function () {
    let data = $("#map_filter__services").serialize()
    $.ajax({
      type: 'POST',
      url: '/ajax/uslugi/map.php',
      data: data,
      success: function (e) {
        $('#catalog_service').html(e);
      },
      error: function (data) {
        console.log(data);
      },
    });
  })

  $('#map_filter__services_mob').submit(function () {
    let data = $(this).serialize()
    $.ajax({
      type: 'POST',
      url: '/ajax/uslugi/map.php',
      data: data,
      success: function (e) {
        $('#catalog_service').html(e);
      },
      error: function (data) {
        console.log(data);
      },
    });
  })
})




