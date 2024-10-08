<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InfoPersoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Employee extends BaseController
{
    public function index() : string
    {
        $model = new InfoPersoModel();
        $data['employees'] = $model->getAll();
        return view('employee/index', $data);
    }
}
