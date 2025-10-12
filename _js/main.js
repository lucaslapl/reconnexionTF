

$(document).ready(function() {

/**** SMOOTH SCROLL ****/


  const navHeight = $('nav').outerHeight();

  $('.nav-links a[href^="#"]').on('click', function (e) {
    const target = $(this.getAttribute('href'));
    if (target.length) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: target.offset().top - navHeight
      }, 600);
    }
  }); 


/******* SERVER FEATURES SLIDE *******/

function toggleService(serviceId, featId) {
  $(`#${serviceId}`).click(function() {
    // Si la section est déjà ouverte, on la ferme
    if ($(`#${featId}`).is(":visible")) {
      $(`#${featId}`).slideUp("slow");
      $(this).find('.fa-chevron-right').animate({ rotate: '0deg' }, 300);
    } else {
      // Ferme toutes les autres sections ouvertes
      $(".feat").slideUp("slow");
      $(".fa-chevron-right").animate({ rotate: '0deg' }, 300);
      
      // Ouvre la section actuelle
      $(`#${featId}`).slideDown("slow");
      $(this).find('.fa-chevron-right').animate({ rotate: '90deg' }, 300);
    }
  });

  $(document).click(function(event) {
    // Si le clic est en dehors de #serviceId et #featId, on ferme la section
    if (!$(event.target).closest(`#${serviceId}`).length && !$(event.target).closest(`#${featId}`).length) {
      $(`#${featId}`).slideUp("slow");
      $(`#${serviceId}`).find('.fa-chevron-right').animate({ rotate: '0deg' }, 300);
    }
  });
}

// Applique la fonction pour chaque service
toggleService("holiday-srv", "holiday-feat");
toggleService("holiday-srv2", "holiday-feat2");
toggleService("vanilla-srv", "vanilla-feat");
toggleService("custom-srv", "custom-feat");
toggleService("mvm-srv", "mvm-feat");
toggleService("tfdb-srv", "tfdb-feat");

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