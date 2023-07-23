<?php

// de base le formulaire est affiché car true
$showForm = true;

// Regex du Nom : seul les petites et grandes lettres ok
$regexName = '/^[a-zA-Z]+$/';

// Regex de l'email
$regexEmail = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';


// Création d'une tableau d'erreurs
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Vérification de l'input email
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // verification si c vide
        if (empty($email)) {
            $errors['email'] = 'Courriel obligatoire';
            // verification du format email
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Mauvais format de mail';
        }
    }

    // Vérification du select
    // Vérification si l'utilisateur é selectionné une formule

    // Vérification de l'input password
    if (isset($_POST['password'])) {
        $password = $_POST['password'];

        // verification si c vide
        if (empty($password)) {
            $errors['password'] = 'Champs obligatoire';
            // verification du format
        } else if (strlen($password) < 8) {
            $errors['password'] = 'Doit contenir au moins 8 caractères';
        }
    }
    
}

require_once '../views/login.php'; 