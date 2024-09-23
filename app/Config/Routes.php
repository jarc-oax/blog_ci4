<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Posts::index');
$routes->get('posts/new', 'Posts::new');
$routes->post('posts/', 'Posts::create');
