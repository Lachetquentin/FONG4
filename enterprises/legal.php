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
    <title>Mentions légales</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <?php include 'includes/navbar.php' ?>
        <div class="banner-welcome shadow">
            <h1 class="banner-title">Mentions légales</h1>
        </div>
    </header>

    <div class="container my-5 p-5 borders shadow" style="background:#D1EDD4;">
        <h3>Edition du site</h3>
        <p>Vous êtes sur le site d’e-commerce de la société Eco Services. <br>Le site a été réalisé et édité par une équipe de développement : Force of Nature. </p>
        <br>
        <h3>Hébergeur</h3>
        <p>Les informations relatives à l’hébergement juridique et technique de ce site figurent à
            l’adresse :</p>
        <br>
        <h3>Nous contacter</h3>
        <p>Vous pouvez prendre contact avec nous à l’adresse suivante : ou <a href="contact.php">nous contacter</a></p>
        <br>
        <h3>Traitements des données</h3>
        <p>Les coordonnées bancaires et tout autre informations
            que vous renseignez sont strictement confidentielles.</p>
    </div>

    <?php include '/includes/footer.php' ?>
</body>

</html>