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
    <title>Produits</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <?php include 'includes/navbar.php' ?>
        <!--banner welcome shadow-->
        <div class="banner-welcome shadow">
            <h1 class="banner-title">Produits</h1>
        </div>
    </header>

    <!-- Filtre & Produits -->
    <div class="row">
        <?php

        $dsn = 'mysql:dbname=forceofnature;host=localhost';
        $user = 'root';
        $password = '';

        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );

        try {
            $pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            echo "Connexion échouée : " . $e->getMessage();
        }

        $req = "SELECT * FROM products";
        $stmt = $pdo->prepare($req);
        $stmt->execute();
        $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="col">
            <div class="container pt-5 pb-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <?php foreach ($produits as $unProduit) : ?>
                        <div class="col-lg-4 col-12 mt-3 d-flex justify-content-center">
                            <div class="card border-dark shadow-sm" style="width: 18rem;">
                                <div class="img p-2">
                                    <img class="card-img-top rounded shadow borders" src="../static/images/produits/<?= $unProduit['picture'] ?>" alt="Card image cap" style="width:270px; height: 170px;">
                                </div>
                                <div class="card-body">
                                    <p class="card-title"><?= $unProduit['name'] ?></p>
                                    <p class="card-text"><?= $unProduit['description'] ?></p>
                                    <p class="text-center"><?= $unProduit['price'] ?>€</p>
                                    <div class="d-flex justify-content-center">
                                        <a href="product.php?id=<?php echo $unProduit['id_product'] ?>" class="ms-3 btn btn-primary">Voir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php' ?>
</body>

</html>