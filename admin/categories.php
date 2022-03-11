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
    <title>Gestion catégories / <?php echo SITE_TITLE ?></title>

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
        if (isset($_GET['success'])) {
            $s = $_GET['success'];
            if ($s == 1) {
                echo "<div class='alert alert-success' role='alert'>
                        Catégorie ajoutée avec succès !
                        </div>";
            }
            if ($s == 2) {
                echo "<div class='alert alert-success' role='alert'>
                        Catégorie modifiée avec succès !
                        </div>";
            }
            if ($s == 3) {
                echo "<div class='alert alert-success' role='alert'>
                        Catégorie supprimée avec succès !
                        </div>";
            }
        }
        ?>

        <?php
        if (isset($_GET['erreur'])) {
            echo "<div class='alert alert-danger' role='alert'>
                    Catégorie non existante !
                </div>";
        }
        ?>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Tableau de Bord</h1>
        </div>

        <h2>Administration catégorie</h2>
        <div class="table-responsive" id="myTable">

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $categories = getCategories(); ?>
                    <?php foreach ($categories as $category) : ?>
                        <tr>
                            <td><?php echo $category['id_category']; ?></td>
                            <td><?php echo $category['name']; ?></td>
                            <td><a id="10" href="updateCategory.php?id=<?php echo $category['id_category']; ?>" class="btn btn-warning btn-sm tools" type="button" title="Ce bouton vous permettra d'accéder a la page de modification de cette catégorie">Modifier</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="addCategory.php" class="btn btn-primary btn-sm tools" type="button" title="">Ajouter</a>

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