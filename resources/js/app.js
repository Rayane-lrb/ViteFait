import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
window.ToggleFaq = function(element) {
    element.parentElement.classList.toggle('border-orange-500');

    element.nextElementSibling.classList.toggle('hidden');

    const icon = element.querySelector('img');
    icon.classList.toggle('rotate-44');
}
