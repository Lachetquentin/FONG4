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

$comment_check_query = "SELECT * FROM comments_products WHERE id_comment='$id' LIMIT 1";
$result = mysqli_query($db, $comment_check_query);
if (mysqli_num_rows($result) > 0) { // if product exists

    // Alert réussite
    $query = "DELETE FROM comments_products WHERE id_comment='$id'";
    mysqli_query($db, $query);
    header('location: ../../comments.php?success=2');
} else {
    // Alert non existant
    header("Location: ../../comments.php?erreur=2");
}

mysqli_close($db);
