<?php
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 4) {
        header("Location: ../enterprises/home.php?error=1");
    }
?>

<?php
} else {
    header("Location: ../index.php?error=1");
}

include_once '../../admin/includes/config.php';
?>


<?php

$id = $_GET['id'];
$idUser = $_SESSION['userId'];

$cart_check_query = "SELECT * FROM cart_services WHERE id_service='$id' and id_user='$idUser' LIMIT 1";
$result = mysqli_query($db, $cart_check_query);
if (mysqli_num_rows($result) > 0) { // if services exists

    $query = "DELETE FROM cart_services WHERE id_service='$id' and id_user='$idUser'";
    mysqli_query($db, $query);
    header('location: ../cart.php');
}else {
    header("Location: ../cart.php");
}

mysqli_close($db);
