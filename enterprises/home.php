<?php
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 3) {
        header("Location: ../customers/home.php?error=1");
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
    <title>Accueil</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Header avec le menu -->
    <header>

        <?php include 'includes/navbar.php' ?>

        <div class="banner-welcome shadow">
            <div class="bg-light rounded-pill d-flex justify-content-center shadow-lg h-75">
                <img src="../static/images/logo.png" class="w-100 h-100 opacity-100"></img>
            </div>
        </div>
    </header>
    <!-- Fin header avec le menu -->

    <!-- Head banner -->
    <div class="block-green w-100 h-auto p-5">
        <h3 class="text-center">PRÉSENTATION DE LA DÉMARCHE 0 DÉCHET</h3>
        <div class="d-lg-flex justify-content-around align-items-center">
            <div class="form-group m-3">
                <div class="form-group rounded-circle d-flex justify-content-center">
                    <img src="../static/images/delivery.png" class="mw-100 h-50 rounded-circle shadow-sm"></img>
                </div>
                <p class="mt-3 text-center">Livraison rapide en 3 jours ouvrés avec nos partenaires agrées.</p>
            </div>
            <div class="form-group m-5">
                <p class="text-center m-5">
                    Bienvenue sur notre site !
                    <br />
                    Le zéro déchet est une démarche progressive et positive, qu’on peut suivre à titre individuel et collectif. Elle permet de faire des économies, de favoriser des produits meilleurs pour sa santé, et de limiter son impact négatif sur l’environnement.
                </p>
            </div>
            <div class="form-group m-3">
                <div class=" rounded-circle d-flex justify-content-center">
                    <img src="../static/images/recyclage.png" class="mw-100 h-50 rounded-circle shadow-sm"></img>
                </div>
                <p class="mt-3 text-center">Nous vous proposons des produits uniquement recyclable !</p>
            </div>
        </div>
    </div>
    <!-- Fin Head banner -->

    <!-- Bloc Cards -->

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

    $req = "SELECT * FROM services LIMIT 4";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container pt-5 pb-5">
        <!-- Title of services -->
        <h3 class="text-center">Aperçu des services</h3>
        <div class="row d-flex justify-content-center align-items-center">
            <?php foreach ($services as $unService) : ?>
                <div class="col mt-3 d-flex justify-content-center">
                    <div class="card border-dark shadow-sm" style="width: 18rem;">
                        <div class="img p-2">
                            <img class="card-img-top rounded shadow" src="../static/images/services/<?= $unService['picture'] ?>" alt="Card image cap" style="width:270px; height: 170px;">
                        </div>
                        <div class="card-body">
                            <p class="card-title"><?= $unService['name'] ?></p>
                            <p class="card-text"><?= $unService['description'] ?></p>
                            <p class="text-center"><?= $unService['price'] ?>€</p>
                            <div class="d-flex justify-content-center">
                                <a href="service.php?id=<?php echo $unService['id_service'] ?>" class="ms-3 btn btn-primary">Voir</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <!-- Fin bloc Cards -->

    <?php include 'includes/footer.php' ?>
</body>

</html>