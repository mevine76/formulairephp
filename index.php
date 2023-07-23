<?php
header("Location: controllers/controller-home.php");
exit;
 //Démarage de session
session_start();

// Vérifiez si l'administrateur est connecté
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Si l'administrateur n'est pas connecté, redirigez-le vers la page de connexion ou affichez un message d'erreur
    header("Location: login.php");
    exit;
}

// Le reste du code de votre application pour afficher la page principale de l'administrateur
// ...

