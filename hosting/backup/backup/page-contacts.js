const width = window.screen.width;
ymaps.ready(function () {
  const contacts = document.querySelector('.contacts');

  var myMap = new ymaps.Map('map', {
      center: [55.840245, 37.492024],
      zoom: 14,
      controls: [],
      hideFooter: true,
      behaviors: ['default'],
    }),
    myPlacemark1 = new ymaps.Placemark(
      [55.840245, 37.492024],
      {},
      {
        // Опции.
        // Необходимо указать данный тип макета.
        iconLayout: 'default#image',
        // Своё изображение иконки метки.
        iconImageHref: '/bitrix/templates/bmg/js/placemark.png',
        // Размеры метки.
        iconImageSize: width < 768 ? [58, 78] : [96, 131.48],
        // Смещение левого верхнего угла иконки относительно
        // её "ножки" (точки привязки).
        iconImageOffset: [-49, -126],
        // Смещение слоя с содержимым относительно слоя с картинкой.
        // iconContentOffset: [15, 15],
        // Макет содержимого.
      },
    );
  myPlacemark2 = new ymaps.Placemark(
    [55.840245, 37.492024],
    {},
    {
      // Опции.
      // Необходимо указать данный тип макета.
      iconLayout: 'default#image',
      // Своё изображение иконки метки.
      iconImageHref: '/bitrix/templates/bmg/js/placemark2.png',
      // Размеры метки.
      iconImageSize: width < 768 ? [58, 78] : [96, 131.48],
      // Смещение левого верхнего угла иконки относительно
      // её "ножки" (точки привязки).
      iconImageOffset: [-49, -126],
      // Смещение слоя с содержимым относительно слоя с картинкой.
      // iconContentOffset: [15, 15],
      // Макет содержимого.
    },
  );
  //   myMap.container.fitToViewport();
  myMap.setType('yandex#map');

  myMap.geoObjects.add(myPlacemark1);
  myMap.geoObjects.add(myPlacemark2);
  contacts.style.opacity = '1';
});
