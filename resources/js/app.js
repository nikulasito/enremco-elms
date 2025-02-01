import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const membershipMenu = document.getElementById('membershipMenu');
    const membershipArrow = document.getElementById('membershipArrow');

    membershipMenu.addEventListener('show.bs.collapse', function () {
        membershipArrow.classList.remove('bi-chevron-down');
        membershipArrow.classList.add('bi-chevron-up');
    });

    membershipMenu.addEventListener('hide.bs.collapse', function () {
        membershipArrow.classList.remove('bi-chevron-up');
        membershipArrow.classList.add('bi-chevron-down');
    });
});