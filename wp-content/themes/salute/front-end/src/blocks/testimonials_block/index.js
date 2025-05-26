import './style.scss';
import 'swiper/swiper.scss';
import './style.scss';
import Swiper from 'swiper';

export function testimonials_block() {
  const block = document.querySelector('.testimonials_block');
  if (!block) return;
  const swiper = new Swiper(block.querySelector('.testimonials-swiper'), {
    slidesPerView: 1.1,
    spaceBetween: 16,
    loop: true,
    breakpoints: {
      600: {
        spaceBetween: 25,
        slidesPerView: 1.5,
      },
      992: {
        spaceBetween: 25,
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
      1440: {
        slidesPerView: 3.36,
        spaceBetween: 41,
      },
    },
  });
}
