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
    'Article' => [ // Controller
        // ['index', '/', 'GET'], // action, url, method
        ['add', '/admin/article/add', ['GET', 'POST']], // action, url, method
        ['edit', '/admin/article/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
        ['show', '/admin/article/{id:\d+}', 'GET'], // action, url, method
        ['deleteArticle', '/admin/article/delete/{id:\d+}', 'GET'], // action, url, method
        ['adminShowArticles', '/admin/articles', 'GET'], // action, url, method
        ['showListArticles', '/articles', 'GET'], // action, url, method

        ['homeShowListArticles', '/', 'GET'], // home page

        ['showArticleUser', '/article/{id:\d+}', 'GET']
    ],

];
