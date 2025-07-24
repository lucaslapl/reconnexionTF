

$(document).ready(function() {

/**** SMOOTH SCROLL ****/


  const navHeight = $('nav').outerHeight(); // Hauteur de ta barre de navigation

  // Scroll fluide avec décalage
  $('.nav-links a[href^="#"]').on('click', function (e) {
    const target = $(this.getAttribute('href'));
    if (target.length) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: target.offset().top - navHeight
      }, 600);
    }
  });

});



/**** SM NAV TOGGLE *****/

    const toggle = document.querySelector('.nav-toggle');
    const navLinks = document.querySelector('.nav-links');

    toggle.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });


    document.addEventListener('click', (e) => {
        const isClickInsideMenu = navLinks.contains(e.target);
        const isClickOnToggle = toggle.contains(e.target);

        if (!isClickInsideMenu && !isClickOnToggle) {
            navLinks.classList.remove('active');
        }
    });