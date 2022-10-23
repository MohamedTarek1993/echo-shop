//loader
let loader = document.getElementById('preloader');
window.addEventListener('load', function () {
  loader.style.display = 'none';
});
//loader

//  scroll-up 
var btn = $('#button');
var navbar = $('#navbar')
var lang = $('.navbar  .dropdown');
$(window).scroll(function () {
  if ($(window).scrollTop() > 490) {
    btn.addClass('show');
    navbar.addClass('change');
    lang.css('display', 'none');

  } else {
    btn.removeClass('show');
    navbar.removeClass('change');
    lang.css('display', 'block');
  }
});
btn.on('click', function (e) {
  e.preventDefault();
  $('html, body').animate({ scrollTop: 0 }, '300');
});
//    scroll-up 
// animated hamburger icon
$(document).ready($(function () {
  let navBtn = $('.navbar-toggler');
  $(navBtn).click(function () {
    $(navBtn).toggleClass('active-hamburger');
  });
}));
// animated hamburger icon


//  swiper in stikey header 
var swiper = new Swiper(".mySwiper", {
  spaceBetween: 50,
  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
});


// client slider 
// var swiper1 = new Swiper(".mySwiper-1", {
//   slidesPerView: 5,
//   spaceBetween: 10,
//   loop: true,
//   autoplay: {
//     delay: 2500,
//     disableOnInteraction: false,
//   },
//   breakpoints: {
//     640: {
//       slidesPerView: 2,
//       spaceBetween: 20,
//     },
//     768: {
//       slidesPerView: 3,
//       spaceBetween: 40,
//     },
//     1024: {
//       slidesPerView: 5,
//       spaceBetween: 50,
//     },
//   },
// });
//  client slider

//  testiomnies slider 
// var swiper2 = new Swiper(".mySwiper", {
//   slidesPerView: 3,
//   spaceBetween: 10,
//   loop: true,
//   autoplay: {
//     delay: 2500,
//     disableOnInteraction: false,
//   },
//   pagination: {
//     el: ".swiper-pagination",
//     dynamicBullets: true,
//   },
//   breakpoints: {
//     640: {
//       slidesPerView: 1,
//       spaceBetween: 20,
//     },
//     768: {
//       slidesPerView: 2,
//       spaceBetween: 40,
//     },
//     1024: {
//       slidesPerView: 3,
//       spaceBetween: 50,
//     },
//   },
// });
// testiomnies slider 

//  version slider 
// var swiper = new Swiper(".mySwiper-2", {
//   navigation: {
//     nextEl: ".swiper-button-next",
//     prevEl: ".swiper-button-prev",
//   },
//   loop: true,
//   autoplay: {
//     delay: 2500,
//     disableOnInteraction: false,
//   },
// });
//  version slider 

//animation about us section
// const hero = document.getElementById('about');
// window.addEventListener('scroll', checkBoxes);
// function checkBoxes() {
//   const triggerBottom = window.innerHeight / 5 * 4;
//   const boxTop = hero.getBoundingClientRect().top;
//   const boxBottom = hero.getBoundingClientRect().bottom;
//   if (boxTop < triggerBottom) {
//     hero.classList.add('animate_about');
//   } if (boxBottom < triggerBottom || boxTop > triggerBottom) {
//     hero.classList.remove('animate_about');
//   }


// }


//animation sponser section
// const client = document.getElementById('client');
// window.addEventListener('scroll', checkClient);
// function checkClient() {
//   const triggerBottom = window.innerHeight / 5 * 4;
//   const boxTop = client.getBoundingClientRect().top;
//   const boxBottom = client.getBoundingClientRect().bottom;
//   if (boxTop < triggerBottom) {
//     client.classList.add('animate_client');
//   } if (boxBottom < triggerBottom || boxTop > triggerBottom) {
//     client.classList.remove('animate_client');
//   }

// }


//animation feature section
// const feature = document.getElementById('feature');
// window.addEventListener('scroll', checkFeature);
// function checkFeature() {
//   const triggerBottom = window.innerHeight / 6 * 4;
//   const boxTop = feature.getBoundingClientRect().top;
//   const boxBottom = feature.getBoundingClientRect().bottom;
//   if (boxTop < triggerBottom) {
//     feature.classList.add('animate_feature');
//   } if (boxBottom < triggerBottom || boxTop > triggerBottom) {
//     feature.classList.remove('animate_feature');
//   }

// }


//service service section
// const service = document.querySelectorAll('.service');
// window.addEventListener('scroll', checkService);

// function checkService() {
//   const triggerBottom = window.innerHeight / 6 * 4;
//   service.forEach(ele => {
//     const boxTop = ele.getBoundingClientRect().top;
//     // const boxBottom = ele.getBoundingClientRect().bottom;
//     if (boxTop < triggerBottom) {
//       ele.classList.add('animate_service');
//     } else {
//       ele.classList.remove('animate_service');
//     }
//   });


// }


//animation app section
// const app = document.getElementById('app');
// window.addEventListener('scroll', checkApp);
// function checkApp() {
//   const triggerBottom = window.innerHeight / 6 * 4;
//   const boxTop = app.getBoundingClientRect().top;
//   const boxBottom = app.getBoundingClientRect().bottom;
//   if (boxTop < triggerBottom) {
//     app.classList.add('animate_app');
//   } if (boxBottom < triggerBottom || boxTop > triggerBottom) {
//     app.classList.remove('animate_app');
//   }

// }


$(".search-toggle").on("click", function () {
  $(".search__area").addClass("opened");
});
$(".search-close-btn").on("click", function () {
  $(".search__area").removeClass("opened");
});