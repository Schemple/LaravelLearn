import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY || 'local',
    wsHost: import.meta.env.VITE_REVERB_HOST || window.location.hostname,
    wsPort: import.meta.env.VITE_REVERB_PORT || 6001,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    // forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    forceTLS: false,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],
});
console.log('Echo instance:', window.Echo);
