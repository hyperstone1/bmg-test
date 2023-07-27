document.addEventListener('DOMContentLoaded', function () {
  //   let sliderAdvantages;
  function handleResize() {
    const width = window.screen.width;
    console.log(width);
    const containers = document.querySelectorAll('.portfolio_projects__projects_text-container');
    const filter = document.querySelector('.portfolio_projects-filter');
    const additional = document.querySelector('.portfolio_projects__filter_all');
    filter.addEventListener('click', () => {
      additional.classList.toggle('filter-open');
    });
    if (width < 768) {
      // const img = document.querySelector('.portfolio__img img');
      // console.log(img);
      // img.src = './images/portfolio/portfolio_mob.png';
      containers.forEach((container) => {
        container.classList.add('text-visible');
      });
    } else {
      containers.forEach((container) => {
        container.classList.remove('text-visible');
      });
      function toggleTextAndTitle(container) {
        const title = container
          .closest('.portfolio_projects__projects-item')
          .querySelector('.portfolio_projects__projects_text-title');
        container.classList.toggle('text-visible');
        title.classList.toggle('title-border');
      }

      const projectsContainer = document.querySelector('.portfolio_projects_container');

      projectsContainer.addEventListener('click', (e) => {
        const targetContainer = e.target.closest('.portfolio_projects__projects-item');
        console.log(targetContainer);

        if (targetContainer) {
          const textContainer = targetContainer.querySelector(
            '.portfolio_projects__projects_text-container',
          );
          toggleTextAndTitle(textContainer);
        }
      });
    }
  }

  window.addEventListener('resize', handleResize);
  window.addEventListener('load', handleResize);
});
