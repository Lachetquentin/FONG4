<?php
session_start();
?>

<?php
if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] != 1) {
        header("Location: db_signin.php?error=1");
    }
?>

<?php
} else header("Location: db_signin.php?error=1");
?>

<?php
if ($_SESSION['role'] == 1) {
    include_once '../../includes/config.php';
}
?>

<?php

$id = $_GET['id'];

$user_check_query = "SELECT * FROM user WHERE id_user='$id' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
if (mysqli_num_rows($result) > 0) { // if admin exists

    // Alert réussite
    $query = "DELETE FROM user WHERE id_user='$id'";
    mysqli_query($db, $query);
    header('location: ../../admins.php?success=2');
}
// register admins if there are no errors in the form
else {
    // Alert non existant
    header("Location: ../../admins.php?error=true");
}

mysqli_close($db);
