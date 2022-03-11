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
    <meta name="description" content="Respectons la nature pour un commerce écologique">
    <meta name="author" content="<?php echo SITE_TITLE ?>">
    <title>Tableau de bord / <?php echo SITE_TITLE ?></title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="../static/img/favicon.ico"> TODO Change favicon -->
    <!-- <link rel="icon" href="../static/img/favicon.ico"> TODO Change favicon -->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css" /> <!-- TODO Change bootstrap -->
    <!-- Custom styles for this template -->
    <link href=" static/css/dashboard.css" rel="stylesheet"> <!-- TODO dashboard css -->
</head>

<body>

    <?php include 'includes/searchbar.php' ?>

    <?php include 'includes/navbar.php' ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Tableau de bord</h1>
        </div>

        <h2>Accueil</h2>

        <div class="row">

            <div class="col-sm-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <?php $nbEnterprises = getNbEnterprises() ?>
                        <h5 class="card-title"><?php echo $nbEnterprises ?></h5>
                        <?php if ($nbEnterprises == 1) : ?>
                            <p class="card-text">entreprise inscrite</p>
                        <?php else : ?>
                            <p class="card-text">entreprises inscrites</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <?php $nbUsers = getNbUsers() ?>
                        <h5 class="card-title"><?php echo $nbUsers ?></h5>
                        <?php if ($nbUsers == 1) : ?>
                            <p class="card-text">utilisateur</p>
                        <?php else : ?>
                            <p class="card-text">utilisateurs inscrit</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <?php $nbServices = getNbServices() ?>
                        <h5 class="card-title"><?php echo $nbServices ?></h5>
                        <?php if ($nbServices == 1) : ?>
                            <p class="card-text">service</p>
                        <?php else : ?>
                            <p class="card-text">services</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <?php $nbProducts = getNbProducts() ?>
                        <h5 class="card-title"><?php echo $nbProducts ?></h5>
                        <?php if ($nbProducts == 1) : ?>
                            <p class="card-text">produit</p>
                        <?php else : ?>
                            <p class="card-text">produits</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-2">
                <div class="card">
                    <div class="card-body">
                        <?php $nbComments = getNbPendingComments() ?>
                        <h5 class="card-title"><?php echo $nbComments ?></h5>
                        <?php if ($nbComments == 1) : ?>
                            <p class="card-text">commentaire en attente</p>
                        <?php else : ?>
                            <p class="card-text">commentaires en attente</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>

        </div>

    </main>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="static/js/dashboard.js"></script>
    <script src="../static/js/accessibility.js"></script>
</body>

</html>