<?php
include_once '../models/EmployeeModel.php';
include_once '../views/login_employee.php';

class EmployeeController {
    // Méthode pour afficher le formulaire de connexion pour l'employé
    public function showLoginForm() {
        // Affichez le code HTML pour le formulaire de connexion ici
        $html = '
        <div class="row justify-content-center">
        <!-- si showForm = true, on affiche le formulaire -->
        <?php if ($showForm) { ?>
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
        <?php } ?>
    </div>';  
    return $html;

    }

    // Méthode pour traiter le formulaire de connexion pour l'employé
    public function processLogin() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (EmployeeModel::authenticateEmployee($email, $password)) {
            // l'employé est authentifié, redirigez-le vers la page d'accueil
            header("Location: index.php?action=dashboard");
            exit;
        } else {
            // Affichez un message d'erreur si l'authentification a échoué
            echo "Identifiants incorrects.";
        }
    }

    // Méthode pour afficher la page d'accueil de l'employé après la connexion
    public function showDashboard() {
        // Affichez ici la page d'accueil de l'employé avec les fonctionnalités de gestion des notes de frais
    }

    // Autres méthodes pour la gestion des l'employé (ajouter, modifier, supprimer)
}