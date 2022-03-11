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
    <title>Contact</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>

        <?php include 'includes/navbar.php' ?>

        <div class="banner-welcome shadow">
            <h1 class="banner-title">Contact</h1>
        </div>
    </header>
    <main>
        <?php
        if (isset($_POST['success'])) {
            echo "<div class='alert alert-success text-center' role='alert'>
                        Message envoyé avec succès !
                        </div>";
        }
        ?>
        <h2 class="text-center mt-5">Vous avez une question ? Contactez nous !<h2>
                <form action="contact.php" method="POST" class="d-flex justify-content-center">

                    <div class="w-50 h-100 form mw-100 m-5 p-4 w-200 b-radius shadow">
                        <div class="form-group d-flex justify-content-center align-items-center">

                            <input type="text" class="w-75 form-control shadow-sm m-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom" required>
                            <input type="email" class="w-75 form-control shadow-sm m-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse e-mail" required>
                        </div>
                        <div class="form-group d-flex justify-content-center align-items-center mt-5">
                            <select class="custom-select form-control m-2" id="inputGroupSelect02">
                                <option selected>Liste de sujets...</option>
                                <option value="1">Problème de commande</option>
                                <option value="2">Problème de livraison</option>
                                <option value="3">Demande d'informations</option>
                            </select>

                        </div>
                        <h6 style="margin-left:16px; margin-top:8px;">Message</h6>
                        <div class="h-100 form-group d-flex justify-content-center align-items-center mt-4">
                            <textarea style="height:300px;" class="form-control shadow-sm m-2" aria-describedby="emailHelp" required></textarea>
                        </div>

                        <div class="d-flex justify-content-center form-group mt-5">
                            <button type="submit" name="success" class="px-5 btn btn-primary bg-light shadow-sm" style="background-color:#98D688;">Envoyer</button>
                        </div>
                    </div>
                </form>
    </main>

    <?php include 'includes/footer.php' ?>
</body>

</html>