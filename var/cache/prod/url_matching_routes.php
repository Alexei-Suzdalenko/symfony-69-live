<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/delete_user' => [[['_route' => 'delete_user', '_controller' => 'App\\Controller\\DeleteUserController::index'], null, null, null, false, false, null]],
        '/ok' => [[['_route' => 'ok', '_controller' => 'App\\Controller\\DeleteUserController::index_ok'], null, null, null, false, false, null]],
        '/girls' => [[['_route' => 'girls', '_controller' => 'App\\Controller\\MainController::girls'], null, null, null, false, false, null]],
        '/registaracion' => [[['_route' => 'registaracion', '_controller' => 'App\\Controller\\MainController::registaracion'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\MainController::index'], null, null, null, false, false, null]],
        '/hombre-escort' => [[['_route' => 'hombre_escort', '_controller' => 'App\\Controller\\MainController::hombreescort'], null, null, null, false, false, null]],
        '/data dfgh' => [[['_route' => 'data', '_controller' => 'App\\Controller\\MainController::putdata'], null, null, null, false, false, null]],
        '/ajustes' => [[['_route' => 'ajustes', '_controller' => 'App\\Controller\\MainController::ajustes'], null, null, null, true, false, null]],
        '/fotos' => [[['_route' => 'fotos', '_controller' => 'App\\Controller\\MainController::ajustes_foto'], null, null, null, false, false, null]],
        '/aviso-legal' => [[['_route' => 'avisolegal', '_controller' => 'App\\Controller\\MainController::avisolegal'], null, ['GET' => 0], null, false, false, null]],
        '/politica-privacidad' => [[['_route' => 'polpri', '_controller' => 'App\\Controller\\MainController::polprivacidad'], null, ['GET' => 0], null, false, false, null]],
        '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/email' => [[['_route' => 'sent_mail', '_controller' => 'App\\Controller\\SentMailController::index'], null, null, null, false, false, null]],
        '/s' => [[['_route' => 'sitemap_site', '_controller' => 'App\\Controller\\SitemapSiteController::index'], null, null, null, false, false, null]],
        '/test' => [[['_route' => 'test', '_controller' => 'App\\Controller\\TestController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/delete_foto/([^/]++)(*:28)'
                .'|/escort/([^/]++)/([^/]++)/([^/]++)(*:69)'
                .'|/([^/]++)/escort(?'
                    .'|(*:95)'
                    .'|/([^/]++)(*:111)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        28 => [[['_route' => 'delete_foto', '_controller' => 'App\\Controller\\DeleteUserController::delete'], ['id'], ['GET' => 0], null, false, true, null]],
        69 => [[['_route' => 'show_only_user', '_controller' => 'App\\Controller\\MainController::showOneUser'], ['province', 'town', 'user_slug'], null, null, false, true, null]],
        95 => [[['_route' => 'ussprov', '_controller' => 'App\\Controller\\MainController::showUsersByProvince'], ['province'], null, null, false, false, null]],
        111 => [
            [['_route' => 'town_escort', '_controller' => 'App\\Controller\\MainController::userInTown'], ['slugtown', 'town'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
