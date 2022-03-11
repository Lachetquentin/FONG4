<?php
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 4) {
        header("Location: ../enterprises/home.php?error=1");
    }
?>

<?php
} else header("Location: ../index.php?error=1");
?>

<?php

include '../admin/includes/get.php';
include '../admin/includes/config.php';
include '../admin/includes/const.php';

$idProduit = $_GET['id'];
$produit = getProductById($idProduit);


?>

<?php
if (isset($_POST['cartButton'])) {
    addToCartProduct($_SESSION['userId'], $produit['id_product'], $produit['id_stripe'], $_POST['quantity']);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../static/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <title>Produit</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <?php include 'includes/navbar.php' ?>
        <!--banner welcome shadow-->
        <div class="banner-welcome shadow">

        </div>
    </header>

    <main>

        <div class="container p-5">
            <div class="row d-flex justify-content-evenly align-items-center">
                <div class="col d-flex justify-content-center">
                    <img src="../static/images/produits/<?php echo $produit['picture'] ?>" class="borders shadow border border-black" style="width: 382px; height:250px;" />
                </div>
                <div class="col mt-lg-0 mt-5 d-grid justify-content-lg-start justify-content-center">
                    <h3><?php echo $produit['name']; ?></h3>
                    <h3><?php echo $produit['price']; ?>€</h3>
                    <p>Indice éco-responsable : <?php echo $produit['eco_index'] ?>%</p>
                    <div class="col">
                        <form method="POST">
                            <label>Quantité</label>
                            <input type="number" value="1" min="1" name="quantity" / class="mb-2">
                            <br />
                            <button type="submit" name="cartButton" class="btn btn-primary"><b>Ajouter au panier</b></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row my-5 p-5 borders shadow border" style="background: #A9ED98;">
                <h3>Description du produit</h3>
                <p><?php echo $produit['description'] ?></p>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php' ?>

</body>

</html>