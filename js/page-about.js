document.addEventListener('DOMContentLoaded', () => {
  function handleResize() {
    const width = window.innerWidth;

    if (width < 768) {
      const images = document.querySelectorAll('.about_advantages__list-gradient img');
      images &&
        images.forEach((img) => {
          img.src = '/bitrix/templates/bmg/images/about/gradient_mob.png';
        });
    }
  }
  window.addEventListener('load', handleResize);
  window.addEventListener('resize', handleResize);
});
