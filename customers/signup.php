<?php
session_start();

if (isset($_SESSION['email'])) {
    header("Location: home.php");
}

require '../admin/includes/config.php';
include '../admin/includes/const.php';

// check to see if the form was submitted
if (isset($_POST['addBtn'])) {
    // POST all the form data
    // ID = gender  && user = name 
    $firstname =  isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'])  : "";
    $lastname =  isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : "";
    $password = isset($_POST['password']) ?  htmlspecialchars($_POST['password']) : "";
    $confirmpw = isset($_POST['confirmpassword']) ? htmlspecialchars($_POST['confirmpassword']) : "";
    $cryptedpw = sha1($password);
    $phonenumber =  isset($_POST['phonenumber']) ? htmlspecialchars($_POST['phonenumber']) : "";
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : "";
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : "";
    $zipcode = isset($_POST['zipcode']) ? htmlspecialchars($_POST['zipcode']) : "";
    $idtype = isset($_POST['id_type']) ? htmlspecialchars($_POST['id_type']) : "";
    $idcountry = isset($_POST['id_country']) ? htmlspecialchars($_POST['id_country']) : "";

    // CONNECT TO THE DB
    global $db;

    if ($password == $confirmpw) {
        // make sure all the form data was submitted
        if ($firstname && $lastname && $cryptedpw && $phonenumber && $email && $address && $zipcode && $idtype && $idcountry) {
            $result = mysqli_num_rows(mysqli_query($db, "SELECT email from user WHERE email='$email'"));
            if ($result > 0) {
                header('Location: signup.php?error=1');
            }

            mysqli_query($db, "INSERT INTO user (id_role, id_country, id_type, first_name, last_name, address, zip_code, email, tel, password) VALUES ('3', '$idcountry', '$idtype', '$firstname', '$lastname', '$address', '$zipcode', '$email', '$phonenumber' , '$cryptedpw')");
            header("Location: signin.php?success=1");
        } else {
            header("Location: signup.php?error=2");
        }
    } else {
        header("Location: signup.php?error=3");
    }
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
    <title>Inscription</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <div class="banner-welcome shadow">
            <h1 class="banner-title">Inscription</h1>
        </div>
    </header>

    <main>
        <?php
        if (isset($_POST['error'])) {
            $e = $_POST['error'];
            if ($e == 1) {
                echo "<div class='alert alert-danger' role='alert'>
                        Cet e-mail est déjà utilisé veuillez en choisir un autre !
                        </div>";
            }
            if ($e == 2) {
                echo "<div class='alert alert-danger' role='alert'>
                        Veuillez remplir tout le formulaire !
                        </div>";
            }
            if ($e == 3) {
                echo "<div class='alert alert-danger' role='alert'>
                        Les mots de passes ne correspondent pas !
                        </div>";
            }
        }
        ?>

        <?php
        if (isset($_POST['success'])) {
            $s = $_POST['success'];
            if ($s == 1) {
                echo "<div class='alert alert-success' role='alert'>
                        Vous pouvez maintenant vous connecter !
                        </div>";
            }
        }
        ?>
        <form action="signup.php" method="POST" class="d-flex justify-content-center">
            <div class="form mw-100 m-5 p-4 b-radius shadow">
                <div class="form-group d-flex justify-content-center align-items-center">
                    <i class="material-icons">perm_identity</i>
                    <input type="text" name="lastname" class="form-control shadow-sm m-2" aria-describedby="lastname" placeholder="Nom*" value="<?php echo isset($lastname) ? $lastname : ""; ?>" required>
                    <input type="text" name="firstname" class="form-control shadow-sm m-2" aria-describedby="firstname" placeholder="Prénom*" placeholder="" value="<?php echo isset($firstname) ? $firstname : ""; ?>" required>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center mt-2">
                    <img src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/32/000000/external-genders-wedding-love-dreamstale-lineal-dreamstale.png" style="width:25px; height:25px;" />
                    <select class="form-control m-2" name="id_type" placeholder="Civilité*" required>
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                        <option value="3">Non-genré</option>
                        <option value="4">Inconnu</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center align-items-center form-group mt-2">
                    <i class="material-icons">mail</i>
                    <input type="email" name="email" class="form-control shadow-sm m-2" aria-describedby="email" placeholder="Adresse email*" value="<?php echo isset($email) ? $email : ""; ?>" required>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center mt-2">
                    <i class="material-icons">phone</i>
                    <input type="tel" name="phonenumber" class="form-control shadow-sm m-2" aria-describedby="phonenumber" placeholder="Numéro de téléphone*" value="<?php echo isset($phonenumber) ? $phonenumber : ""; ?>" required>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center mt-2">
                    <i class="material-icons">house</i>
                    <input type="text" name="address" class="form-control shadow-sm m-2" aria-describedby="address" placeholder="Adresse*" value="<?php echo isset($address) ? $address : ""; ?>" required>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center mt-2">
                    <i class="material-icons">house</i>
                    <input type="text" name="zipcode" class="form-control shadow-sm m-2" aria-describedby="zipcode" placeholder="Code postal*" value="<?php echo isset($zipcode) ? $zipcode : ""; ?>" required>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center mt-2">
                    <i class="material-icons">flag</i>
                    <select class="form-control m-2" name="id_country" placeholder="Pays*">
                        <option value="1">France</option>
                        <option value="2">Corse</option>
                    </select>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center mt-2">
                    <i class="material-icons">lock</i>
                    <input type="password" name="password" class="form-control shadow-sm m-2" aria-describedby="password" placeholder="Mot de passe*" value="<?php echo isset($password) ? $password : ""; ?>" required>
                </div>
                <div class="form-group d-flex justify-content-center align-items-center mt-2">
                    <i class="material-icons">lock</i>
                    <input type="password" name="confirmpassword" class="form-control shadow-sm m-2" aria-describedby="confirmPassword" placeholder="Confirmer votre mot de passe*">
                </div>
                <div class="d-flex justify-content-center form-group mt-5">
                    <button type="submit" name="addBtn" class="px-5 btn btn-primary bg-light shadow-sm">S'inscrire</button>
                </div>
            </div>
        </form>
    </main>

    <footer>

    </footer>
</body>

</html>