import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Script Logic Scroll Payment di Profile Page
const paymentWrapper = document.getElementById('payment-wrapper');

let isDown = false;
let startX;
let scrollLeft;

paymentWrapper.addEventListener('mousedown', (e) => {
    isDown = true;
    paymentWrapper.classList.add('active');
    startX = e.pageX - paymentWrapper.offsetLeft;
    scrollLeft = paymentWrapper.scrollLeft;
});

paymentWrapper.addEventListener('mouseleave', () => {
    isDown = false;
    paymentWrapper.classList.remove('active');
});

paymentWrapper.addEventListener('mouseup', () => {
    isDown = false;
    paymentWrapper.classList.remove('active');
});

paymentWrapper.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - paymentWrapper.offsetLeft;
    const walk = (x - startX) * 3; // scroll-fast
    paymentWrapper.scrollLeft = scrollLeft - walk;
});
