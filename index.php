<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="static/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <title>Bienvenue</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <!-- Bannière -->
        <div class="banner-welcome shadow">
            <h1 class="banner-title">BIENVENUE</h1>
        </div>
        <!-- Fin Bannière -->
    </header>

    <!-- Bloc de choix Particuliers/Entreprises -->
    <div class="container mt-5 mr-5 ml-5 d-flex justify-content-center py-5 mb-5">
        <div class="block-statue w-75 shadow-sm">
            <h2 class="text-center mt-3 shadow-sm">Vous êtes ?</h2>
            <div class="h-75 d-flex justify-content-center align-items-center">
                <div class="w-50 text-center">
                    <a href="customers/signin.php"><button type="button" class="btn btn-primary w-50 shadow-sm">Particuliers</button></a>
                </div>
                <span class="vertical"></span>
                <div class="w-50 text-center">
                    <a href="enterprises/signin.php"><button type="button" class="btn btn-primary w-50 shadow-sm">Entreprises</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Bloc de choix Particuliers/Entreprises -->

    <footer>

    </footer>
</body>

</html>