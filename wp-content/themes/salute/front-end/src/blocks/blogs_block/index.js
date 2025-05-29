import './style.scss';
import 'swiper/swiper.scss';
import './style.scss';
import Swiper from 'swiper';
// import {Pagination} from "swiper/types/modules";
import {Pagination} from 'swiper/modules';

export function blogs_block() {
  const block = document.querySelector('.blogs_block');
  if (!block) return;
  const swiper = new Swiper(block.querySelector('.blogs-swiper'), {
    slidesPerView: 1,
    spaceBetween: 25,

    loop: true,
    breakpoints: {
      768: {
        spaceBetween: 35
      },
      1280: {
        spaceBetween: 45
      },
    },
    modules: [Pagination],
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
}
