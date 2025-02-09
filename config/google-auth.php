<?php

return [
    // Number of seconds a OTP is valid for
    'window' => 1,
    
    // Length of the generated secret key
    'secret_length' => 32,
    
    // Name of your app to be displayed in Google Authenticator
    'app_name' => env('APP_NAME', 'GOOGLE AUTH'),
    
    // QR code size
    'qr_size' => 200,
]; 