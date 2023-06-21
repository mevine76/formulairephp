<?php
require_once 'controllers/index-controller.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrôle de formulaire</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="row justify-content-center">

        <!-- si showForm = true, on affiche le formulaire -->
        <?php if ($showForm) { ?>
            <div class="col-lg-4 bg-light shadow m-5 p-5 border">
                <p class="h2 mb-5 text-center">Châsse et Pêche</p>
                <form action="" method="POST" novalidate>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nom : </label>
                        <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
                        <input class="form-control" id="lastname" name="lastname" type="text" placeholder="ex. DOE" value="<?= htmlspecialchars($_POST['lastname'] ?? '') ?>" required>
                        <!-- ici message d'erreur -->
                        <span class="ms-2 text-danger fs-6"><?= $errors['lastname'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prénom : </label>
                        <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
                        <input class="form-control" id="firstname" name="firstname" type="text" placeholder="ex. DOE" value="<?= htmlspecialchars($_POST['firstname'] ?? '') ?>" required>
                        <!-- ici message d'erreur -->
                        <span class="ms-2 text-danger fs-6"><?= $errors['firstname'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                    <label for="email" class="form-label">Courriel : </label>
                    <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
                    <input class="form-control" id="email" name="email" type="text" placeholder="ex. DOE" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                    <!-- ici message d'erreur -->
                    <span class="ms-2 text-danger fs-6"><?= $errors['email'] ?? '' ?></span>
                    </div>
                    <div >
                    <label for="password" class="form-label">Mot de passe : </label>
                    <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
                    <input class="form-control" id="password" name="password" type="password" placeholder="" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>" required>
                    <!-- ici message d'erreur -->
                    <span class="ms-2 text-danger fs-6"><?= $errors['password'] ?? '' ?></span>
                    </div>
                    <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirmer le mot de passe : </label>
                    <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
                    <input class="form-control" id="confirmPassword" name="confirmPassword" type="password" placeholder="" value="<?= htmlspecialchars($_POST['confirmPassword'] ?? '') ?>" required>
                    <!-- ici message d'erreur -->
                    <span class="ms-2 text-danger fs-6"><?= $errors['confirmPassword'] ?? '' ?></span>
                    </div>
                    <div class="mb-3"></div>
                    <label for="subscriptionType" class="form-label">Type d'abonnement : </label>
                    <select class="form-select" id="subscriptionType" name="subscriptionType">
                        <option value="">--Choisir--</option>
                        <option value="classic" <?= isset($_POST['subscriptionType']) && $_POST['subscriptionType'] == 'classique' ? 'selected' : '' ?>>Classique</option>
                        <option value="premium">Premium</option>
                        <option value="family">Famille</option>
                    </select>
                    <div class="mb-3 form-check">
                    <label for="termsAndConditions" class="form-check-label">Accepter les CGU : </label>
                    <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
                    <input class="form-check-input" id="termsAndConditions" name="termsAndConditions" type="checkbox"><br><br>
                    <!-- ici message d'erreur -->
                    <span class="ms-2 text-danger fs-6"><?= $errors['termsAndConditions'] ?? '' ?></span>
                    </div>
                    <div>
                    <button class="d-block mt-3 mx-auto btn btn-secondary">Valider</button>
                    </div>
                </form>
            </div>
            <!-- sinon on affiche le recap -->
        <?php } else { ?>
            <div class="col-lg-4 bg-light shadow m-5 p-5 border">
                <p class="text-center">RECAP'</p>
                <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
                <p>Nom : <?= htmlspecialchars($_POST['lastname'] ?? '') ?></p>
                <p>Prénom : <?= htmlspecialchars($_POST['firstname'] ?? '') ?></p>
                <p>Courriel : <?= htmlspecialchars($_POST['email'] ?? '') ?></p>
                <p>Mot de passe : <?= htmlspecialchars($_POST['password'] ?? '') ?></p>
                <p>Abonnement : <?= htmlspecialchars($_POST['subscribe'] ?? '') ?></p>
                <p>CGU : <?= htmlspecialchars($_POST['termsAndConditions'] ?? '') ?></p>
                <a href="index.php" class="d-block mt-3 mx-auto btn btn-secondary">Retour</a>
            </div>
        <?php } ?>
    </div>

</body>

</html>