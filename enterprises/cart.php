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

<?php include '../admin/includes/get.php'; ?>

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
    <script src="https://js.stripe.com/v3"></script>
    <title>Panier</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <?php include 'includes/navbar.php' ?>
        <div class="banner-welcome shadow">
            <h1 class="banner-title">PANIER</h1>
        </div>
    </header>

    <!-- Panier -->

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
        echo "Connexion ??chou??e : " . $e->getMessage();
    }

    $idUser = $_SESSION['userId'];
    $req = "SELECT services.picture, services.price, services.id_service, cart_services.quantity, services.name FROM cart_services, services WHERE cart_services.id_service = services.id_service AND id_user = $idUser;";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = 0;
    $prixtotal = 0;
    ?>

    <div class="container my-5">
        <h2>Vos services</h2>
        <div class="ms-0 cart p-5 borders" style="background: #A9ED98;">
            <?php foreach ($services as $unService) : ?>
                <div class="row mb-3">
                    <div class="col d-flex ">
                        <img src="../static/images/services/<?php echo $unService['picture'] ?>" class="borders shadow" style="width: 170px; height:210px;"></img>
                    </div>
                    <div class="col d-grid align-items-center">
                        <p><?php echo $unService['name'] ?></p>
                        <div class="col">
                            <a href="functions/delete.php?id=<?php echo $unService['id_service']; ?>" class="btn btn-primary bg-light shadow-sm px-5" type="button">Retirer</a>
                        </div>
                    </div>
                    <?php $prixtotal = $unService['quantity'] * $unService['price'];
                    $total = $total + $prixtotal;
                    ?>
                    <div class="col d-grid align-items-center">
                        <p>Prix</p>
                        <p class="mb-0"><?php echo $unService['price'] ?>???</p>
                    </div>
                    <div class="col d-grid align-items-center">
                        <p>Quantit??</p>
                        <div class="col">
                            <input type="number" value="<?php echo $unService['quantity'] ?>" disabled class="form-control shadow-sm w-50"></input>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="row me-5 mt-5">
                <div class="col d-flex justify-content-end me-5">
                    <p>Total</p>
                    <p class="ms-5"><?php echo $total ?>???</p>
                </div>
            </div>

        </div>
        <div class="d-flex justify-content-center">
            <a href="estimate.php" class="btn btn-primary mt-3">Confirmer le panier</a>
        </div>
    </div>
    <!-- Fin panier -->

    <?php include 'includes/footer.php' ?>
</body>

</html>