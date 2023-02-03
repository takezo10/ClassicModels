<?php

namespace App\Controllers;

use Libraries\Controller;
use App\Models\OrderModel;

class OrderController extends Controller
{
    public function showList(): void
    {
        // Récupération de la liste des clients
        $model = new OrderModel();
        $orders = $model->getAll();
        
        $this->render('orders.phtml', [
            'orders' => $orders
        ]);
    }
    
    public function showDetail(): void
    {
        if (! isset($_GET['id'])) {
            $this->redirect('home');
        }
        
        // Demande au modèle qui gère les clients les informations n°id
        // Affichage du détail du client correspondant
    }
}