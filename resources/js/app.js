import './bootstrap';
import Alpine from 'alpinejs'

import mask from '@alpinejs/mask';
import Intersect from '@alpinejs/intersect';
import '@tailwindplus/elements';

window.Alpine = Alpine;
Alpine.plugin(Intersect);
Alpine.plugin(mask);

Alpine.start();
