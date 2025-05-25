import './style.scss';
import Swiper from 'swiper';
import 'swiper/swiper.scss';
import 'swiper/modules/navigation.scss';
import {Navigation} from 'swiper/modules';

export function testimonials_block() {
  const block = document.querySelector('.testimonials_block');
  const swiper = new Swiper(block.querySelector('.testimonials-swiper'), {
    slidesPerView: 'auto',
    spaceBetween: 16,
    loop: true,
    modules: [Navigation],
    breakpoints: {
      600: {
        spaceBetween: 16,
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 20,
      },

    },
    navigation: {
      nextEl: block.querySelector(".swiper-button-next"),
      prevEl: block.querySelector(".swiper-button-prev"),
    },
  });


  if (!block) return;
}
