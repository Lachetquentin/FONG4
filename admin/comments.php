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
    <title>Gestion commentaires / <?php echo SITE_TITLE ?></title>

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
                        Commentaire publié avec succès !
                        </div>";
            }
            if ($s == 2) {
                echo "<div class='alert alert-success' role='alert'>
                        Commentaire supprimé avec succès !
                        </div>";
            }
        }
        ?>

        <?php
        if (isset($_GET['erreur'])) {
            $e = $_GET['erreur'];
            if ($e == 1) {
                echo "<div class='alert alert-danger' role='alert'>
                        Commentaire déjà existant !
                        </div>";
            }
            if ($e == 2) {
                echo "<div class='alert alert-success' role='alert'>
                        Commentaire non existant !
                        </div>";
            }
        }
        ?>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Tableau de Bord</h1>
        </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Administration commentaire</h2>
        </div>

        <h3>Commentaires de produit en attente </h3>

        <div class="table-responsive mb-2" id="myTable">

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Produit</th>
                        <th scope="col">Note</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date de création</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $comments = getProductsPendingComments(); ?>
                    <?php foreach ($comments as $comment) : ?>
                        <tr>
                            <td><?php echo $comment['id_comment']; ?></td>
                            <td><?php echo $comment['email']; ?></td>
                            <td><?php echo $comment['name']; ?></td>
                            <td><?php echo $comment['note']; ?></td>
                            <td><?php echo $comment['description']; ?></td>
                            <td><?php echo strftime("%A %#d %B %Y à %H:%M", strtotime($comment['date_comment'])); ?></td>

                            <td><a id="9" href="functions/comments/p_delete.php?id=<?php echo $comment['id_comment']; ?>" class="btn btn-danger btn-sm tools" type="button" title="Ce bouton vous permettra de supprimer ce commentaire">Supprimer</a></td>
                            <td><a id="10" href="functions/comments/p_accept.php?id=<?php echo $comment['id_comment']; ?>" class="btn btn-success btn-sm tools" type="button" title="Ce bouton vous permettra d'accepter ce commentaire">Accepter</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

        <h3>Commentaires de service en attente </h3>

        <div class="table-responsive mb-2" id="myTable">

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Service</th>
                        <th scope="col">Note</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date de création</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $comments = getServicesPendingComments(); ?>
                    <?php foreach ($comments as $comment) : ?>
                        <tr>
                            <td><?php echo $comment['id_comment']; ?></td>
                            <td><?php echo $comment['email']; ?></td>
                            <td><?php echo $comment['name']; ?></td>
                            <td><?php echo $comment['note']; ?></td>
                            <td><?php echo $comment['description']; ?></td>
                            <td><?php echo strftime("%A %#d %B %Y à %H:%M", strtotime($comment['date_comment'])); ?></td>

                            <td><a id="9" href="functions/comments/s_delete.php?id=<?php echo $comment['id_comment']; ?>" class="btn btn-danger btn-sm tools" type="button" title="Ce bouton vous permettra de supprimer ce commentaire">Supprimer</a></td>
                            <td><a id="10" href="functions/comments/s_accept.php?id=<?php echo $comment['id_comment']; ?>" class="btn btn-success btn-sm tools" type="button" title="Ce bouton vous permettra d'accepter ce commentaire">Accepter</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

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