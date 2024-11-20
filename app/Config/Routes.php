<?php

use App\Controllers\Auth;
use App\Controllers\InfoPerso;
use App\Controllers\InfoPro;
use App\Controllers\Scoring;
use App\Controllers\Payment;

use App\Controllers\EmployeController;
use App\Controllers\ContratController;
use App\Controllers\DepartmentController;
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

// EMPLOYE ROUTES
$routes->get('employee', [EmployeController::class, 'index']);
$routes->post('employee/add', [EmployeController::class, 'add']);
$routes->get('employee/delete/(:num)', [EmployeController::class, 'delete']);
$routes->put('employee/update/(:num)', [EmployeController::class, 'update']);

//temp
$routes->get('employee/getname', [EmployeController::class, 'getEmployeeName']);

// CONTRAT ROUTES
$routes->get('employee/contrat', [ContratController::class, 'index']);
$routes->post('employee/contrat/add', [ContratController::class, 'newContrat']);
$routes->put('employee/contrat/update/(:num)', [ContratController::class, 'updateContrat']);
$routes->get('employee/contrat/delete/(:num)', [ContratController::class, 'deleteContrat']);


// DEPARTMENT ROUTES
$routes->get('department', [DepartmentController::class, 'index']);
$routes->post('department/add', [DepartmentController::class, 'addDepartment']);
$routes->put('department/update/(:num)', [DepartmentController::class, 'updateDepartment']);
$routes->get('department/delete/(:num)', [DepartmentController::class, 'deleteDepartment']);

$routes->post('department/positionHeld/add', [DepartmentController::class, 'addPositionHeld']);
$routes->put('department/postionHeld/update/(:num)', [DepartmentController::class, 'updatePostionHeld']);
$routes->get('department/positionHeld/delete/(:num)', [DepartmentController::class, 'deletePositionHeld']);

//Payment
$routes->get('home/payment', [Payment::class, 'index']);

//Scoring
$routes->get('home/scoring', [Scoring::class, 'index']);


