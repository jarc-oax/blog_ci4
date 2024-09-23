<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Posts;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Posts::index');
$routes->get('posts/(:segment)', [Posts::class, 'show']); // Add this line
$routes->get('posts/new', 'Posts::new');
$routes->post('posts/', 'Posts::create');
