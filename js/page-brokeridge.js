const comment = document.querySelector('.brokeridge_summary__text-comment');
const company = document.querySelector('.brokeridge_company');
const btn = document.querySelector('.brokeridge_company__brokeridge-btn');

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

  if (width < 768) {
    const container = document.querySelector('.brokeridge_summary__text');
    container && container.appendChild(btn);
  } else {
    const brokeridge = document.querySelector('.brokeridge_company__brokeridge');
    brokeridge && brokeridge.appendChild(btn);
  }
}

window.addEventListener('resize', handleResize);
window.addEventListener('load', handleResize);

comment && comment.addEventListener('click', smoothScroll);
