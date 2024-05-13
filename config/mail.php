<?php

return array(
    "driver" => "smtp",
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => "departementInformatique@gmail.com",
        "name" => "Stock"
    ),
    "username" => "80675f26661714",
    "password" => "89d57b0960357f",
    "sendmail" => "/usr/sbin/sendmail -bs",
    "pretend" => false
);

// return [

    

//     'default' => env('MAIL_MAILER', 'smtp'),

//     'driver' => env('MAIL_MAILER', 'smtp'),
//     'host' => env('MAIL_HOST', 'smtp.mailgun.com'),
//     'port' => env('MAIL_PORT', 587),
//     'encryption' => env('MAIL_ENCRYPTION', 'tls'),
//     'username' => env('MAIL_USERNAME'),
//     'password' => env('MAIL_PASSWORD'),
//     'sendmail' => '/usr/sbin/sendmail -bs',

   

//     'mailers' => [
//         'smtp' => [
//             'transport' => 'smtp',
//             'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
//             'port' => env('MAIL_PORT', 587),
//             'encryption' => env('MAIL_ENCRYPTION', 'tls'),
//             'username' => env('MAIL_USERNAME'),
//             'password' => env('MAIL_PASSWORD'),
//             'timeout' => null,
//             'local_domain' => env('MAIL_EHLO_DOMAIN'),
//         ],

//         'ses' => [
//             'transport' => 'ses',
//         ],

//         'mailgun' => [
//             'transport' => 'mailgun',
            
//         ],

//         'postmark' => [
//             'transport' => 'postmark',
            
//         ],

//         'sendmail' => [
//             'transport' => 'sendmail',
//             'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
//         ],

//         'log' => [
//             'transport' => 'log',
//             'channel' => env('MAIL_LOG_CHANNEL'),
//         ],

//         'array' => [
//             'transport' => 'array',
//         ],

//         'failover' => [
//             'transport' => 'failover',
//             'mailers' => [
//                 'smtp',
//                 'log',
//             ],
//         ],
//     ],

    

//     'from' => [
//         'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
//         'name' => env('MAIL_FROM_NAME', 'Example'),
//     ],

    

//     'markdown' => [
//         'theme' => 'default',

//         'paths' => [
//             resource_path('views/vendor/mail'),
//         ],
//     ],

// ];
