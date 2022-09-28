$(document).ready(function () {
  $('.carousel-feedback').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 8000,
    dots: false,
    arrows: false,
    accessibility: false,
    focusOnSelect: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
  $('.hamburger').click(function () {
    $('.hamburger').toggleClass('hamburger_active');
    $('.menu').toggleClass('menu_active');
    $('body').toggleClass('lock-scroll');
  });
  $('.menu__item').click(function () {
    $('.hamburger').toggleClass('hamburger_active');
    $('.menu').toggleClass('menu_active');
    $('body').toggleClass('lock-scroll');
  });
  $('.booking__form').submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'mailer/booking.php',
      data: $(this).serialize(),
    }).done(function () {
      $(this).find('input').val('');
      $(this).find('select').val('');
      $(this).find('option').val('');
      $('.booking__form').trigger('reset');
      $('.thanks').fadeIn('slow');
      setTimeout(function () {
        $('.thanks').fadeOut('slow');
      }, 2500);
    });
    return false;
  });
  $(window).scroll(function () {
    if ($(this).scrollTop() > 900) {
      $('.pageup').fadeIn();
    } else {
      $('.pageup').fadeOut();
    }
  });
  $('a[href=#top]').click(function () {
    const _href = $(this).attr('href');
    $('html, body').animate({ scrollTop: $(_href).offset().top + 'px' });
    return false;
  });
});
