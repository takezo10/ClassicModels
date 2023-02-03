<?php

namespace App\Models;

use Libraries\Connection;

class OrderModel
{
    /**
     * Renvoie la liste de tous les clients
     * 
     * @return array
     */
    public function getAll(): array
    {
        // Connexion à la base de données
        $connection = new Connection();
        $db = $connection->getPdo();
        
        // Récupération des clients
        $query = $db->prepare(
            "SELECT ord.orderNumber, ord.orderDate, ord.status, ord.customerNumber, customers.customerName as customerName
            FROM `orders` as ord 
            INNER JOIN customers ON customers.customerNumber = ord.customerNumber 
            ORDER BY `orderDate`"
        );
        
        $query->execute();
        
        return $query->fetchAll();
    }
}