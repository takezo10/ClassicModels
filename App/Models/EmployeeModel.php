<?php

namespace App\Models;

use Libraries\Connection;

class EmployeeModel
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
            'SELECT emp.employeeNumber, emp.lastName, emp.firstName, emp.email, emp.jobTitle, off.city, man.firstName AS managerFirstName, man.lastName AS managerLastName
            FROM employees emp
            INNER JOIN offices off ON emp.officeCode = off.officeCode
            LEFT JOIN employees man ON emp.reportsTo = man.employeeNumber
            ORDER BY emp.firstName'
        );
        
        $query->execute();
        
        return $query->fetchAll();
    }
    
    function getById(): array|false
    {
        $connection = new Connection();
        $db = $connection->getPdo();
    
        // Récupération des informations de l'employé à partir du numéro dans l'url (requête SQL)
        $query = $db->prepare(
            'SELECT emp.employeeNumber, emp.extension, emp.lastName, emp.firstName, emp.email, emp.jobTitle, off.city, man.firstName AS managerFirstName, man.lastName AS managerLastName
            FROM employees emp
            INNER JOIN offices off ON emp.officeCode = off.officeCode
            LEFT JOIN employees man ON emp.reportsTo = man.employeeNumber
            WHERE emp.employeeNumber = :employeeNumber'
        );
        
        $query->execute([
            'employeeNumber' => $id
        ]);
        
        $employee = $query->fetch();
        
        return $employee;
        }
    }