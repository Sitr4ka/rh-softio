<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Employee extends BaseController
{
    public function index() : string
    {
        return view('employee/index');
    }
}
