document.addEventListener('DOMContentLoaded', () => {
  function handleResize() {
    const width = window.innerWidth;

    if (width < 768) {
      const images = document.querySelectorAll('.about_advantages__list-gradient img');
      images.forEach((img) => {
        img.src = './images/about/gradient_mob.png';
      });
      console.log(images);
    }
  }
  window.addEventListener('load', handleResize);
  window.addEventListener('resize', handleResize);
});
