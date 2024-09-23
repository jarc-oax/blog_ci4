<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Posts;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Posts::index');
$routes->get('posts/(:segment)', [Posts::class, 'show']); // Add this line
$routes->get('posts/new', 'Posts::new');
$routes->get('posts/edit/(:num)', [Posts::class, 'edit/$1']);
$routes->post('posts/update', [Posts::class, 'update']);
$routes->post('posts/delete/(:num)', [Posts::class, 'delete/$1']);
$routes->post('posts/', 'Posts::create');
