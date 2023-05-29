const width = window.screen.width;
ymaps.ready(function () {
  var myMap = new ymaps.Map('map', {
      center: [55.840245, 37.492024],
      zoom: 14,
      controls: [],
      hideFooter: true,
      behaviors: ['default'],
    }),
    MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
      '<div class="placemark" style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>',
    ),
    myPlacemarkWithContent = new ymaps.Placemark(
      [55.840245, 37.492024],
      {
        hintContent: 'Собственный значок метки с контентом',
        balloonContent: 'А эта — новогодняя',
        iconContent: '12',
      },
      {
        // Опции.
        // Необходимо указать данный тип макета.
        iconLayout: 'default#image',
        // Своё изображение иконки метки.
        iconImageHref: './js/placemark.png',
        // Размеры метки.
        iconImageSize: width < 768 ? [58, 78] : [96, 131.48],
        // Смещение левого верхнего угла иконки относительно
        // её "ножки" (точки привязки).
        iconImageOffset: [-49, -126],
        // Смещение слоя с содержимым относительно слоя с картинкой.
        // iconContentOffset: [15, 15],
        // Макет содержимого.
        iconContentLayout: MyIconContentLayout,
      },
    );
  //   myMap.container.fitToViewport();
  myMap.setType('yandex#map');

  myMap.geoObjects.add(myPlacemarkWithContent);
});
