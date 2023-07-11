const comment = document.querySelector('.brokeridge_summary__text-comment');
const company = document.querySelector('.brokeridge_company');

function smoothScroll() {
  if (company) {
    const offset = company.offsetTop - 50;
    window.scrollTo({
      top: offset,
      behavior: 'smooth',
    });
  }
}

function handleResize() {
  const width = window.innerWidth;
  const btn = document.querySelector('.btn__submit');

  if (width < 768) {
    const container = document.querySelector('.brokeridge_summary__text');
    container && container.appendChild(btn);
  } else {
    const brokeridgeList = document.querySelector('.brokeridge_company__brokeridge_list');
    brokeridgeList && brokeridgeList.appendChild(btn);
  }
}

window.addEventListener('resize', handleResize);
window.addEventListener('load', handleResize);

comment && comment.addEventListener('click', smoothScroll);
