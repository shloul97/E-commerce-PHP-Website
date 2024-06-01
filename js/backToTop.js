$(document).ready(function() {
    // Check if button should be visible on page load
    checkScroll();

    // Check if button should be visible on scroll
    $(window).on('scroll', checkScroll);

    // Function to show or hide button based on scroll position
    function checkScroll() {
      if ($(window).scrollTop() > 300) {
        $('.back2top').fadeIn();
      } else {
        $('.back2top').fadeOut();
      }
    }

    // Smooth scroll to top on button click
    $('.back2top').on('click', function(event) {
      event.preventDefault();
      $('html, body').animate({scrollTop: 0}, 'slow');
    });
  });