import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
window.ToggleFaq = function(btn) {
    btn.nextElementSibling.classList.toggle('hidden');
}
