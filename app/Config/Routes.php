<?php

use App\Controllers\Employee;
use App\Controllers\InfoPro;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// Personal information CRUD

// CREATE
$routes->post('employee/add', [Employee::class, 'add']);

// READ
$routes->get('employee/index', [Employee::class, 'index']);

// UPDATE
$routes->put('employee/update/(:num)', [Employee::class, 'update']);

// DELETE
$routes->get('employee/delete/(:num)', [Employee::class, 'delete']);


// Profesional informations CRUD

//CREATE
$routes->post('employee/infopro/add', [InfoPro::class , 'add']);

// UPDATE
$routes->put('employee/infopro/update/(:segment)', [InfoPro::class, 'update']);