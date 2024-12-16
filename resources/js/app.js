import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Assign Pusher to the global window object
window.Pusher = Pusher;

// Create a new Echo instance
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'baaca3534555b06a700d',  // Replace with your actual Pusher key
    cluster: 'mt1',  // Replace with your actual cluster
    forceTLS: true,
});
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
