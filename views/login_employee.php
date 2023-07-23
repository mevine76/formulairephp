<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Employee</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row justify-content-center">
        <!-- si showForm = true, on affiche le formulaire -->
        <?php $showForm = true; ?>
        <?php if ($showForm) { ?>
            <div class="col-lg-4 bg-light shadow m-5 p-5 border">
                <p class="h2 mb-5 text-center">Employées <br>Déjà inscrit ? <br> Veuillez vous identifier</p>
                <form action="" method="POST" novalidate>
                    <div class="mb-3">
                    <label for="email" class="form-label">Courriel : </label>
                    <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
                    <input class="form-control" id="email" name="email" type="text" placeholder="Adresse email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                    <!-- ici message d'erreur -->
                    <span class="ms-2 text-danger fs-6"><?= $errors['email'] ?? '' ?></span>
                    <div >
                    <label for="password" class="form-label">Mot de passe : </label>
                    <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
                    <input class="form-control" id="password" name="password" type="password" placeholder="Mot de passe" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>" required>
                    <!-- ici message d'erreur -->
                    <span class="ms-2 text-danger fs-6"><?= $errors['password'] ?? '' ?></span>
                    </div>
                    <div>
                    <button class="d-block mt-3 mx-auto btn btn-secondary">Valider</button>
                    <a href="../controllers/controller-signup.php" class="link-primary mt-2">s'inscrire</a>
                    </div>
                    <div class="text-center">
                    </div>
                </form>
            </div>
            <!-- sinon on affiche le recap -->
        <?php } else { ?>
            <div class="col-lg-4 bg-light shadow m-5 p-5 border">
                <p class="text-center">RE</p>
                <!-- rendre innofensive le résultat la valeur a l'aide de htmlspecialchars -->
                <p>Courriel : <?= htmlspecialchars($_POST['email'] ?? '') ?></p>
                <p>Mot de passe : <?= htmlspecialchars($_POST['password'] ?? '') ?></p>
            </div>
        <?php } ?>
    </div>

</body>

</html>