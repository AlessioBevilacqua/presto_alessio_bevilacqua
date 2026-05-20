import 'bootstrap';
import './script';

import Swiper from 'swiper';
import { Navigation, EffectCards } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/effect-cards';

document.addEventListener('DOMContentLoaded', () => {

    // --- GENERAZIONE SLIDE DINAMICHE ---
    let swiperWrapper = document.querySelector('.swiper-wrapper');

    if (typeof reviews !== 'undefined' && swiperWrapper) {
        reviews.forEach((review) => {
            let div = document.createElement('div');
            div.classList.add('swiper-slide', 'd-flex', 'flex-column');
            div.innerHTML =
                `<p class="lead text-center">${review.description}</p>
                <p class="h4 text-center">${review.user}</p>
                <div class="d-flex justify-content-center star"></div>`;
            swiperWrapper.appendChild(div);
        });

        // --- GENERAZIONE STELLE ---
        let stars = document.querySelectorAll('.star');

        stars.forEach((star, index) => {
            for (let i = 1; i <= reviews[index].voto; i++) {
                let icon = document.createElement('i');
                icon.classList.add('fa-solid', 'fa-star');
                star.appendChild(icon);
            }
        });
    }

    // --- INIZIALIZZAZIONE SWIPER ---
    const swiper = new Swiper(".mySwiper", {
        modules: [Navigation, EffectCards],
        effect: "cards",
        grabCursor: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        }
    });

});
