<?php
session_start();
?>

<?php
if (isset($_SESSION['email'])) {
    header("Location: home.php");
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
    <title>Connexion</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <div class="banner-welcome shadow">
            <h1 class="banner-title">CONNEXION</h1>
        </div>
    </header>

    <main>
        <?php
        if (isset($_GET['error'])) {
            $e = $_GET['error'];
            if ($e == 1) {
                echo "<div class='alert alert-danger' role='alert'>
                    Nom d'utilisateur ou mot de passe incorrect, veuillez réessayer !
                </div>";
            }
            if ($e == 2) {
                echo "<div class='alert alert-danger' role='alert'>
                    Nom d'utilisateur ou mot de passe vide, veuillez réessayer !
                </div>";
            }
        }
        ?>

        <form action="../functions/c_verification.php" method="POST" class="d-flex justify-content-center">
            <div class="form mw-100 m-5 p-4 b-radius shadow">
                <h3 class="text-center mb-3"> Se connecter </h3>
                <div class="form-group d-flex justify-content-center align-items-center">
                    <i class="material-icons">perm_identity</i>
                    <input type="email" name="email" class="form-control shadow-sm m-2" aria-describedby="email" placeholder="Adresse email">
                </div>
                <div class="form-group mt-2 d-flex justify-content-center align-items-center">
                    <i class="material-icons">lock</i>
                    <input type="password" name="password" class="form-control shadow-sm m-2" aria-describedby="password" placeholder="Mot de passe">
                </div>
                <div class="d-flex justify-content-center form-group">
                    <button type="submit" class="btn btn-primary bg-light shadow-sm">Connexion</button>
                </div>
                <div class="d-flex justify-content-center form-group">
                    <p class="mw-100 mt-3 no-spacing">Vous n'avez pas de compte ? <a href="signup.php"> Inscrivez-vous </a></p>
                </div>
            </div>
        </form>
    </main>
    <footer>

    </footer>
</body>

</html>