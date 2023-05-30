<?php


//  archivo de rutas...
return [
    ['GET', '/', ['MainController', 'index'],'inicio'],
    ['GET', '/canales', ['SocialMedia\CanalesController', 'index'],'canales'],
    ['GET', '/canales/conectar', ['SocialMedia\CanalesController', 'conectarIndex']],




    ['*', '/auth', ['AuthUserController', 'index']],

    ['POST','/files/uploads',['FileUploaderController','index']],
    [
        'GROUP', '/twitter', [
            ['GET', '/token', ['SocialMedia\Auth\TwitterTokenController', 'index']],
            ['GET', '/callback', ['SocialMedia\Auth\TwitterTokenController', 'callback']],
            ['POST', '/post_twiiter', ['SocialMedia\Auth\TwitterTokenController', 'post_twiiter']],
            ['GET', '/get_data_user_twtter', ['SocialMedia\Auth\TwitterTokenController', 'get_data_user_twtter']],
        ]


    ],
    ['*', '/user', ['AuthUserController', 'getUser']],
    [
        'GROUP', '/user', [
            ['POST', '/create', ['AuthUserController', 'create']],
            ['POST', '/update', ['AuthUserController', 'update']],
         

        ]
    ],
    [
        'GROUP', '/images', [
            ['POST', '/upload', ['FileUploaderController', 'index']],
            ['POST', '/delete', ['FileUploaderController', 'eliminar']],

        ]
    ],
    [
        'GROUP', '/social_media', [
            ['POST', '/post', ['SocialMediaPostController', 'index']],


        ]
    ]
];
