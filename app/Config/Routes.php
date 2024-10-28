<?php

use App\Controllers\Auth;
use App\Controllers\Employee;
use App\Controllers\InfoPro;
use App\Controllers\Scoring;
use App\Controllers\Configuration;
use App\Controllers\Payment;
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
// Redirige vers auth/login
$routes->get('/', function() {
    return redirect()->to('/auth/login');
});


// CREATE
$routes->post('employee/add', [Employee::class, 'add']);

// READ
$routes->get('home', [Employee::class, 'index']);

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


//Payment

//READ
$routes->get('home/payment', [Payment::class, 'index']);

//Scoring

//READ
$routes->get('home/scoring', [Scoring::class, 'index']);


//config
$routes->get('home/config', [Configuration::class, 'config']);