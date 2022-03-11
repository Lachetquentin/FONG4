<?php
session_start();
?>

<?php
if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 1) {
        header("Location: db_signin.php?error=1");
    }
?>

<?php
} else header("Location: db_signin.php?error=1");
?>

<?php include 'includes/config.php' ?>
<?php include 'includes/get.php' ?>
<?php include 'includes/const.php' ?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Une source d'aide pour les étudiants en alternance.">
    <meta name="author" content="<?php echo SITE_TITLE ?>">
    <title>Ajout administrateur / <?php echo SITE_TITLE ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../static/img/favicon.ico">
    <link rel="icon" href="../static/img/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css" />

    <!-- Custom styles for this template -->
    <link href="static/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <?php include 'includes/searchbar.php' ?>

    <?php include 'includes/navbar.php' ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <?php
        if (isset($_GET['erreur'])) {
            echo "<div class='alert alert-danger' role='alert'>
                    Utilisateur(trice) déjà existant(e) !
                </div>";
        }
        ?>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Tableau de Bord</h1>
        </div>

        <h2>Administration</h2>
        <section class="text-center container">
            <div class="row py-sm-3 py-md-4 py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h2>Création d'un admin / commerciaux</h2>

                    <form method="POST" action="functions/admins/create.php">

                        <div>
                            <label>Rôle</label>
                            <select class="form-control" name="role" required>
                                <?php $roles = getRoles(); ?>
                                <option value="">Sélectionner un rôle</option>
                                <?php foreach ($roles as $role) : ?>
                                    <option value="<?php echo $role['id_role']; ?>"><?php echo $role['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label>Genre</label>
                            <select class="form-control" name="type" required>
                                <?php $genders = getGenders(); ?>
                                <option value="">Sélectionner un genre</option>
                                <?php foreach ($genders as $gender) : ?>
                                    <option value="<?php echo $gender['id_type']; ?>"><?php echo $gender['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label>Pays</label>
                            <select class="form-control" name="country" required>
                                <?php $countries = getCountry(); ?>
                                <option value="">Sélectionner un pays</option>
                                <?php foreach ($countries as $country) : ?>
                                    <option value="<?php echo $country['id_country']; ?>"><?php echo $country['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label>Nom</label>
                            <input type="text" class="form-control" name="lastname" value="" required>
                        </div>

                        <div>
                            <label>Prénom</label>
                            <input type="text" class="form-control" name="firstname" value="" required>
                        </div>

                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="" required>
                        </div>

                        <div>
                            <label>Mot de passe</label>
                            <input type="password" class="form-control" name="password" value="" required>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" class="btn btn-primary my-2 tools" value="Créer" name="submit">
                        <input type="reset" class="btn btn-warning my-2 tools" value="Réinitialiser">
                    </form>
                    <a class="text-white btn btn-danger tools" href="users.php">
                        Annuler
                    </a>
                </div>
            </div>
        </section>

    </main>

    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="static/js/dashboard.js"></script>
</body>

</html>