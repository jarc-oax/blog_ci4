<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Posts;
use App\Controllers\Auth\LoginController;
use App\Filters\AuthGuard;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Posts::index', ['filter' => AuthGuard::class]);
$routes->get('posts/new', [Posts::class, 'new'], ['filter' => AuthGuard::class]);
$routes->get('posts/(:segment)', [Posts::class, 'show'], ['filter' => AuthGuard::class]);
$routes->get('posts/edit/(:num)', [Posts::class, 'edit/$1'], ['filter' => AuthGuard::class]);
$routes->post('posts/update', [Posts::class, 'update'], ['filter' => AuthGuard::class]);
$routes->post('posts/delete/(:num)', [Posts::class, 'delete/$1'], ['filter' => AuthGuard::class]);
$routes->post('posts/', 'Posts::create', ['filter' => AuthGuard::class]);
$routes->get('login/', [LoginController::class, 'showLoginForm']);
$routes->get('logout/', [LoginController::class, 'logout']);
$routes->post('login/', [LoginController::class, 'login']);
