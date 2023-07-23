<?php

// de base le formulaire est affiché car true
$showForm = true;

// Regex du Nom : seul les petites et grandes lettres ok
$regexName = '/^[a-zA-Z]+$/';

// Regex de l'email
$regexEmail = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';


// Création d'une tableau d'erreurs
$errors = [];

class LoginController {
    // Méthode pour afficher le formulaire de connexion pour l'employé
    public function showLoginForm() {
        global $showForm, $errors;
        // Affichez le code HTML pour le formulaire de connexion ici
        $html = '
        <div class="row justify-content-center">
        <!-- si showForm = true, on affiche le formulaire -->
        if ($showForm) {
            <div class="col-lg-4 bg-light shadow m-5 p-5 border">
                <p class="h2 mb-5 text-center">Bonjour ! Veuillez vous identifier</p>
                <form action="" method="POST" novalidate>
                    <div class="mb-3">
                    <label for="email" class="form-label">Courriel : </label>
                    <!-- rendre innofensive le résultat la valeur a l\'aide de htmlspecialchars -->
                    <input class="form-control" id="email" name="email" type="email" placeholder="Adresse email" value="<?= htmlspecialchars($_POST[\'email\'] ?? \'\') ?>" required>
                    <!-- ici message d\'erreur -->
                    <span class="ms-2 text-danger fs-6"><?= $errors[\'email\'] ?? \'\' ?></span>
                    <div >
                    <label for="password" class="form-label">Mot de passe : </label>
                    <!-- rendre innofensive le résultat la valeur a l\'aide de htmlspecialchars -->
                    <input class="form-control" id="password" name="password" type="password" placeholder="Mot de passe" value="<?= htmlspecialchars($_POST[\'password\'] ?? \'\') ?>" required>
                    <!-- ici message d\'erreur -->
                    <span class="ms-2 text-danger fs-6"><?= $errors[\'password\'] ?? \'\' ?></span>
                    </div>
                    <div>
                    <button class="d-block mt-3 mx-auto btn btn-secondary">Valider</button>
                    <a href="../controllers/controller-signup.php" class="link-primary mt-2">s\'inscrire</a>
                    </div>
                    <div class="text-center">
                    </div>
                </form>
            </div>
            <!-- sinon on affiche le recap -->
        <?php } else { ?>
            <div class="col-lg-4 bg-light shadow m-5 p-5 border">
                <p class="text-center">RE</p>
                <!-- rendre innofensive le résultat la valeur a l\'aide de htmlspecialchars -->
                <p>Courriel : <?= htmlspecialchars($_POST[\'email\'] ?? \'\') ?></p>
                <p>Mot de passe : <?= htmlspecialchars($_POST[\'password\'] ?? \'\') ?></p>
            </div>
        
    </div>';
    
    require_once '../views/login.php';
    
    return $html;

    }

    public function processLogin() {
        global $errors;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
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

        if (AdministratorModel::authenticateAdministrator($email, $password)) {
            $_SESSION['admin_logged_in'] = true;
            // l'administrateur est authentifié, redirigez-le vers la page d'accueil
            header("Location: index.php?action=dashboard");
            exit;
        } elseif (EmployeeModel::authenticateEmployee($email, $password)) {
            // l'employé est authentifié, redirigez-le vers la page d'accueil
            header("Location: index.php?action=dashboard");
            exit;
        } else {
            // Affichez un message d'erreur si l'authentification a échoué
            echo "Identifiants incorrects.";
        }
           
        }


        

    }

    
        

                

    }

        
    }
    

        
    


    



 