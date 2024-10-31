<?php

use App\Controllers\Auth;
use App\Controllers\InfoPerso;
use App\Controllers\InfoPro;
use App\Controllers\Scoring;
use App\Controllers\Configuration;
use App\Controllers\Payment;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */

//AUTHENTIFICATION
$routes->get('auth/login', [Auth::class, 'login']);
$routes->post('auth', [Auth::class, 'auth']);
$routes->get('auth/register', [Auth::class, 'register']);
$routes->post('auth/registration', [Auth::class, 'registration']);

// Redirecting 
$routes->get('/', function() {
    return redirect()->to('/auth/login');
});

// Personal information
$routes->post('infoPerso/add', [InfoPerso::class, 'add']);
$routes->get('home', [InfoPerso::class, 'index']);
$routes->put('infoPerso/update/(:num)', [InfoPerso::class, 'update']);
$routes->get('infoPerso/delete/(:num)', [InfoPerso::class, 'delete']);


// Profesional informations CRUD
$routes->get('employee/infopro/index', [InfoPro::class, 'index']);
$routes->post('employee/infopro/add', [InfoPro::class , 'add']);
$routes->put('employee/infopro/update/(:segment)', [InfoPro::class, 'update']);
$routes->get('employee/infopro/delete/(:num)',[InfoPro::class, 'delete']);


//Payment
$routes->get('home/payment', [Payment::class, 'index']);

//Scoring
$routes->get('home/scoring', [Scoring::class, 'index']);


//config
$routes->get('home/config/department', [Configuration::class, 'department']);
$routes->get('home/config/positionHeld', [Configuration::class, 'positionHeld']);
$routes->get('home/settings', [Configuration::class, 'index']);