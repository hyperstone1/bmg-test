document.addEventListener('DOMContentLoaded', function () {
  const header = document.querySelector('.header');
  const burgerCheckbox = document.querySelector('.btn-burger');
  const menuColumn = document.querySelector('.menu-column');
  const menu = document.querySelector('.mobile-nav');
  const lang = document.querySelectorAll('.lang');

  burgerCheckbox.addEventListener('click', function () {
    if (!burgerCheckbox.classList.contains('active')) {
      if (!header.classList.contains('sticky')) {
        header.classList.add('sticky');
      }

      menuColumn.classList.add('slide-in');
      menuColumn.classList.add('active');
      burgerCheckbox.classList.add('active');
      burgerCheckbox.classList.remove('not-active');
      menu.classList.remove('hide');
      setTimeout(() => {
        menuColumn.classList.remove('slide-in');
      }, 300);
    } else {
      header.classList.remove('sticky');

      burgerCheckbox.classList.remove('active');
      burgerCheckbox.classList.add('not-active');

      menuColumn.classList.add('slide-out');
      setTimeout(() => {
        menuColumn.classList.remove('active');
        menuColumn.classList.remove('slide-out');
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
});
