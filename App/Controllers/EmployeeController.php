<?php

namespace App\Controllers;

use Libraries\Controller;
use App\Models\EmployeeModel;

class EmployeeController extends Controller
{
    public function showList(): void
    {
        // Récupération de la liste des clients
        $model = new EmployeeModel();
        $employees = $model->getAll();
        
        $this->render('employee.phtml', [
            'employees' => $employees
        ]);
    }
    
    public function showDetail(): void
    {
        if (! isset($_GET['id'])) {
            $this->redirect('home');
        }
        $model = new EmployeeModel();
        $employees = $model->getById();
        
        $this->render('employee.phtml', [
            'employees' => $employees
        ]
        );
        // Demande au modèle qui gère les clients les informations n°id
        // Affichage du détail du client correspondant
        var_dump($employees);
    }
    
}
