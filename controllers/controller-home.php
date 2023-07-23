<?php

require_once '../config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Management System</title>
    <!-- Inclure les liens vers Bootstrap CSS ici -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="text-center mb-4">Expense Management System</h1>
                <div class="text-center">
                    <a href="AdministratorController.php" class="btn btn-custom-color btn-lg mr-3">Connexion Administrateur</a>
                    <a href="EmployeeController.php" class="btn btn-custom-color1 btn-lg">Connexion Employé</a>
                </div>
            </div>
        </div>
    </div