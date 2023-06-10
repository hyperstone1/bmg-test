const comment = document.querySelector('.brokeridge_summary__text-comment');
const company = document.querySelector('.brokeridge_company');

function smoothScroll() {
  const offset = company.offsetTop - 50;
  window.scrollTo({
    top: offset,
    behavior: 'smooth',
  });
}

comment.addEventListener('click', smoothScroll);
