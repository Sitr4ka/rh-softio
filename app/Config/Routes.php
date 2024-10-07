<?php

use App\Controllers\Employee;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/employee/index', [Employee::class, 'index']);