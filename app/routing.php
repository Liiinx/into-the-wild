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

$routes = [

    'User' => [ // Route côté client
        ['confirmUser', '/confirmation/{token:\d+}', ['GET']],
        ['homeShowListArticles', '/', 'GET'],
        ['dashboard', '/dashboard', 'GET'],
        ['editDashboard', '/dashboard/edit', ['GET', 'POST']],
        ['showListArticles', '/articles', 'GET'],
        ['showArticleUser', '/article/{id:\d+}', ['GET', 'POST']],
        ['login', '/connexion', ['GET', 'POST']],
        ['inscription', '/inscription', ['GET', 'POST']],
        ['deleteComment', '/comment/delete/{id:\d+}', 'GET'], // action, url, method
        ['disconnect', '/deconnexion', ['GET', 'POST']],
        ['page', '/page/{page:\d+}', ['GET']],
        ['showCategory', '/category/{id:\d+}', 'GET'], // action, url, method

    ],

    'Admin' => [ // Route concernant l'administration.
      ['index', '/admin/', 'GET'], // Route qui affiche la page d'accueil
      ['adminShowArticles', '/admin/articles', 'GET'], // action, url, method
      ['adminShowUsers', '/admin/users', 'GET'], // action, url, method
      ['add', '/admin/article/add', ['GET', 'POST']], // action, url, method
      ['addCategory', '/admin/category/add', ['GET', 'POST']], // action, url, method
      ['show', '/admin/article/{id:\d+}', 'GET'], // action, url, method
      ['showCategory', '/admin/category/{id:\d+}', 'GET'], // action, url, method
      ['edit', '/admin/article/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
      ['editCategory', '/admin/category/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
      ['deleteArticle', '/admin/article/delete/{id:\d+}', 'GET'], // action, url, method
      ['deleteCategory', '/admin/category/delete/{id:\d+}', 'GET'], // action, url, method
      ['showComments', '/admin/comment', 'GET'], // action, url, method
      ['showCategories', '/admin/categories', 'GET'], // action, url, method
      ['deleteComment', '/admin/comment/delete/{id:\d+}', 'GET'], // action, url, method
      ['deleteUser', '/admin/user/delete/{page:\d+}', 'GET'], // action, url, method
    ],

    'Portfolio' => [ //Route concernant les portfolios
        ['groupe1', '/portfolio/groupe1', 'GET'], // Route qui affiche le portfolio du groupe1
        ['groupe2', '/portfolio/groupe2', 'GET'], // Route qui affiche le portfolio du groupe1
        ['groupe3', '/portfolio/groupe3', 'GET'], // Route qui affiche le portfolio du groupe1
        ['groupe4', '/portfolio/groupe4', 'GET'], // Route qui affiche le portfolio du groupe1
    ]
];
