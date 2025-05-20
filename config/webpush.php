<?php

return [
    'vapid' => [
        'subject' => env('VAPID_SUBJECT', 'mailto:seu-email@exemplo.com'),
        'public_key' => env('VAPID_PUBLIC_KEY', ''),
        'private_key' => env('VAPID_PRIVATE_KEY', ''),
    ],
]; 