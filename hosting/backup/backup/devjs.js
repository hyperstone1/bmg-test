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
  


$(".request_form__form").submit(function (e) {
  let data = $(this).serialize()
  $.ajax({
      url: '/ajax/feedback.php',
      type: "POST",
      dataType: "html",
      data: data,
      success: function (response) {
          if (response == 1) {
            alert(response);
            console.log("URa")
          } else {
            alert(response);
            console.log("2")
          }
          
      },
      error: function (jqXHR, textStatus, errorThrown) {
      }

  })
  e.preventDefault()
})