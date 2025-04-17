import './bootstrap';
import './fixes';

import.meta.glob([
    '../images/**',
]);

window.onload = function() {
    document.querySelector('html').classList.add('loaded');
};
