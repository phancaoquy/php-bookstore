// Import our custom CSS
import '../scss/styles.scss'
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';
var windowWidth = window.innerWidth;
var swiper = new Swiper('.swiper', {
  slidesPerView: window.innerWidth <= 760 ? 1 : 5,
  direction: getDirection(),
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  on: {
    resize: function () {
      swiper.changeDirection(getDirection());
    },
  },
});

function getDirection() {
  var windowWidth = window.innerWidth;
  var direction = 'horizontal';

  return direction;
}

const progressCircle = document.querySelector(".autoplay-progress svg");
const progressContent = document.querySelector(".autoplay-progress span");
var swiper = new Swiper(".mySwiper", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  on: {
    autoplayTimeLeft(s, time, progress) {
      progressCircle.style.setProperty("--progress", 1 - progress);
      progressContent.textContent = `${Math.ceil(time / 1000)}s`;
    }
  }
});

// Rating
function calcRate(r) {
  const f = ~~r,//Tương tự Math.floor(r)
    id = 'star' + f + (r % f ? 'half' : '')
  id && (document.getElementById(id).checked = !0)
}