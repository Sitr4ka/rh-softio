<?php

use App\Controllers\Employee;
use App\Controllers\InfoPro;
use App\Controllers\Auth;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */


// Personal information CRUD


//AUTHENTIFICATION
$routes->get('auth/login', [Auth::class, 'login']);
$routes->post('auth', [Auth::class, 'auth']);
$routes->get('auth/register', [Auth::class, 'register']);
$routes->post('auth/registration', [Auth::class, 'registration']);

// CREATE
$routes->post('employee/add', [Employee::class, 'add']);

// READ
$routes->get('/', [Employee::class, 'index']);

// UPDATE
$routes->put('employee/update/(:num)', [Employee::class, 'update']);

// DELETE
$routes->get('employee/delete/(:num)', [Employee::class, 'delete']);


// Profesional informations CRUD

//CREATE
$routes->post('employee/infopro/add', [InfoPro::class , 'add']);

// UPDATE
$routes->put('employee/infopro/update/(:segment)', [InfoPro::class, 'update']);

// DELETE
$routes->get('employee/infopro/delete/(:num)',[InfoPro::class, 'delete']);