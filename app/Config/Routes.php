<?php

use App\Controllers\Employee;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// CREATE
$routes->post('employee/add', [Employee::class, 'add']);

// READ
$routes->get('employee/index', [Employee::class, 'index']);

// UPDATE
$routes->put('employee/update/(:num)', [Employee::class, 'update']);

// DELETE
$routes->get('employee/delete/(:num)', [Employee::class, 'delete']);