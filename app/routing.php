<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

/* $routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, method
        ['add', '/item/add', ['GET', 'POST']], // action, url, method
        ['edit', '/item/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
        ['show', '/item/{id:\d+}', 'GET'], // action, url, method
        ['delete', '/item/delete/{id:\d+}', 'GET'], // action, url, method
    ],
]; */

$routes = [

    'User' => [ // Route côté client
        ['homeShowListArticles', '/', 'GET'],
        ['showListArticles', '/articles', 'GET'],
        ['showArticleUser', '/article/{id:\d+}', 'GET'],
        ['login', '/connexion', ['GET', 'POST']],
        ['inscription', '/inscription', ['GET', 'POST']],
        ['disconnect', '/deconnexion', ['GET', 'POST']],
    ],

    'Admin' => [ // Route concernant l'administration.
      ['index', '/admin/', 'GET'], // Route qui affiche la page d'accueil
      ['adminShowArticles', '/admin/articles', 'GET'], // action, url, method
      ['adminShowUsers', '/admin/users', 'GET'], // action, url, method
      ['add', '/admin/article/add', ['GET', 'POST']], // action, url, method
      ['show', '/admin/article/{id:\d+}', 'GET'], // action, url, method
      ['edit', '/admin/article/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
      ['deleteArticle', '/admin/article/delete/{id:\d+}', 'GET'], // action, url, method
    ],
];
