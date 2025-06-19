import './bootstrap';

// AlpineJS and plugins
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Zoomable from '@benbjurstrom/alpinejs-zoomable';

// YT Embed
import 'lite-youtube-embed';
import 'lite-youtube-embed/src/lite-yt-embed.css';

import.meta.glob([
    '../images/**',
]);

Alpine.plugin(focus);
Alpine.plugin(Zoomable);
Alpine.start();
