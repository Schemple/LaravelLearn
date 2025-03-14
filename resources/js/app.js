import './bootstrap';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true
});

window.Echo.private('notifications')
    .listen('NewDataCreated', (e) => {
        console.log('Thông báo mới:', e.message);
        console.log('Dữ liệu:', e.data);
    });
