document.addEventListener('DOMContentLoaded', function () {
  const header = document.querySelector('.header');
  const burgerCheckbox = document.querySelector('.btn-burger');
  const menuColumn = document.querySelector('.menu-column');
  const menu = document.querySelector('.mobile-nav');
  const lang = document.querySelectorAll('.lang');

  burgerCheckbox.addEventListener('click', function () {
    if (
      !burgerCheckbox.classList.contains('active') &&
      !menuColumn.classList.contains('slide-in')
    ) {
      // if (!header.classList.contains('sticky')) {
      //   header.classList.add('sticky');
      // }

      menuColumn.classList.add('slide-in');
      menuColumn.classList.add('active');
      burgerCheckbox.classList.add('active');
      burgerCheckbox.classList.remove('not-active');
      menu.classList.remove('hide');
      burgerCheckbox.style.pointerEvents = 'none';

      setTimeout(() => {
        menuColumn.classList.remove('slide-in');
        burgerCheckbox.style.pointerEvents = 'auto';
      }, 300);
      // setTimeout(() => {
      //   menuColumn.classList.remove('slide-in');
      //   burgerCheckbox.style.pointerEvents = 'auto';
      // }, 1000);
    } else {
      // header.classList.remove('sticky');

      burgerCheckbox.classList.remove('active');
      burgerCheckbox.classList.add('not-active');
      burgerCheckbox.style.pointerEvents = 'none';

      menuColumn.classList.add('slide-out');
      setTimeout(() => {
        menuColumn.classList.remove('active');
        menuColumn.classList.remove('slide-out');
        burgerCheckbox.style.pointerEvents = 'auto';
      }, 290);
    }
  });

  lang.forEach((item) => {
    item.addEventListener('click', () => {
      lang.forEach((obj) => {
        obj.classList.toggle('active-lang', item === obj);
      });
    });
  });
  window.addEventListener('scroll', function () {
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollPosition >= 20) {
      header.classList.add('sticky');
    } else {
      header.classList.remove('sticky');
    }
  });
  window.addEventListener('click', function () {
    if (burgerCheckbox.classList.contains('active')) {
      this.document.body.style.overflow = 'hidden';
    } else {
      this.document.body.style.overflow = 'initial';
    }
  });
  window.addEventListener('load', function () {
    console.log('hello');
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    console.log(scrollPosition);

    if (scrollPosition >= 20) {
      header.classList.add('sticky');
    } else {
      header.classList.remove('sticky');
    }
  });
});
