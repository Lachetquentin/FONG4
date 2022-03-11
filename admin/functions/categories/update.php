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
if (isset($_POST['submit'])) {

    $categoryname = htmlspecialchars($_POST['categoryname']);
    $id = $_POST['id'];

    $category_check_query = "SELECT * FROM category WHERE name='$categoryname' LIMIT 1";
    $result = mysqli_query($db, $category_check_query);
    if (mysqli_num_rows($result) > 0) { // if category exists

        // Alert déjà  existant
        header("Location: ../../updateCategory.php?id=$id&erreur=true");
        
    }
    // register category if there are no errors in the form
    else {
        $query = "UPDATE category SET name = '$categoryname' WHERE id_category = '$id'";
        mysqli_query($db, $query);

        // Alert réussite
        header('location: ../../categories.php?success=2');
        
    }
}
mysqli_close($db);
