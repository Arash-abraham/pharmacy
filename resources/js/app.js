import './bootstrap';
import Swiper from 'swiper';
import 'swiper/css';

import Alpine from 'alpinejs';

document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.swiper', {
        loop: true,
        autoplay: { delay: 3000 },
        pagination: { el: '.swiper-pagination' },
    });
});

window.Alpine = Alpine;

Alpine.start();
