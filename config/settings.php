<?php
return [
    // ---------------------------
    // Paramètres de l'application
    // ---------------------------
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Monolog settings
        'logger' => [
            'name' => 'soap_server',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],

    // ---------------------------
    // Erreurs
    // ---------------------------
    'notFoundHandler' => function ($container) {
        return function ($request, $response) use ($container) {
            return $container['response']
                ->withStatus(404)
                ->withHeader('Content-Type', 'text/html')
                ->write('Page not found');
        };
    },

    'notAllowedHandler' => function ($container) {
        return function ($request, $response) use ($container) {
            return $container['response']
                ->withStatus(405)
                ->withHeader('Content-Type', 'text/html')
                ->write('Method not allowed');
        };
    },

    // ---------------------------
    // Constantes
    // ---------------------------
    'WEBSERVICE_URL' => 'http://elcomercio.test',
    'BASE_DIR' => __DIR__.'/..'
];
