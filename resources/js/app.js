import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Viewer from 'viewerjs';
import 'viewerjs/dist/viewer.css';

document.addEventListener('DOMContentLoaded', function () {
    const gallery = document.querySelectorAll('.zoomable');

    gallery.forEach((img) => {
        const viewer = new Viewer(img, {
            toolbar: true,
            navbar: false,
            title: false,
            fullscreen: true,
            scalable: true,
            transition: true,
        });
    });
});
