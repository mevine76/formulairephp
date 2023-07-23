<?php

class ExpenseController {
    public function showExpenseForm() {
        // Affichez ici le code HTML pour le formulaire de création de note de frais
        $html = '
        <div class="row justify-content-center">
        <!-- si showForm = true, on affiche le formulaire -->
        <?php if ($showForm) { ?>
            <div class="col-lg-4 bg-light shadow m-5 p-5 border">
                <p class="h2 mb-5 text-center">Nouvelle note de frais</p>
                <form action="" method="POST" novalidate>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date : </label>
                        <input class="form-control" id="date" name="date" type="date" required>
                        <!-- ici message d\'erreur -->
                        <span class="ms-2 text-danger fs-6"><?= $errors[\'date\'] ?? \'\' ?></span>
                    </div>
                    <!-- Reste du code du formulaire... -->
                </form>
            </div>
        <?php } else { ?>
            <div class="col-lg-4 bg-light shadow m-5 p-5 border">
                <p class="text-center">RE</p>
                <!-- rendre innofensive le résultat la valeur a l\'aide de htmlspecialchars -->
                <p>Date : <?= htmlspecialchars($_POST[\'date\'] ?? \'\') ?></p>
                <p>Montant TTC : <?= htmlspecialchars($_POST[\'amount_ttc\'] ?? \'\') ?></p>
                <p>Montant HT : <?= htmlspecialchars($_POST[\'amount_ht\'] ?? \'\') ?></p>
                <p>Description : <?= htmlspecialchars($_POST[\'description\'] ?? \'\') ?></p>
                <p>Justificatif : <?= htmlspecialchars($_POST[\'proof\'] ?? \'\') ?></p>
                <p>Type de frais : <?= htmlspecialchars($_POST[\'type_id\'] ?? \'\') ?></p>
                <p>Employé : <?= htmlspecialchars($_POST[\'employee_id\'] ?? \'\') ?></p>
                <a href="index.php" class="d-block mt-3 mx-auto btn btn-secondary">Retour</a>
            </div>
        <?php } ?>
    </div>';

    return $html;
    }
        
    

    public function processExpenseForm() {
        $date = $_POST['date'];
        $amountTTC = $_POST['amount_ttc'];
        $amountHT = $_POST['amount_ht'];
        $description = $_POST['description'];
        $proof = $_POST['proof'];
        $typeID = $_POST['type_id'];
        $employeeID = $_POST['employee_id'];

        // Assurez-vous de valider les données du formulaire avant de les enregistrer dans la base de données
        // Vous pouvez ajouter des vérifications ici pour les montants, les dates, etc.

        if (ExpenseModel::createExpense($date, $amountTTC, $amountHT, $description, $proof, $typeID, $employeeID)) {
            // Redirigez vers la page de liste des notes de frais après la création réussie
            header("Location: index.php?action=list_expenses");
            exit;
        } else {
            // Affichez un message d'erreur si la création a échoué
            echo "Erreur lors de la création de la note de frais.";
        }
    }

    public function showExpensesList() {
        // Appelez la méthode getAllExpenses() du modèle ici pour récupérer la liste des notes de frais
        $expenses = ExpenseModel::getAllExpenses();
        // Affichez les notes de frais dans la vue appropriée (list_expenses.php) en utilisant $expenses
    }

    // Vous pouvez ajouter d'autres méthodes pour la mise à jour, la suppression, etc. des notes de frais
}
