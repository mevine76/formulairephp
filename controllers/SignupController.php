<?php

// de base le formulaire est affiché car true
$showForm = true;

// Regex du Nom : seul les petites et grandes lettres ok
$regexName = '/^[a-zA-Z]+$/';

// Regex de l'email
$regexEmail = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';

// Regex du téléphone
$regexPhone = '/^(0|(\+[0-9]{2}[. -]?))[1-9]([. -]?[0-9][0-9]){4}$/';

// Création d'une tableau d'erreurs
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Vérification de l'input lastname
    if (isset($_POST['lastname'])) {
        $lastname = $_POST['lastname'];

        // verification si c vide
        if (empty($lastname)) {
            $errors['lastname'] = 'Champs obligatoire';
            // verification du format
        } else if (!preg_match($regexName, $lastname)) {
            $errors['lastname'] = 'Mauvais format';
        }
    }
    // Vérification de l'input firstname
    if (isset($_POST['firstname'])) {
        $firstname = $_POST['firstname'];

        // verification si c vide
        if (empty($firstname)) {
            $errors['firstname'] = 'Champs obligatoire';
            // verification du format
        } else if (!preg_match($regexName, $firstname)) {
            $errors['firstname'] = 'Mauvais format';
        }
    }
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

    // Vérification de l'input téléphone
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];

        // verification si c vide
        if (empty($phone)) {
            $errors['phone'] = 'Champs obligatoire';
            // verification du format
        } else if (!preg_match($regexPhone, $phone)) {
            $errors['phone'] = 'Mauvais format';
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
    // Vérification de l'input confirmPassword
    if (isset($_POST['confirmPassword'])) {
        $confirmPassword = $_POST['confirmPassword'];

        // verification si c vide
        if (empty($confirmPassword)) {
            $errors['confirmPassword'] = 'Champs obligatoire';
            // verification du format
        } else if ($confirmPassword != $_POST['password']) {
            $errors['confirmPassword'] = 'Les mots de passe ne correspondent pas';
        }
    }
    
}

include '../views/signup.php';
